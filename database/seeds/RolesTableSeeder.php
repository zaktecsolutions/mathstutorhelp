<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'tutor']);
        Role::create(['name' => 'parent']);
        Schema::enableForeignKeyConstraints();

    }
}
