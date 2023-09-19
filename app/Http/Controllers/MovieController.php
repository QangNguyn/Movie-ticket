<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Performer;
use Exception;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies =  Movie::latest()->paginate(10);
        return view('movie.list', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $directors = Director::all();
        $performers = Performer::all();
        return view('movie.add', compact('directors', 'performers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $movie = new Movie();
            $movie->fill($request->all())->save();
            $movie->performers()->attach($request->performer_id);
            return redirect()->route('movie.index')->with('message', 'Created successfully');
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $directors = Director::all();
        $performers = Performer::all();
        return view('movie.edit', compact('directors', 'performers', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        try {
            $movie->fill($request->all())->save();
            $movie->performers()->sync($request->performer_id);
            return redirect()->route('movie.index')->with('message', "updated successfully");
        } catch (Exception $e) {
            return back()->with('message', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        try {
            $movie->performers()->detach();
            $movie->delete();
            return redirect()->route('movie.index')->with('message', 'Deleted successfully!');
        } catch (Exception $e) {
            return back()->with('message', 'Failed to delete');
        }
    }
}
