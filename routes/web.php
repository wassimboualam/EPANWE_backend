<?php

use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\JoinRequestsController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/programs", [ProgramsController::class, "index"]);



Route::get("/csrf", fn() => csrf_token());


Route::resource("/request", JoinRequestsController::class)->parameter("request", "id");

Route::prefix("request")->group(function () {
    // Route::resource("", JoinRequestsController::class)->parameter("request", "id");
    Route::post("/setapproval", [JoinRequestsController::class, "setApproval"]);
});

Route::prefix("user")->group(function () {
    Route::post("/register", [UserController::class, "register"]);
    Route::post("/login", [UserController::class, "login"]);

    Route::get("/me", [UserController::class, "me"]);

    Route::put("/edit", [UserController::class, "edit"]);

    Route::post("/checkemailchange", [UserController::class, "checkEmailChange"]);
    Route::put("/editemail/{id}", [UserController::class, "editEmail"]);

    Route::get("/refreshpassword", [UserController::class, "refreshPassword"]);

    Route::get("/logout", [UserController::class, "logout"]);
    
});

Route::get("/test", [TestController::class, "index"]);

