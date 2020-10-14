<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Customer::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Customer::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $users = array(
            array(
                'name' => 'Alex',
                'class' => 'A',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Drake',
                'class' => 'B',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Ban',
                'class' => 'A',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Chris',
                'class' => 'B',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Justin',
                'class' => 'A',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Nicki',
                'class' => 'B',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Nami',
                'class' => 'A',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Kendra',
                'class' => 'B',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Tim',
                'class' => 'A',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'name' => 'Zoey',
                'class' => 'B',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
        );

        Customer::insert($users);
    }
}
