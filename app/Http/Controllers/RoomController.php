<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Cinema;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->authorizeResource(Room::class, null, ['except' => ['index']]);
    }

    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('room.list', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cinemas = Cinema::all();
        return view('room.add', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $room = new Room();
        $status = $room->fill($request->all())->save();
        $msg = $status ? 'Create room successfully' : 'Create room failed';
        return redirect()->route('room.index')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $cinemas = Cinema::all();
        return view('room.edit', compact('room', 'cinemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
}