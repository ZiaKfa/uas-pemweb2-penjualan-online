<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
Use Illuminate\View\View;

class UserController extends Controller
{    
    public function index(): View
    {
        return view('user.index', [
            'users' => User::all(),
            'title' => 'User List'
        ]);
    }

    public function show(User $user): View
    {
        return view('user.show', [
            'user' => $user,
            'title' => 'User Details'
        ]);
    }

    public function create(): View
    {
        return view('user.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

        
    public function edit(User $user): View
    {
        return view('user.edit', [
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }

    
    public function update(Request $request, User $user): RedirectResponse
    {
        $user->update($request->all());
        
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
