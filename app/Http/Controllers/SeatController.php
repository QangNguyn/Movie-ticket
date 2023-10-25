<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeatRequest;
use App\Models\Room;
use App\Models\Cinema;
use App\Models\Seat;
use Exception;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function view(Room $room)
    {
        $seats = Seat::where('room_id', $room->id)->paginate(20);
        return view('seat.list', compact('room', 'seats'));
    }

    public function create(Room $room)
    {
        return view('seat.add', compact('room'));
    }

    public function store(SeatRequest $request, Room $room)
    {
        try {

            Seat::create([
                'row' => $request->row,
                'column' => $request->column,
                'room_id' => $room->id
            ]);
            return back()->with('message', 'Add seat successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    public function edit(Seat $seat, Room $room)
    {
        return view('seat.edit', compact('seat', 'room'));
    }
    public function update(SeatRequest $request, Seat $seat, Room $room)
    {
        try {
            $seat->update(
                $request->all()
            );
            return redirect()->route('seat.view', $room)->with('message', 'Update seat successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
    public function destroy(Seat $seat)
    {
        try {
            $seat->delete();
            return back()->with('message', 'Delete seat successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
}
