<?php

namespace App\Http\Controllers;

use App\Http\Resources\QueueNumberResource;
use App\Http\Resources\QueueTypeResource;
use App\Models\QueueType;
use Illuminate\Http\Request;

class QueueTypeController extends Controller
{
    public function index(){
        $data = QueueType::all();
        return QueueTypeResource::collection($data);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'type_name' => 'required',
            'uniq_code' => 'required'
        ]);

        $createdData = QueueType::create($validated);

        return new QueueTypeResource($createdData);
    }
}
