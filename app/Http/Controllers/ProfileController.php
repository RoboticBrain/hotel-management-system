<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;


class ProfileController extends Controller
{
    public function show(Customer $customer) {
        $user = $customer;
        return view('user.profile.index', compact('user'));
    }
    public function edit(Customer $customer) {
        return view('user.profile.settings', compact('customer'));
    }
    public function update(Customer $customer, UpdateCustomerRequest $request) {
        $validated = $request->validated();

        // Update User model with email
        $customer->user->update([
            'email' => $validated['email']
        ]);

        // Update Customer model with other fields (excluding email)
        $customer->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'address' => $validated['address'],
            'phone_number' => $validated['phone_number'],
        ]);

        return redirect()->route('profile.show',$customer->id)->with('notification', [
            'type' => 'success',
            'message' => 'Profile updated successfully!'
        ]);
    }
}
