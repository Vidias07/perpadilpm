<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:8', // Minimal 8 karakter
            'isAdmin' => 'nullable|boolean',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash password sebelum disimpan
            'isAdmin' => $request->has('isAdmin'),
        ]);

        return redirect()->to('/users')->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {


        $user = User::findOrFail($id);

        // Update atribut user berdasarkan input dari form
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nip = $request->input('nip');
        $user->isAdmin = $request->has('isAdmin'); // Checkbox isAdmin



        $user->save();

        // Redirect atau response sesuai kebutuhan aplikasi
        return redirect()->to('/users')->with('success', 'User updated successfully.');
    }
}
