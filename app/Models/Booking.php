<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function room() {
        return $this->belongsTo(Room::class,'room_id','id');
    }
    protected $casts = ['checked-in' => 'date','checked-out' => 'date'];

    public function getRoomStatusAttribute(){
        $today = now();
        if($today->lt($this->checked_in)){
            return 'Confirmed';
        }
        if($today->between($this->checked_in,$this->checked_out)){
            return 'checked in';
        }
        if($today->gt($this->checked_out)){
            return 'checked_out';
        }

    }

}