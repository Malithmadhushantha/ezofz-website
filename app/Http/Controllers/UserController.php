<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'email', 'phone', 'address', 'bio']);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            try {
                // Validate file
                $file = $request->file('avatar');
                if (!$file->isValid()) {
                    return redirect()->route('user.profile')
                        ->withErrors(['avatar' => 'Invalid file upload. Please try again.']);
                }

                // Ensure avatars directory exists in storage
                $storageAvatarsPath = storage_path('app/public/avatars');
                if (!is_dir($storageAvatarsPath)) {
                    if (!mkdir($storageAvatarsPath, 0755, true)) {
                        throw new Exception('Could not create avatars directory');
                    }
                }

                // Delete old avatar if exists
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store new avatar with custom filename
                $avatarPath = $file->storeAs('avatars', $filename, 'public');

                if (!$avatarPath) {
                    throw new Exception('Failed to store uploaded file');
                }

                $data['avatar'] = $avatarPath;

                Log::info('Avatar uploaded successfully', [
                    'user_id' => $user->id,
                    'avatar_path' => $avatarPath,
                    'file_size' => $file->getSize()
                ]);

            } catch (Exception $e) {
                Log::error('Avatar upload failed: ' . $e->getMessage(), [
                    'user_id' => $user->id,
                    'file_size' => $request->file('avatar') ? $request->file('avatar')->getSize() : 'unknown',
                    'file_type' => $request->file('avatar') ? $request->file('avatar')->getMimeType() : 'unknown',
                    'trace' => $e->getTraceAsString()
                ]);
                return redirect()->route('user.profile')
                    ->withErrors(['avatar' => 'Failed to upload avatar: ' . $e->getMessage()]);
            }
        }

        try {
            Log::info('Updating user profile', [
                'user_id' => $user->id,
                'data_keys' => array_keys($data),
                'data' => $data
            ]);

            $user->update($data);

            Log::info('Profile updated successfully', ['user_id' => $user->id]);

            return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
        } catch (Exception $e) {
            Log::error('Profile update failed: ' . $e->getMessage(), [
                'user_id' => $user->id,
                'data' => $data,
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('user.profile')
                ->withErrors(['profile' => 'Failed to update profile: ' . $e->getMessage()]);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('user.profile')->with('success', 'Password updated successfully!');
    }

    public function deleteAvatar()
    {
        $user = Auth::user();

        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->update(['avatar' => null]);

        return redirect()->route('user.profile')->with('success', 'Profile picture removed successfully!');
    }
}
