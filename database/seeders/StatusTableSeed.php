<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $status = [
            [
                'name'=>'Pending',
            ],
            [
                'name'=>'Under Review'
            ],
            [
              'name'=>'Interview Scheduled'
            ],
            [
                'name'=>'Interview Completed',
            ],
            [
                'name'=>'Rejected',
            ],
        ];
        Status::insert($status);
    }
}
