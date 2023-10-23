<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use App\Models\Film;
use App\Models\Cast;
use Illuminate\Http\Request;

class PeranController extends Controller
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
    public function create(Film $film)
    {
        $casts = Cast::select('id', 'nama')->get();
        return view('peran.create', compact('film', 'casts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Film $film, Request $request)
    {
        //
        $request->validate([
            'cast_id' => 'required',
            'nama' => 'required'
        ]);

        $peran = new Peran;
        $peran->film_id = $film->id;
        $peran->cast_id = $request->cast_id;
        $peran->nama = $request->nama;
        $peran->save();

        return redirect()->route('film.show', $film->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Peran $peran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peran $peran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peran $peran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peran $peran)
    {
        //
    }
}
