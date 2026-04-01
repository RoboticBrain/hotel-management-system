<?php

namespace App\Http\Controllers\SearchFilters;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentFilterController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string',
            'status' => 'nullable|in:Paid,Unpaid',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',    
        ]);
    
        $query = Payment::query();


         $query->when($validated['search'], function ($q) use ($validated) {
            $q->where('payment_intent_id', 'like', "%{$validated['search']}%")
              ->orWhereHas('booking.customer', function ($subQ) use ($validated) {
                  $subQ->where('first_name', 'like', "%{$validated['search']}%")
                       ->orWhere('last_name', 'like', "%{$validated['search']}%");
              });
        });

        $query->when($validated['status'], fn($q) =>
            $q->where('status', $validated['status'])
        );


       $query->when($validated['min_price'], function ($q) use ($validated) {
        $q->where('amount', '>=', $validated['min_price']);
        });
        $query->when($validated['max_price'], function ($q) use ($validated) {
        $q->where('amount', '<=', $validated['max_price']);
        });

        $payments = $query->paginate(10)->withQueryString();

        return view('admin.dashboard.payments.index', compact('payments'));

    }    
}
