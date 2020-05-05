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

        $studentgate = Permission::create(['name' => 'student-gate']);
        $tutorgate = Permission::create(['name' => 'tutor-gate']);
        $admingate = Permission::create(['name' => 'admin-gate']);
        $editUsers = Permission::create(['name' => 'edit-users']);
        $manageUsers = Permission::create(['name' => 'digitutor']);

        $studentgate->syncRoles(['student']);
        $tutorgate->syncRoles(['tutor']);
        $admingate->syncRoles(['admin']);
        $editUsers->syncRoles(['admin', 'tutor']);
        $manageUsers->syncRoles(['admin', 'tutor', 'student']);

        Schema::enableForeignKeyConstraints();
    }
}