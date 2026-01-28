<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// public routes
Route::middleware('web')->group(function () {
    Route::get('/login',[SessionController::class,'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
});

// Authentcated route for logout
Route::middleware('auth')->group(function() {
    Route::post('/logout', [SessionController::class,'destroy'])->name('logout');
});

// Authenticated routes for Admin user
Route::prefix('admin/dashboard')->middleware(['auth','isAdmin'])->group( function() {
    // Admin controllers
    Route::get('/home',[AdminController::class,'home'])->name('admin.dashboard.home');
    Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
    // Rooms controllers
    Route::get( '/rooms',[RoomController::class,'index'])->name('admin.show.rooms');
    Route::get( '/room/create',[RoomController::class,'create'])->name('admin.create.room');
    Route::post('/room/create',[RoomController::class,'store'])->name('admin.store.room');
    Route::delete('/room/{room}',[RoomController::class,'destroy'])->name('admin.destroy.room');
    Route::get( '/room/{room}/edit',[RoomController::class,'edit'])->name('admin.edit.room');
    Route::patch('/room/{room}/', [RoomController::class,'update'])->name('admin.update.room');
    // Customer controllers
    Route::get('/customers',  [CustomerController::class, 'index'])->name('admin.show.customers');
    Route::get('/profile/{customer}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.edit.customer');
    Route::patch('/customer/{customer}/',[CustomerController::class,'update'])->name('admin.update.customer');
    Route::delete('/customer/{customer}',[CustomerController::class,'destroy'])->name('admin.destroy.customer');
    // Bookings controllers
    Route::get('/bookings',[BookingsController::class,'index'])->name('admin.show.bookings');
    Route::get('/bookings/edit/{booking}',[BookingsController::class,'edit'])->name('admin.booking.edit');
    Route::get('/booking/create',[BookingsController::class,'create'])->name('admin.create.booking');
    Route::post('/booking/create',[BookingsController::class,'store'])->name('admin.store.booking');

    });
