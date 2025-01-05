<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('role','user')->get();

        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string',
        ]);
        $user->update($request->only(['name','email','role']));
        return redirect()->route('admin.users.index')->with('success','Uzytkownik zaktualizowany!');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success','Uzytkownik został usunięty!');
    }
}
