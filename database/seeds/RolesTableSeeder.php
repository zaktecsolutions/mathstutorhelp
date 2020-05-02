<?php

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        Permission::truncate();
        Role::truncate();

        $admin = Role::create(['name' => 'admin']);
        $student = Role::create(['name' => 'student']);
        $tutor = Role::create(['name' => 'tutor']);

        $editUsers = Permission::create(['name' => 'edit-users']);
        $manageUsers = Permission::create(['name' => 'manage-users']);

        $editUsers->syncRoles(['admin', 'tutor']);
        $manageUsers->syncRoles(['admin', 'tutor', 'student']);

        Schema::enableForeignKeyConstraints();
    }
}
