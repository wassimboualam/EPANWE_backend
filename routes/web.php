<?php

use App\Http\Controllers\CsrfController;
use App\Http\Controllers\PartnershipRequestController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\JoinRequestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/programs", [ProgramsController::class, "index"]);



Route::get("/csrf", [CsrfController::class, "index"]);


Route::resource("/request", JoinRequestController::class)->parameter("request", "id");

Route::prefix("request")->group(function () {
    // Route::resource("", JoinRequestController::class)->parameter("request", "id");
    Route::post("/setapproval", [JoinRequestController::class, "setApproval"]);
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

Route::prefix("partner")->group(function () {
    Route::get("/", [PartnershipRequestController::class, "index"]);
    Route::delete("/delete/{id}", [PartnershipRequestController::class, "destroy"]);

});

Route::get("/test", [TestController::class, "index"]);

