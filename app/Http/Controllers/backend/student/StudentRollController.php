<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;
use PDF;

class StudentRollController extends Controller
{
    public function rollGenerateView(){
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        return view('backend.student.roll_generate.view', $data);
        
    }
    public function getStudents(Request $request){
        $all_data = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
        //dd($all_data->toarray());
        return response()->json($all_data);
    }
}
