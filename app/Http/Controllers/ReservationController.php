<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index(){

        $reservations = Reservation::all();

        return response()->json([
            'reservations' => $reservations
        ]);
    }


    public function store(ReservationRequest $request){
        
        Reservation::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phoneNumber'   => $request->phoneNumber,
            'attendees'     => $request->attendees,
            'date'          => $request->date,
            'time'          => $request->time,
            'status_id'     => 0
        ]);

        return response()->json([
            'created' => true,
            'message' => 'Successfully Created'
        ], 201);

    }

    public function update(ReservationRequest $request,Reservation $reservation){
        
        $reservation->update([
            "date"=> $request->date,
            "time"=> $request->time,
            "attendees"=> $request->attendees,
            "status_id"=> $request->status_id
        ]);

        return response()->json(['updated' => true], 201);
    }


}
