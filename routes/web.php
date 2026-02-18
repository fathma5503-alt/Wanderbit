<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageController as AdminPackage;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\BlogController as frontblog;
use App\Http\Controllers\AuthController as AuthenticationController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TeamController;


/* Auth routes */
Route::middleware('guest')->group(function(){

    Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::get('/register', [AuthenticationController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthenticationController::class, 'register']);
});


Route::middleware('auth')->group(function(){

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

});


// ============================================
// PUBLIC ROUTES (No Authentication Required)
// ============================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


// Package Routes (Public)
Route::get('/package', [AdminPackage::class, 'publicIndex'])->name('package');
Route::get('/package/{id}', [AdminPackage::class, 'showPublic'])->name('package_details');

// ============================================
// ADMIN AUTHENTICATION ROUTES
// ============================================

Route::get('/admin', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/register', [AuthController::class, 'showRegister'])->name('admin.register');
Route::post('/admin/register', [AuthController::class, 'register'])->name('admin.register.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ============================================
// ADMIN ROUTES (Requires Authentication)
// ============================================

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    // Dashboard
     Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');

     Route::resource('blogs', BlogController::class);
     Route::resource('testimonials', TestimonialController::class);
     Route::resource('team', TeamController::class);


    // Category 
    Route::get('/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::post('create_cate', [CategoryController::class, 'create_cate'])->name('create_cate');
    Route::get('/show_category', [CategoryController::class, 'show_category'])->name('show_category');
    Route::delete('delete_category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
    Route::get('update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::put('update_category/{id}', [CategoryController::class, 'update'])->name('category.update');

    // Package
    Route::get('/create_package', [PackageController::class, 'create_package'])->name('create_package');
    Route::post('create_pack', [PackageController::class, 'create_pack'])->name('create_pack');
    Route::get('/show_package', [PackageController::class, 'show_package'])->name('show_package');
    Route::delete('delete_package/{id}', [PackageController::class, 'destroy'])->name('delete_package');
    Route::get('update_package/{id}', [PackageController::class, 'update_package'])->name('update_package');
    Route::put('update_package/{id}', [PackageController::class, 'update'])->name('package.update');

    // Booking (Admin)
    Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::patch('/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('/admin/booking/{booking}', [BookingController::class, 'show'])->name('admin.booking.show');


    });

// ============================================
// USER BOOKING ROUTES (Requires Authentication)
// ============================================

Route::middleware('auth')->group(function () {

Route::get('/booking/create/{package_id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}', [BookingController::class, 'show'])->name('booking.show');
    Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
    Route::put('/booking/{id}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::get('/my_bookings', [BookingController::class, 'myBookings'])->name('booking.myBookings');
});

Route::get('/blogs', [BlogController::class, 'publicIndex'])->name('blogs.index');
Route::get('/blogs/{slug}', [BlogController::class, 'showPublic'])->name('blogs.show');
Route::get('admin/blogs/index', [BlogController::class, 'index'])->name('admin.blog.index');

Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial.index');
Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
Route::put('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
Route::delete('/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.delete');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
Route::get('/team/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
Route::put('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
Route::delete('/team/delete/{id}', [TeamController::class, 'destroy'])->name('team.delete');
