<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowtimeRequest;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Showtime;
use Exception;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Showtime::latest()->paginate(10);
        return view('showtime.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('showtime.add', compact('movies', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShowtimeRequest $request)
    {
        try {
            $showtime = new Showtime();
            $showtime->fill($request->all())->save();
            return redirect()->route('showtime.index')->with('message', 'Created showtime successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        $rooms = Room::all();
        $movies = Movie::all();
        return view('showtime.edit', compact('showtime', 'movies', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ShowtimeRequest $request, Showtime $showtime)
    {
        try {
            $showtime->fill($request->all())->save();
            return redirect()->route('showtime.index')->with('message', 'Update showtime successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        try {
            $showtime->delete();
            return back()->with('message', 'Delete showtime successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }
}
