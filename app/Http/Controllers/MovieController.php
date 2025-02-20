<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $data = $request->all();
        $movie = new Movie();
        $movie->fill($data);
        $movie->save();

        if (true) {
            // insufficient balance, roll back the transaction
            DB::rollback();
        } else {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
{
    return view('browse_movies', [
        'movies' => Movie::where('runtime', '<', 60)
            ->where('imdb.rating', '>', 8.5)
            ->orderBy('imdb.rating', 'desc')
            ->take(10)
            ->get()
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
