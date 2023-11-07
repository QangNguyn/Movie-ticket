<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with(['director', 'performers'])->latest()->paginate(10);
        if ($movies->count() > 0) {
            $message = 'Successfully';
            $statusCode = 200;
        } else {
            $message = 'Failed';
            $statusCode = 500;
        }
        return new MovieCollection($movies, $statusCode, $message);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::with(['performers', 'director'])->find($id);
        if ($movie) {
            $message = 'Successfully';
            $statusCode = 200;
            $data = new MovieResource($movie);
        } else {
            $message = 'Not Found';
            $statusCode = 404;
            $data = [];
        }
        return response()->json([
            'message' => $message,
            'statusCode' => $statusCode,
            'data' => $data
        ]);
    }

    public function comingSoon()
    {
        $comingSoonMovies = Movie::with(['director', 'performers'])->where('coming_soon', '1')->get();
        if ($comingSoonMovies->count() > 0) {
            $statusCode = 200;
            $message = 'Successfully';
        } else {
            $statusCode = 400;
            $message = 'Not Found';
        }
        return new MovieCollection($comingSoonMovies, $statusCode, $message);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
