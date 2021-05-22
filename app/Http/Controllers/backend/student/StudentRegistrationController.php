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

class StudentRegistrationController extends Controller
{
    public function view(){
        
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        $data['class_id'] = StudentClass::orderBy('id','desc')->first()->id;
        $data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
        $data['all_data'] = AssignStudent::where('class_id',$data['class_id'])->where('year_id',$data['year_id'])->get();
        return view('backend.student.student_registration.view', $data);
    }
    public function add(){
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        $data['group'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_registration.add',$data);

    }
    public function store(Request $request){
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('user_type','student')->orderBy('id','DESC')->first();

            if($student == NULL){
                $studentReg = 0;
                $studenId = $studentReg + 1;
                if($studenId < 10){
                    $id_no = '000'.$studenId;
                }elseif($studenId < 100){
                    $id_no = '00'.$studenId;
                }elseif($studenId < 1000){
                    $id_no = '0'.$studenId;
                }
            }else{
                $student = User::where('user_type','student')->orderBy('id','DESC')->first()->id; 
                $studenId = $student + 1;
                if($studenId < 10){
                    $id_no = '000'.$studenId;
                }elseif($studenId < 100){
                    $id_no = '00'.$studenId;
                }elseif($studenId < 1000){
                    $id_no = '0'.$studenId;
                }
            }
            $final_id_no = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->user_type = 'student';
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            
             
            if($request->file('image'))
            {
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;
            }
            $user->save(); //insert data into user table
            

            //insert data into assign_students table
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
           

            $dis_student = new DiscountStudent();
            $dis_student->assign_student_id = $assign_student->id;
            $dis_student->fee_category_id = '1';
            $dis_student->discount = $request->discount;
            $dis_student->save();
            

        });
        $notification = array(
            'message' =>'Student Registration added successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    public function classYearWiseSearch(Request $request){
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        $data['class_id'] = $request->class_id;
        $data['year_id'] = $request->year_id;
        $data['all_data'] = AssignStudent::where('class_id',$request->class_id)->where('year_id',$request->year_id)->get();
        return view('backend.student.student_registration.view', $data);

    }
}
