<?php

namespace App\Http\Controllers;

use App\Mail\PasswordRefreshedMail;
use App\Mail\VerifyEmailChangeMail;
use App\Mail\WelcomeMail;
use App\Models\EmailChangeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\info;

class UserController extends Controller
{

    public function me() {
        $user = Auth::user();

        if ($user == NULL) {
            return response(content: "No user for now",status: 400);
        } else {
            return response($user->toJson(), status: 200);
        }
    }
    public function register(Request $request) {

        $validated = $request->validate([
            "firstName" => "required|string",
            "lastName" => "required|string",
            "age" => "required|integer",
            "email" => "required|email",
            "gender" => "required|string|in:male,female"
        ]);


        $result = User::where("email", $validated["email"])->first();

        if ($result != null) {
            return [
                "title" => "Not new here",
                "message" => "There already exists a user with the email " . $request->email,
                "type" => "error", 
            ];
        }

        $newPassword = Str::password();

        info($newPassword);

        User::create([
            "first_name" => $request->firstName,
            "last_name" => $request->lastName,
            "email" => $request->email,
            "password" => Hash::make($newPassword),
            "age" => $request->age,
            "gender" => $request->gender,
            "role" => "participant",
        ]);

        Mail::to($request->email)->send(new WelcomeMail($newPassword));

        return [
            "title" => "Account created, password sent",
            "message" => 
"You have successfully been registered.
Now go get your password from your email and log in.",
            "type" => "success", 
        ];
    }
    public function login(Request $request) {

        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::attempt($credentials)) {
                return [
                    "title" => "Wrong input",
                    "message" => "The combination of email and password is wrong.",
                    "type" => "error", 
                ];
            }

            $request->session()->regenerate();

            return [
                "title" => "Successfully logged in",
                "message" => "You have successfully logged in.",
                "type" => "success", 
            ];
        }
        catch (\Throwable $th) {
            return response(
                content: [
                    "title" => "Error somewhere",
                    "message" => "Error ".$th->getCode().": ".$th->getMessage(),
                    "type" => "error", 
                ],
                status: 400,
            );

        }
    }

    public function edit(Request $request) {
        try {
            $request->validate([
                "first_name" => "required|string",
                "last_name" => "required|string",
                "age" => "required|integer",
                "gender" => "required|string|in:male,female"
            ]);

            Auth::user()->update([
                "first_name" => $request["first_name"],
                "last_name" => $request["last_name"],
                "age" => $request["age"],
                "gender" => $request["gender"]
            ]);
            
            return [
                "type" => "success",
                "message" => "Yippee"
            ];
        } catch (\Throwable $th) {
            return [
                "type" => "error",
                "message" => "Error ".$th->getCode().": ".$th->getMessage()
            ];
        }
    }

    public function checkEmailChange (Request $request) {
        try {
            $newEmail = $request->getContent();
            $user = Auth::user();
            Mail::to($user->email)->send(new VerifyEmailChangeMail($newEmail));
            
            if ($changeRequest = EmailChangeRequest::where("user_id", $user["id"])->first()) {
                $changeRequest->update([
                    "new_email" => $newEmail
                ]);
            } else {
                EmailChangeRequest::create([
                    "user_id" => $user["id"],
                    "new_email" => $newEmail
                ]);
            }

            return [
                "type" => "success",
                "message" => "A verification email has been sent to your current address. Please check it out to continue with the email change, and make sure you do so in your current browser."
            ];

            
        } catch (\Throwable $th) {
            throw $th;
            return [
                "type" => "error",
                "message" => "Error ".$th->getCode().": ".$th->getMessage()
            ];
        }
    }

    public function editEmail(Request $request) {
        try {
            $user = User::find($request["id"]);
            $changeRequest = EmailChangeRequest::find($user->id);

            $user->update([
                "email" => $changeRequest["new_email"]
            ]);
            
            return [
                "title" => "Email changed successfully",
                "message" => "Email has been successfully changed into ".$request['email'],
                "type" => "success",
                "duration" => 5000
            ];
        } catch (\Throwable $th) {
            throw $th;
            return [
                "type" => "error",
                "message" => "Error ".$th->getCode().": ".$th->getMessage()
            ];
        }
    }

    public function refreshPassword(Request $request) {
        $user = Auth::user();
        if ($user == NULL) {
            return [
                "title" => "User not found",
                "message" => "Go back to sign up so that you can refresh your password.",
                "type" => "error"
            ];
        }
        $newPassword = Str::password();

        $user->update([
            "password" => Hash::make($newPassword)
        ]);
        Mail::to($user["email"])->send(new PasswordRefreshedMail($newPassword));

        return [
            "title" => "Password refreshed successfully",
            "message" => "Please go to your email inbox to find out what the new password is.",
            "type" => "success",
            "duration" => 5000
        ];


    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return [
            "title" => "Logout successful",
            "message" => "You have been successfully logged out",
            "type" => "info"
        ];
    }
}
