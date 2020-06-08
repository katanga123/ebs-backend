<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'date', 'attendees', 'time', 'name', 'email', 'phoneNumber', 'status_id'
    ];
}
