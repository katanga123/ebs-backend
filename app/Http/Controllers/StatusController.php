<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    public function index(){

        $status = Status::all();

        return response()->json([
            'status' => $status
        ],200);

    }
}
