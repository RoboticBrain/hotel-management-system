<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $fillable = ['image','room_number','room_type','status','price'];
   public function bookings() {
     return $this->hasMany(Booking::class,'room_id');
   }
   public function customer() {
     return $this->hasManyThrough(Customer::class,Booking::class,'room_id','id','id','customer_id');
   }

}
