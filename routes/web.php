<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MyBookingController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\SearchFilters\RoomFilterController;
use App\Http\Controllers\SearchFilters\CustomerFilterController;
use App\Http\Controllers\SearchFilters\BookingsFilterController;
use App\Http\Controllers\SearchFilters\PaymentFilterController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
// public routes
Route::middleware('web')->group(function () {
    Route::get('/login',[SessionController::class,'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store'])->name('login.store');
  
});

// Authenticated route for logout
Route::middleware('auth')->group(function() {
    Route::post('/logout', [SessionController::class,'destroy'])->name('logout');
    Route::get('/profile/{customer}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/settings/{customer}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update/{customer}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/change-password/user/{user}', [PasswordController::class, 'edit'])->name('profile.change.password');
    Route::post('/password/update/{user}', [PasswordController::class, 'update'])->name('profile.update.password');
    });

// Authenticated routes for Admin user
Route::prefix('admin/dashboard')->middleware(['auth','isAdmin'])->group( function() {
    // Admin controllers
    Route::get('/home',[AdminController::class,'home'])->name('admin.dashboard.home');
    Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/rooms/available',[AdminController::class,'available_rooms'])->name('dashboard.rooms.available');
    Route::get('/rooms/booked',[AdminController::class,'booked_rooms'])->name('dashboard.rooms.booked');
    Route::get('/bookings/today',[AdminController::class,'today_bookings'])->name('dashboard.bookings.today');
    Route::get('/total/revenue',[AdminController::class,'total_revenue'])->name('dashboard.total.revenue');
    // Rooms controllers
    Route::get( '/rooms',[RoomController::class,'index'])->name('admin.show.rooms');
    Route::get( '/room/create',[RoomController::class,'create'])->name('admin.create.room');
    Route::post('/room/create',[RoomController::class,'store'])->name('admin.store.room');
    Route::delete('/room/{room}',[RoomController::class,'destroy'])->name('admin.destroy.room');
    Route::get( '/room/{room}/edit',[RoomController::class,'edit'])->name('admin.edit.room');
    Route::patch('/room/{room}/', [RoomController::class,'update'])->name('admin.update.room');
    // Customer controllers
    Route::get('/customers',  [CustomerController::class, 'index'])->name('admin.show.customers');
    Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.edit.customer');
    Route::patch('/customer/{customer}/',[CustomerController::class,'update'])->name('admin.update.customer');
    Route::delete('/customer/{customer}',[CustomerController::class,'destroy'])->name('admin.destroy.customer');
    // Bookings controllers
    Route::get('/bookings',[BookingsController::class,'index'])->name('admin.show.bookings');
    Route::get('/booking/create',[BookingsController::class,'create'])->name('admin.create.booking');
    Route::post('/booking/create',[BookingsController::class,'store'])->name('admin.store.booking');
    Route::get('bookings/edit/{booking}',[BookingsController::class,'edit'])->name('admin.booking.edit');
    Route::patch('/booking/{booking}',[BookingsController::class,'update'])->name('admin.booking.update');
    Route::delete('/booking/{booking}',[BookingsController::class,'destroy'])->name('admin.booking.destroy');
    // Payment controller 
    Route::get('/payments',[StripeController::class,'index'])->name('admin.show.payments');
    // Room filter controller
    Route::post('/rooms/filter',[RoomFilterController::class,'index'])->name('admin.filter.rooms');
    // Customer Filter controller
    Route::post('/customers/filter',[CustomerFilterController::class,'index'])->name('admin.filter.customers');
    // Bookings filter controller
    Route::post('/bookings/filter',[BookingsFilterController::class,'index'])->name('admin.filter.bookings');
    Route::post('/payments/filter',[PaymentFilterController::class,'index'])->name('admin.filter.payments');
    });
    
// Authenticated routes for User
Route::prefix('user/dashboard')->middleware('auth')->group(function() {
    route::get('/home',[UserDashboardController::class,'home'])->name('user.dashboard.home');
    // User Dashboard controller routes
    route::get('/',[UserDashboardController::class,'index'])->name('user.dashboard');
    route::get('/active/bookings',[UserDashboardController::class,'active_bookings'])->name('user.dashboard.active.bookings');
    route::get('/completed/bookings',[UserDashboardController::class,'completed_bookings'])->name('user.dashboard.completed.bookings');
    route::get('/cancelled/bookings',[UserDashboardController::class,'cancelled_bookings'])->name('user.dashboard.cancelled.bookings');
    route::get('/payment/summary',[UserDashboardController::class,'payment_summary'])->name('user.dashboard.payment.summary');
    
    // User room controllers
    route::get('/rooms',[UserRoomController::class,'index'])->name('user.show.rooms');
    route::get('/rooms/create/{room}',[UserRoomController::class,'create'])->name('user.create.room');
    route::post('/rooms/create/{room}',[UserRoomController::class,'store'])->name('user.book.room');
    route::get('/rooms/available',[UserRoomController::class,'available_rooms'])->name('user.show.rooms.available');
    route::get('/rooms/booked',[UserRoomController::class,'booked_rooms'])->name('user.show.rooms.booked');
    
    // My bookings controller
    route::get('/bookings',[MyBookingController::class,'index'])->name('user.show.bookings');
    
});

// Route::get('payment/stripe/{booking}',[StripeController::class,'index'])->name('user.payment.stripe');
Route::get('stripe/checkout/{booking}',[StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('payment/success/{booking}', [StripeController::class,'success'])->name('payment.success');
Route::get('payment/cancel/{booking}', [StripeController::class,'cancel'])->name('payment.cancel');

Route::get('user/email', function() {
    $booking = App\Models\Booking::find(1);
    return new App\Mail\BookingConfirmed($booking);
});