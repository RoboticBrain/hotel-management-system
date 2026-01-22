<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('admin.dashboard.customers.index', compact('customers'));

    }
    public function show(Customer $customer) {
        $user = $customer;
        return view("user.profile", compact('user'));
    }
    public function edit() {
        
    }
    public function update() {

    }
    public function destroy() {

    }
}
