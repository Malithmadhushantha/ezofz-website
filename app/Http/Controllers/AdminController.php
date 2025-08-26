<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.dashboard', compact('documents'));
    }

    public function documents()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents', compact('documents'));
    }

    public function users()
    {
        $users = User::orderByDesc('created_at')->paginate(10);
        $recentLogins = User::orderByDesc('last_login_at')->take(5)->get();
        return view('admin.users.index', compact('users', 'recentLogins'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.users')->with('success', 'User created successfully!');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|in:user,admin'
        ]);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function updateUserPassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('admin.users')->with('success', 'Password updated successfully!');
    }

    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}
