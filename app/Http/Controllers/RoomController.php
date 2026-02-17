<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RoomCreateRequest;
use App\Models\Room;


class RoomController extends Controller
{

     public function index() {
        $rooms = Room::paginate(4);
        return view('admin.dashboard.rooms.index',compact('rooms'));
    }
    public function create() {
        return view('admin.dashboard.rooms.create');
    }
    public function store(RoomCreateRequest $request)
    
    {
        // dd($request->get('price'));
        $validated = $request->validated();
        if($request->hasFile('image')){
            $filePath = $request->file('image')->store('/images/rooms','public');
            $validated['image'] = $filePath;
        }
        Room::create($validated);
        return redirect()->back()->with('notification',['type'=>'success','message'=>'Room created successfully']);
    }
    public function edit(Room $room) {
        return view('admin.dashboard.rooms.edit', compact('room'));
    }
    public function update(Room $room, Request $request){
        // dd('hi update');
        $updated_data = $request->validate([
            'room_type'   => 'required|string|',
            'room_number' => 'required|string|max:3|',
            'price'       => 'required|string',
        ]);
        if($room->update($updated_data)){
            return redirect()->route('admin.show.rooms')->with('notification',['type'=>'success','message'=>'Room '. $room->room_number . ' updated successfully']);
        }
    }
    public function destroy(Room $room){
        if($room->status == 'Booked'){
            return redirect()->back()->with('notification',['type'=>'danger','message'=>'The room is booked. unable to delete.']);
        }

        $deleted = $room->delete();
        if($deleted){
            return redirect()->route('admin.show.rooms')->with('notification',['type'=>'success','message'=>'Room deleted successfully']);
        }
        else {
            return redirect()->back()->with('notification',['type'=>'danger','message'=>"Room failed to delete"]);
        }
    }
}
