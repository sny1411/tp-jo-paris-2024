<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $athletes = Athlete::all();
        return view('athletes.index', ['athletes' => $athletes,
            'message'=>sprintf("Actuellement %d athlete(s) dans la base", count($athletes))]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Athlete $athlete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Athlete $athlete)
    {
        //
    }
}
