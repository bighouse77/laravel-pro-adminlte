<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

       return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255|min:6',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create($input);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário adicionado com sucesso!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255|min:6',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:6',
        ]);

        // $user->fill($input)->save();

        $user->update($input);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário alterado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()
            ->with('success', 'Usuário excluido com sucesso!');
    }
}
