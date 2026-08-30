<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Mail;

class TestController extends Controller
{
    public function index(Request $request) {
        try {
            Mail::to("wassimboualam05@gmail.com")->send(new TestMail());
            return "test sent";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
