<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shift;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shift::create([
            'name' => 'Morning Shift',
            'start_time' => '08:00:00',
            'end_time' => '16:00:00',
        ]);

        Shift::create([
            'name' => 'Evening Shift',
            'start_time' => '16:00:00',
            'end_time' => '00:00:00',
        ]);

        // Add more shifts as needed
    }
}
