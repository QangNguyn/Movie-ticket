<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectorRequest;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->authorizeResource(Director::class, null, ['except' => ['index']]);
    }
    public function index()
    {
        $directors = Director::latest()->paginate(10);
        return view('director.list', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('director.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DirectorRequest $request)
    {
        $director = new Director();
        $status = $director->fill($request->all())->save();
        $msg = $status ? 'Add new director successfully' : 'Add director failed';
        return redirect()->route('director.index')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        return view('director.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DirectorRequest $request, Director $director)
    {
        $status = $director->fill($request->all())->save();
        $msg = $status ? 'Update director successfully' : 'Update director failed';
        return redirect()->route('director.index')->with('message', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $status = $director->delete();
        $msg = $status ? 'Delete director successfully' : 'Delete director failed';
        return redirect()->route('director.index')->with('message', $msg);
    }
}
