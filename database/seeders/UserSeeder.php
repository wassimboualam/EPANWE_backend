<?php

namespace Database\Seeders;

use App\Models\JoinRequest;
use App\Models\Request;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("users")->truncate();
        DB::table("requests")->truncate();
        $users = [
            ['John', 'Smith', 'john.smith@email.com', 18, 'pending', 'male'],
            ['Emma', 'Johnson', 'emma.johnson@email.com', 22, 'approved', 'female'],
            ['Liam', 'Williams', 'liam.williams@email.com', 17, 'rejected', 'male'],
            ['Olivia', 'Brown', 'olivia.brown@email.com', 20, 'pending', 'female'],
            ['Noah', 'Jones', 'noah.jones@email.com', 19, 'approved', 'male'],
            ['Sophia', 'Garcia', 'sophia.garcia@email.com', 24, 'pending', 'female'],
            ['James', 'Miller', 'james.miller@email.com', 23, 'rejected', 'male'],
            ['Isabella', 'Davis', 'isabella.davis@email.com', 16, 'pending', 'female'],
            ['Benjamin', 'Rodriguez', 'benjamin.rodriguez@email.com', 21, 'approved', 'male'],
            ['Mia', 'Martinez', 'mia.martinez@email.com', 25, 'rejected', 'female'],
            ['Lucas', 'Hernandez', 'lucas.hernandez@email.com', 18, 'pending', 'male'],
            ['Charlotte', 'Lopez', 'charlotte.lopez@email.com', 19, 'approved', 'female'],
            ['Henry', 'Gonzalez', 'henry.gonzalez@email.com', 22, 'pending', 'male'],
            ['Amelia', 'Wilson', 'amelia.wilson@email.com', 20, 'rejected', 'female'],
            ['Alexander', 'Anderson', 'alex.anderson@email.com', 23, 'approved', 'male'],
            ['Evelyn', 'Thomas', 'evelyn.thomas@email.com', 17, 'pending', 'female'],
            ['Daniel', 'Taylor', 'daniel.taylor@email.com', 21, 'approved', 'male'],
            ['Harper', 'Moore', 'harper.moore@email.com', 18, 'rejected', 'female'],
            ['Matthew', 'Jackson', 'matthew.jackson@email.com', 24, 'pending', 'male'],
            ['Ella', 'Martin', 'ella.martin@email.com', 19, 'approved', 'female'],
        ];

        foreach ($users as [$firstName, $lastName, $email, $age, $status, $gender]) {

            $user = User::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => 'password123',
                'age' => $age,
                'gender' => $gender
            ]);

            JoinRequest::create([
                'user_id' => $user->id,
                'status' => $status,
            ]);
        }

        // Optional admin account
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@email.com',
            'password' => 'AmBoutToBlowTwice',
            'age' => 30,
            'gender' => 'clank',
            'role' => 'admin',
        ]);
    }
}