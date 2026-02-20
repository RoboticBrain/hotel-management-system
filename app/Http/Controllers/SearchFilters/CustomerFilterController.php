<?php

namespace App\Http\Controllers\SearchFilters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
class CustomerFilterController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string',
        ]);
        // dd($validated['search']);
        $query = Customer::query();
        $search = trim(request('search', ''));

        $query->when($search !== '', function ($q) use ($search) {
        $q->where(function ($sub) use ($search) {
        $sub->where('first_name', 'like', "%{$search}%")
            ->orWhere('last_name', 'like', "%{$search}%")
            ->orWhere('phone_number', 'like', "%{$search}%")
            ->orWhere('address', 'like', "%{$search}%")
            ->orWhereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('email', 'like', "%{$search}%");
                });
            });
        });
        $customers = $query->paginate(10)->withQueryString();
        // dd($customers);
        return view('admin.dashboard.customers.index', compact('customers'));
    }
}
