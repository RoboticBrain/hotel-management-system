<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
class SessionController extends Controller
{
    public function create() {
        return view("auth.login");
    }
    public function store(Request $request){
        $validated = $request->validate([
            "email"=> "required|email",
            "password"=> "required|min:5",
        ]);
        // dd($validated);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();        
        }
        else {
            return redirect()->back();
        }
        $currentUser = Auth::user();
        if($currentUser->isAdmin){
            return redirect()->intended(route('admin.dashboard'));
        } 
        else {
            return redirect()->intended(route('user.dashboard'));
        }
   }
   public function destroy() {
        // dd(Auth::user());
        Auth::logout(); 
        return redirect()->route('login');
   }
}
