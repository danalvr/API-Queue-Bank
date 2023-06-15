<?php

namespace App\Http\Controllers;

use App\Models\QueueNumber;
use Illuminate\Http\Request;

class QueueNumberController extends Controller
{
    public function index(){
        $data = QueueNumber::all();
        return response()->json($data);
    }
}
