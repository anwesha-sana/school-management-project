<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\setup\StudentClassController;
use App\Http\Controllers\backend\setup\StudentYearController;
use App\Http\Controllers\backend\setup\StudentGroupController;
use App\Http\Controllers\backend\setup\StudentShiftController;
use App\Http\Controllers\backend\setup\FeeCategoryController;

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
    // student class 
    Route::get('student/class/view', [StudentClassController::class, 'viewStudent'])->name('student.class.view');
    Route::get('student/class/add', [StudentClassController::class, 'addStudentClass'])->name('student.class.add');
    Route::post('student/class/store', [StudentClassController::class, 'storeStudentClass'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [StudentClassController::class, 'editStudentClass'])->name('student.class.edit');
    Route::post('student/class/update/{id}', [StudentClassController::class, 'updateStudentClass'])->name('student.class.update');
    Route::get('student/class/delete/{id}', [StudentClassController::class, 'deleteStudentClass'])->name('student.class.delete');
    // student year
    Route::get('student/year/view', [StudentYearController::class, 'viewYear'])->name('student.year.view');
    Route::get('student/year/add', [StudentYearController::class, 'addYear'])->name('student.year.add');
    Route::post('student/year/store', [StudentYearController::class, 'storeYear'])->name('student.year.store');
    Route::get('student/year/edit/{id}', [StudentYearController::class, 'editYear'])->name('student.year.edit');
    Route::post('student/year/update/{id}', [StudentYearController::class, 'updateYear'])->name('student.year.update');
    Route::get('student/year/delete/{id}', [StudentYearController::class, 'deleteYear'])->name('student.year.delete');
    //student group
    Route::get('student/group/view', [StudentGroupController::class, 'view'])->name('student.group.view');
    Route::get('student/group/add', [StudentGroupController::class, 'add'])->name('student.group.add');
    Route::post('student/group/store', [StudentGroupController::class, 'store'])->name('student.group.store');
    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'edit'])->name('student.group.edit');
    Route::post('student/group/update/{id}', [StudentGroupController::class, 'update'])->name('student.group.update');
    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'delete'])->name('student.group.delete');

    //student shift
    Route::get('student/shift/view', [StudentShiftController::class, 'view'])->name('student.shift.view');
    Route::get('student/shift/add', [StudentShiftController::class, 'add'])->name('student.shift.add');
    Route::post('student/shift/store', [StudentShiftController::class, 'store'])->name('student.shift.store');
    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'edit'])->name('student.shift.edit');
    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'update'])->name('student.shift.update');
    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'delete'])->name('student.shift.delete');
    // Fee Category
    Route::get('fee/category/view', [FeeCategoryController::class, 'view'])->name('fee.category.view');
    Route::get('fee/category/add', [FeeCategoryController::class, 'add'])->name('fee.category.add');
    Route::post('fee/category/store', [FeeCategoryController::class, 'store'])->name('fee.category.store');
    Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'edit'])->name('fee.category.edit');
    Route::post('fee/category/update/{id}', [FeeCategoryController::class, 'update'])->name('fee.category.update');
    Route::get('fee/category/delete/{id}', [FeeCategoryController::class, 'delete'])->name('fee.category.delete');

});

