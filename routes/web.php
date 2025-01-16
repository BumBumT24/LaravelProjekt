<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StudentController;  // Dodaj import StudentController
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\OcenaController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DyrektorMiddleware;
use App\Http\Middleware\NauczycielMiddleware;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Trasa dla studenta
    Route::resource('students', StudentController::class);

    Route::resource('classes', ClassController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('oceny', OcenaController::class);
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});



// Trasy dla dyrektora
Route::middleware(['auth', 'dyrektor'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('students', StudentController::class); // Pełny CRUD
    Route::resource('classes', ClassController::class); // Pełny CRUD
    Route::resource('subjects', SubjectController::class); // Pełny CRUD
    Route::resource('teachers', TeacherController::class); // Pełny CRUD
    Route::resource('oceny', OcenaController::class); // Pełny CRUD
});
// Trasy dla nauczyciela
Route::middleware(['auth', 'nauczyciel'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('students', StudentController::class)->only(['index', 'show']);
    Route::resource('classes', ClassController::class)->only(['index', 'show']);
    Route::resource('subjects', SubjectController::class)->only(['index', 'show']);
    Route::resource('teachers', TeacherController::class)->only(['index', 'show']);
    Route::resource('oceny', OcenaController::class);
});
// Trasy dla user
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('students', StudentController::class)->only(['index', 'show']);
    Route::resource('classes', ClassController::class)->only(['index', 'show']);
    Route::resource('subjects', SubjectController::class)->only(['index', 'show']);
    Route::resource('teachers', TeacherController::class)->only(['index', 'show']);
    Route::resource('oceny', OcenaController::class)->only(['index', 'show']);
});


require __DIR__.'/auth.php';