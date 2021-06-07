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
use App\Http\Controllers\backend\setup\FeeAmountController;
use App\Http\Controllers\backend\setup\ExamTypeController;
use App\Http\Controllers\backend\setup\SchoolSubjectController;
use App\Http\Controllers\backend\setup\AssignSubjectController;
use App\Http\Controllers\backend\setup\DesignationController;
use App\Http\Controllers\backend\student\StudentRegistrationController;
use App\Http\Controllers\backend\student\StudentRollController;
use App\Http\Controllers\backend\student\RegistrationFeeController;
use App\Http\Controllers\backend\student\MonthlyFeeController;
use App\Http\Controllers\backend\student\ExamFeeController;
use App\Http\Controllers\backend\employee\EmpRegistrationController;

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

Route::group(['middleware' => 'auth'], function(){
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

    //fee category amount
    Route::get('fee/amount/view', [FeeAmountController::class, 'view'])->name('fee.amount.view');
    Route::get('fee/amount/add', [FeeAmountController::class, 'add'])->name('fee.amount.add');
    Route::post('fee/amount/store', [FeeAmountController::class, 'store'])->name('fee.amount.store');
    Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'edit'])->name('fee.amount.edit');
    Route::post('fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'update'])->name('fee.amount.update');
    Route::get('fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'details'])->name('fee.amount.details');

    // Exam type
    Route::get('exam/type/view', [ExamTypeController::class, 'view'])->name('exam.type.view');
    Route::get('exam/type/add', [ExamTypeController::class, 'add'])->name('exam.type.add');
    Route::post('exam/type/store', [ExamTypeController::class, 'store'])->name('exam.type.store');
    Route::get('exam/type/edit/{id}', [ExamTypeController::class, 'edit'])->name('exam.type.edit');
    Route::post('exam/type/update/{id}', [ExamTypeController::class, 'update'])->name('exam.type.update');
    Route::get('exam/type/delete/{id}', [ExamTypeController::class, 'delete'])->name('exam.type.delete');

    //school subject
    Route::get('school/subject/view', [SchoolSubjectController::class, 'view'])->name('school.subject.view');
    Route::get('school/subject/add', [SchoolSubjectController::class, 'add'])->name('school.subject.add');
    Route::post('school/subject/store', [SchoolSubjectController::class, 'store'])->name('school.subject.store');
    Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'edit'])->name('school.subject.edit');
    Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'update'])->name('school.subject.update');
    Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'delete'])->name('school.subject.delete');

    //Asign Subjects
    Route::get('assign/subject/view', [AssignSubjectController::class, 'view'])->name('assign.subject.view');
    Route::get('assign/subject/add', [AssignSubjectController::class, 'add'])->name('assign.subject.add');
    Route::post('assign/subject/store', [AssignSubjectController::class, 'store'])->name('assign.subject.store');
    Route::get('assign/subject/edit/{class_id}', [AssignSubjectController::class, 'edit'])->name('assign.subject.edit');
    Route::post('assign/subject/update/{class_id}', [AssignSubjectController::class, 'update'])->name('assign.subject.update');
    Route::get('assign/subject/details/{class_id}', [AssignSubjectController::class, 'details'])->name('assign.subject.details');

    // Designation
    Route::get('designation/view', [DesignationController::class, 'view'])->name('designation.view');
    Route::get('designation/add', [DesignationController::class, 'add'])->name('designation.add');
    Route::post('designation/store', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::post('designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::get('designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
});

Route::prefix('students')->group( function(){
    Route::get('/registration/view', [StudentRegistrationController::class, 'view'])->name('student.registration.view');
    Route::get('/registration/add', [StudentRegistrationController::class, 'add'])->name('student.registration.add');
    Route::post('/registration/store', [StudentRegistrationController::class, 'store'])->name('student.registration.store');
    Route::get('/class/year/wise', [StudentRegistrationController::class, 'classYearWiseSearch'])->name('student.class.year.wise.data');
    Route::get('/registration/edit/{student_id}', [StudentRegistrationController::class, 'edit'])->name('student.registration.edit');
    Route::post('/registration/update/{student_id}', [StudentRegistrationController::class, 'update'])->name('student.registration.update');
    
    Route::get('/promotion/{student_id}', [StudentRegistrationController::class, 'studentPromotion'])->name('student.promotion');
    Route::post('/promotion/update/{student_id}', [StudentRegistrationController::class, 'studentPromotionUpdate'])->name('student.promotion.update');
    Route::get('/details/{student_id}', [StudentRegistrationController::class, 'studentDetails'])->name('student.details');
    // roll generate
    Route::get('/roll/generate/view', [StudentRollController::class, 'rollGenerateView'])->name('roll.generate.view');
    Route::get('/registration/getstudents', [StudentRollController::class, 'getStudents'])->name('student.registration.getstudents');
    Route::post('/roll/store', [StudentRollController::class, 'rollStore'])->name('roll.generate.store');

    // registration fee
    Route::get('/registration/fee/view', [RegistrationFeeController::class, 'view'])->name('registration.fee.view');
    Route::get('/registration/fee/classwise/data', [RegistrationFeeController::class, 'getClasswiseData'])->name('student.registration.fee.classwise.get');
    Route::get('/registration/fee/payslip', [RegistrationFeeController::class, 'getFeePayslip'])->name('student.registration.fee.payslip');
    // monthly fee
    Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'view'])->name('monthly.fee.view');
    Route::get('/monthly/fee/classwise/data', [MonthlyFeeController::class, 'getClasswiseData'])->name('student.monthly.fee.classwise.get');
    Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'getFeePayslip'])->name('student.monthly.fee.payslip');

    // Exam fee
    Route::get('/exam/fee/view', [ExamFeeController::class, 'view'])->name('exam.fee.view');
    Route::get('/exam/fee/classwise/data', [ExamFeeController::class, 'getClasswiseData'])->name('student.exam.fee.classwise.get');
    Route::get('/exam/fee/payslip', [ExamFeeController::class, 'getFeePayslip'])->name('student.exam.fee.payslip');
});
Route::prefix('employee')->group( function(){
    Route::get('/registration/view', [EmpRegistrationController::class, 'view'])->name('employee.registration.view');
    Route::get('/registration/add', [EmpRegistrationController::class, 'add'])->name('employee.registration.add');
    Route::post('/registration/store', [EmpRegistrationController::class, 'store'])->name('employee.registration.store');
    Route::get('/registration/edit/{employee_id}', [EmpRegistrationController::class, 'edit'])->name('employee.registration.edit');
    Route::post('/registration/update/{employee_id}', [EmpRegistrationController::class, 'update'])->name('employee.registration.update');
    Route::get('/registration/details/{employee_id}', [EmpRegistrationController::class, 'details'])->name('employee.registration.details');
});

}); //end middleware auth route

