<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTuningRequest;
use App\Models\Tuning;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TuningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTuningRequest $request)
    {
        Tuning::create([
            'scheduled_at' => "{$request['date']} {$request['time']['time']}"
        ]);

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'tuning-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuning  $tuning
     * @return \Illuminate\Http\Response
     */
    public function show(Tuning $tuning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuning  $tuning
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuning $tuning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuning  $tuning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuning $tuning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuning  $tuning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tuning $tuning)
    {
        //
    }
}
