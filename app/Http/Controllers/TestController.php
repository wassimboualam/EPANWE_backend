<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request) {
        try {
            User::create([
                'first_name' => "The",
                'last_name' => "admin",
                'email' => "spicelenderenterprises@gmail.com",
                'password' => Hash::make("AmBouToBlow"),
                'age' => 100,
                'role' => "admin",
            ]);
            return "Admin created successfully";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
