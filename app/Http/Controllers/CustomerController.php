<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use illuminate\Support\Arr;
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
    public function edit(Customer $customer) {
        // dd($customer);
        return view('admin.dashboard.customers.edit',compact('customer'));
    }
    public function update(Customer $customer, Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|string|min:3|max:16',
            'last_name' => 'required|string|min:3|max:16',
            'email' => 'required|string|email|',
            'address' => 'required|string|min:5|max:255',
            'phone_number' => 'required|string',
        ]);
        $customer->user->update(['email' => $validated['email']]);
        $dataToUpdate = Arr::except($validated,'email');
        $success = $customer->update($dataToUpdate);
        if(!$success){
            return redirect()->back()->with('notification', ['types' => 'warning','message' => "Can't able to delete user"]);
        }
        return redirect()->route('admin.show.customers')->with('notification',['type'=>'success','message'=> 'User updated successfully']);
    }
    public function destroy(Customer $customer) {
        if($customer->user->isAdmin){
            return redirect()->back()->with('notification',['type'=>'danger', 'message'=>"Admins can't be deleted"]);
        }
        else {
            if($customer->delete() && $customer->user->delete()){
                return redirect()->back()->with('notification', ['type'=>'success', 'message'=>'User deleted successfully']);
            }
        }
    }
}
