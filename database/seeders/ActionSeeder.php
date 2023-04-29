<?php

namespace Database\Seeders;

use App\Models\Action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Action::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'id' => 1,
                'name' => 'update'
            ]
        );

        Action::updateOrCreate(
            [
                'id' => 2
            ],
            [
                'id' => 2,
                'name' => 'create'
            ]
        );

        Action::updateOrCreate(
            [
                'id' => 3
            ],
            [
                'id' => 3,
                'name' => 'delete'
            ]
        );
    }
}
