<?php

use App\Role;
use App\User;
use App\Digitutor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $tutorRole = Role::where('name', 'tutor')->first();
        $parentRole = Role::where('name', 'parent')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            
        ]);

        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@student.com',
            'password' => Hash::make('password'),
            'course_id' => '1',
        ]);
        Digitutor::create([
            'user_id' => $student->id,
        ]);

        $tutor = User::create([
            'name' => 'Tutor User',
            'email' => 'tutor@tutor.com',
            'password' => Hash::make('password'),
            
        ]);

        $parent = User::create([
            'name' => 'Parent User',
            'email' => 'parent@parent.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $student->roles()->attach($studentRole);
        $tutor->roles()->attach($tutorRole);
        $parent->roles()->attach($parentRole);
        Schema::enableForeignKeyConstraints();

    }
    
}
