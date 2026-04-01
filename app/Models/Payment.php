<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'stripe_session_id',
        'payment_intent_id',
        'amount',
        'currency',
        'status',
    ];
    public function booking() {
        return $this->belongsTo(Booking::class,'booking_id','id');   
        }
}
