<?php

namespace Database\Seeders;

use App\Models\AdvanceUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AdvanceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = AdvanceUser::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            AdvanceUser::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $users = array(
            array(
                'first_name' => 'James',
                'last_name' => 'Smith',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Michael',
                'last_name' => 'Smith',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Robert',
                'last_name' => 'Smith',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Maria',
                'last_name' => 'Garcia',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'David',
                'last_name' => 'Smith',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Maria',
                'last_name' => 'Rodriguez',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Mary',
                'last_name' => 'Smith',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Maria',
                'last_name' => 'Hernandez',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'Maria',
                'last_name' => 'Martinez',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'first_name' => 'James',
                'last_name' => 'Johnson',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
        );

        AdvanceUser::insert($users);
    }
}
