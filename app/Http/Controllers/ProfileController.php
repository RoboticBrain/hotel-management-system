<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Customer $customer) {
        $user = $customer;
        return view('user.profile', compact('user'));
    }
}
