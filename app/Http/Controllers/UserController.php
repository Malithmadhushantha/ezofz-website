<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

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
                // Ensure avatars directory exists in storage
                $storageAvatarsPath = storage_path('app/public/avatars');
                if (!is_dir($storageAvatarsPath)) {
                    mkdir($storageAvatarsPath, 0755, true);
                }

                // Also ensure public/storage/avatars exists (fallback for hosting without symlinks)
                $publicAvatarsPath = public_path('storage/avatars');
                if (!is_dir($publicAvatarsPath)) {
                    mkdir($publicAvatarsPath, 0755, true);
                }

                // Delete old avatar if exists
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);

                    // Also delete from public/storage if it exists (fallback)
                    $oldPublicPath = public_path('storage/' . $user->avatar);
                    if (file_exists($oldPublicPath)) {
                        unlink($oldPublicPath);
                    }
                }

                // Generate unique filename
                $file = $request->file('avatar');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                // Store new avatar with custom filename
                $avatarPath = $file->storeAs('avatars', $filename, 'public');

                // Copy to public/storage as fallback (for hosting environments without symlinks)
                $sourcePath = storage_path('app/public/' . $avatarPath);
                $destinationPath = public_path('storage/' . $avatarPath);
                if (file_exists($sourcePath) && is_dir(dirname($destinationPath))) {
                    copy($sourcePath, $destinationPath);
                }

                $data['avatar'] = $avatarPath;

            } catch (\Exception $e) {
                Log::error('Avatar upload failed: ' . $e->getMessage(), [
                    'user_id' => $user->id,
                    'file_size' => $request->file('avatar') ? $request->file('avatar')->getSize() : 'unknown',
                    'file_type' => $request->file('avatar') ? $request->file('avatar')->getMimeType() : 'unknown'
                ]);
                return redirect()->route('user.profile')->withErrors(['avatar' => 'Failed to upload avatar. Please try again or contact support. Error: ' . $e->getMessage()]);
            }
        }

        $user->update($data);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
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
