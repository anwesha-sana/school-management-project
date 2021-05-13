<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// user management all routes

Route::prefix('users')->group( function(){
    Route::get('/view', [UserController::class, 'userView'])->name('user.view');
    Route::get('/add', [UserController::class, 'userAdd'])->name('user.add');
    Route::post('/store', [UserController::class, 'userStore'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
    Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
    Route::get('/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
});

// user profile and change password
Route::prefix('profile')->group( function(){
    Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::post('/store', [ProfileController::class, 'profileStore'])->name('profile.store');
    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
});
// Setup management
Route::prefix('setup')->group( function(){
    Route::get('student/class/view', [StudentClassController::class, 'viewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'addStudentClass'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'storeStudentClass'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'editStudentClass'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'updateStudentClass'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'deleteStudentClass'])->name('student.class.delete');
});

