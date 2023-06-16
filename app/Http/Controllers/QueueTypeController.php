<?php

namespace App\Http\Controllers;

use App\Http\Resources\QueueNumberResource;
use App\Http\Resources\QueueTypeResource;
use App\Models\QueueType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request, $id){
        $validated = $request->validate([
            'type_name' => 'required',
            'uniq_code' => 'required'
        ]);

        $data = QueueType::findOrFail($id);

        $data->update($validated);

        return new QueueTypeResource($data);
    }

    public function destroy($id){
        $data = DB::table('queue_types')
                    ->where('id', $id)
                    ->delete();

        $message = 'Data berhasil dihapus!';

        return response()->json(['message' => $message]);
    }
}
