<?php

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

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            
        ]);
        $admin->assignRole('admin');

        $tutor = User::create([
            'name' => 'Tutor User',
            'email' => 'tutor@tutor.com',
            'password' => Hash::make('password'),
            
        ]);
        $tutor->assignRole('tutor');

        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@student.com',
            'password' => Hash::make('password'),
            'course_id' => '1',
            'tutor_id' => $tutor->id
        ]);
        $student->assignRole('student');
        
        Digitutor::create([
            'user_id' => $student->id,
        ]);

        Schema::enableForeignKeyConstraints();

    }
    
}
