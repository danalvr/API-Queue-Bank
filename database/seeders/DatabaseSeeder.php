<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\QueueNumber;
use App\Models\QueueType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        QueueType::factory()->create([
            'type_name' => 'Teller A',
            'uniq_code' => 'A00'
        ]);
        QueueType::factory()->create([
            'type_name' => 'Teller B',
            'uniq_code' => 'B00',
        ]);
        QueueType::factory()->create([
            'type_name' => 'Teller C',
            'uniq_code' => 'C00',
        ]);

        for($i=1; $i<=10; $i++){
            QueueNumber::factory()->create([
                'code_number' => 'A00'.$i,
                'status' => null,
                'queue_type_id' => 1,
            ]);
            QueueNumber::factory()->create([
                'code_number' => 'B00'.$i,
                'status' => null,
                'queue_type_id' => 2,
            ]);
            QueueNumber::factory()->create([
                'code_number' => 'C00'.$i,
                'status' => null,
                'queue_type_id' => 3,
            ]);
        }
    }
}
