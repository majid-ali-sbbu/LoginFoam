<?php

use App\Http\Controllers\Customcontroller;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Models\Schedule;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

// Login and Register Routes
Route::post('loginMatch', [UserController::class,'login'])->name('loginMatch');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::any('/addUserView', function () {
    return view('addUser');
})->name('addUserView');

Route::any('addUser', [UserController::class,'addUser'])->name('addUser');


Route::post('registerSave', [UserController::class,'register'])
->name('registerSave');

//MiddleWare Authenticated User Routes
Route::get('dashboard', [UserController::class, 'dashboardPage'])
    ->name('dashboard')
    ->middleware(['auth:admin']);


// Map Routes
Route::get('/map', [MapController::class, 'showMap'])->name('map.show');
Route::post('/map/process', [MapController::class, 'processCoordinates'])->name('map.process');




Route::get('logout', [UserController::class,'logout'])->name('logout');

// User Management Routes
Route::get('users', [UserController::class,'index'])->name('users');
Route::get('/user', function(){
    return view('user');
})->name('user');

Route::get('showuser/{id}',[UserController::class, 'showusers'])->name('showuser');
Route::get('view/{id}',[UserController::class, 'index'])->name('view');
Route::get('updateUser/{id}',[UserController::class, 'edit'])->name('updateUser');

Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser.post');

Route::delete('updateUser/{id}', [UserController::class, 'destroy'])->name('updateUser.destroy');



// Calendar Routes
Route::get('calendar', [ScheduleController::class, 'calendar'])->name('calendar');
Route::get('/events', [ScheduleController::class, 'getEvents'])->name('events.get');
Route::post('/events', [ScheduleController::class, 'store'])->name('events.store');
Route::patch('/schedule/{id}', [ScheduleController::class, 'update'])->name('events.update');
Route::delete('/schedule/{id}', [ScheduleController::class, 'delete'])->name('events.delete');


// SideWeb Route
Route::get('/side', function(){
    return view('side');
})->name('side');


// Google Authentication Routes
Route::get('login/google', [Customcontroller::class,'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [Customcontroller::class, 'handleGoogleCallback']);
