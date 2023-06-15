<?php

namespace App\Http\Controllers;

use App\Http\Resources\QueueNumberDetailResource;
use App\Http\Resources\QueueNumberResource;
use App\Models\QueueNumber;
use Illuminate\Http\Request;

class QueueNumberController extends Controller
{
    public function index(){
        $data = QueueNumber::all();
        return QueueNumberResource::collection($data);
    }

    public function show($id){
        $data = QueueNumber::findOrFail($id);
        return new QueueNumberDetailResource($data);
    }
}
