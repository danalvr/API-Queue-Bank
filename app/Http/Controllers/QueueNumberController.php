<?php

namespace App\Http\Controllers;

use App\Http\Resources\QueueNumberDetailResource;
use App\Http\Resources\QueueNumberResource;
use App\Models\QueueNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request){
        $query = DB::table('queue_types')
                    ->join('queue_numbers', 'queue_types.id', '=', 'queue_numbers.queue_type_id')
                    ->where('queue_types.id', $request->queueTypeId)
                    ->get();

        $counter = count($query) + 1;

        $data = [
            'code_number' => $query->pluck('uniq_code')->first().$counter,
            'queue_type_id' => $request->queueTypeId
        ];

        $createdData = QueueNumber::create($data);

        return new QueueNumberDetailResource($createdData);
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'status' => 'required'
        ]);

        $data = QueueNumber::findOrFail($id);

        $data->update($validated);

        return new QueueNumberDetailResource($data);
    }

    public function destroy($queueTypeId){
        $data = DB::table('queue_numbers')
                    ->where('queue_type_id', $queueTypeId)
                    ->delete();

        $message = 'Data berhasil dihapus!';

        return response()->json(['message' => $message]);
    }

    public function filterByType(Request $request){
        $query = DB::table('queue_types')
                    ->join('queue_numbers', 'queue_types.id', '=', 'queue_numbers.queue_type_id')
                    ->where('queue_types.id', $request->queueTypeId)
                    ->get();
        
        return response()->json($query);
    }
}
