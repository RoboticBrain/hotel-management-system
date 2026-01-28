<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;
    protected $fillable = ['image','room_number','room_type','status','price'];
   public function customers() {
        return $this->belongsToMany(Customer::class,'bookings','room_id','customer_id')->withPivot('room_status','checked_in','checked_out');
   }
}
