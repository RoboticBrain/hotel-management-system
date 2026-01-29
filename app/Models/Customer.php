<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $fillable = ['first_name','last_name','address','contact','phone_number'];
    function user() {
        return $this->belongsTo(User::class);
    }
     public function room() {
        return $this->hasManyThrough(Room::class,Booking::class,'customer_id','id','id','room_id');
    }
}
