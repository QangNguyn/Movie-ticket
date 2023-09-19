<?php

namespace App\Http\Controllers;

use App\Models\Performer;
use Illuminate\Http\Request;

class PerformerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $performers = Performer::latest()->paginate(10);
        return view('performer.list', compact('performers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('performer.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $performer = new Performer();
        $status = $performer->fill($request->all())->save();
        $message = $status ? "created successfully" : "failed";
        return redirect()->route('performer.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Performer $performer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Performer $performer)
    {
        return view('performer.edit', compact('performer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Performer $performer)
    {

        $status = $performer->fill($request->all())->save();
        $message = $status ? "updated successfully" : "updated failed";
        return redirect()->route('performer.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Performer $performer)
    {
        $status = $performer->delete();
        $message = $status ? "Deleted successfully" : "Deleted failed";
        return redirect()->route('performer.index')->with('message', $message);
    }
}
