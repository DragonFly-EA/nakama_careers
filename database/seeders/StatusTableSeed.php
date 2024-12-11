<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Type;
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
                'name' => 'Pending',
                'color' => '#FFC107',
            ],
            [
                'name' => 'Under Review',
                'color' => '#007BFF',
            ],
            [
                'name' => 'Interview Scheduled',
                'color' => '#17A2B8',
            ],
            [
                'name' => 'Interview Completed',
                'color' => '#6C757D',
            ],
            [
                'name' => 'Rejected',
                'color' => '#DC3545',
            ],
            [
                'name' => 'Accepted',
                'color' => '#28A745',
            ],
        ];
        $types = [
            [
                'name'=>'Full-Time',
            ],
            [
                'name'=>'Part Time',
            ],
            [
                'name'=>'Contract',
            ],
            [
                'name'=>'Freelance',
            ],
            [
                'name'=>'Consultant',
            ],
            [
                'name'=>'Internship',
            ],
        ];
        Status::insert($status);
        Type::insert($types);
    }
}
