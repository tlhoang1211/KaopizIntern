<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Role::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Role::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $role = array(
            array(
                'role_name' => 'admin',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'role_name' => 'guest',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
        );

        Role::insert($role);
    }
}
