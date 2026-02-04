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

    public function getCustomerStatusAttribute(){
        $today = now();
        if(isset($this->cancelled_at)){
            $this->room->status = 'Available';
            $this->room->save();
            $this->payment_status = 'returned';
            $this->save();
            return 'Cancelled';
        }
        if($today->lt($this->checked_in)){
            $this->room->status = 'Booked';
            $this->room->save();
            return 'Confirmed';
        }
        if($today->between($this->checked_in,$this->checked_out)){
            // dd($this);
            $this->room->status = 'Booked';
            $this->room->save();
            return 'Checked_in';
        }
        if($today->gt($this->checked_out)){
            $this->room->status = "Available";
            $this->room->save();
            return 'Checked_out';
        }


    }

}