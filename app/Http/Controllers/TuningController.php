<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTuningRequest;
use App\Http\Requests\UpdateTuningRequest;
use App\Mail\TuningConfirmed;
use App\Models\Client;
use App\Models\Tuning;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TuningController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Schedule', [
            'tunings' => Tuning::orderBy('scheduled_at', 'asc')->where('scheduled_at', '>', Carbon::now())->with(['address','client'])->get()
        ]);
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
    public function update(UpdateTuningRequest $request, Tuning $tuning)
    {
        $client = Client::firstOrCreate([
            'email' => $request['email']
        ], [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name']
        ]);

        $address = $client->addresses()->firstOrCreate([
            'street' => $request['street']
        ], [
            'city' => $request['city'],
            'state' => $request['state'],
            'zip' => $request['zip']
        ]);

        $tuning->update([
            'client_id' => $client->id,
            'address_id' => $address->id
        ]);

        Mail::to($client->email)->send(new TuningConfirmed($tuning));

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'tuning-confirmed');
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
