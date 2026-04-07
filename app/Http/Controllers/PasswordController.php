<?php

namespace App\Http\Controllers;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
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
    function showPasswordResetPage() {
        return view('user.profile.password-reset');
    }
    function resetPassword(Request $request) {
        $email = $request->validate([
            'email' => 'required|string',
        ]);
        $verifiedUser =  User::where('email',$email['email'])->first();
        // dd($verifiedUser);
        if($verifiedUser){
            $userName = $verifiedUser->customer->first_name;
            $verifiedUser->update([
            'password' => Hash::make($userName . '123')
        ]);

        mail::to($email)->send(new ResetPasswordMail($userName));
        return redirect()->back()->with('success','Default password has been sent on your email.');

    }
    return redirect()->back()->with('email','User not found');
    }
    
}