<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    function edit(User $user){
        return view('user.profile.password-edit',compact('user'));
    }
    function update(Request $request,User $user) {
        $request->validate([
            'current_password' => 'reequired',
            'new_password' => 'required|min:8|confirmed',
        ]);
        if(Hash::check($request->current_password,$user->password)){
            $user->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('profile.show', $user->id)->with('notification', ['type' => 'success', 'message' => 'Password updated successfully!']);
        }
    }
    
}
