<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;

class StudentRegistrationController extends Controller
{
    public function view(){
        $data['all_data'] = AssignStudent::all();
        return view('backend.student.student_registration.view', $data);
    }
}
