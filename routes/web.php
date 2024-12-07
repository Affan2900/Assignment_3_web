<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactCotroller;
use App\Http\Controllers\TestimonialController;
use App\Http\Middleware\AuthenticateUser;

//Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

//Animal Routes
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');

//Service Routes
Route::get('/servies', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

//Contact Routes
Route::get('/contact', [ContactCotroller::class, 'index'])->name('contact.index');

//Testimonial Routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');

// Remove admin testimonial edit and delete routes
Route::middleware([AuthenticateUser::class])->group(function () {
    Route::get('/admin/animals', [AnimalController::class, 'adminIndex'])->name('admin.animals.index');
    Route::get('/admin/animals/create', [AnimalController::class, 'create'])->name('admin.animals.create');
    Route::post('/admin/animals', [AnimalController::class, 'store'])->name('admin.animals.store');
    Route::get('/admin/animals/{id}/edit', [AnimalController::class, 'edit'])->name('admin.animals.edit');
    Route::put('/admin/animals/{id}', [AnimalController::class, 'update'])->name('admin.animals.update');
    Route::delete('/admin/animals/{id}', [AnimalController::class, 'destroy'])->name('admin.animals.destroy');

    // CRUD operations for Services
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    // Admin can only view testimonials, but cannot edit or delete
    Route::get('/admin/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
});

// Add user-specific testimonial routes
Route::middleware('auth')->group(function () {
    // User can create their own testimonial
    Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

    // User can edit their own testimonial
    Route::get('/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
});

Route::get('/profile', function () {
    return 'This is a protected route!';
   })->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
