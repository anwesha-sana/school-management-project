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
            $user->code = $request->code;
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
    public function edit($student_id){
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        $data['group'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        //dd($data['editData']->toArray());
        return view('backend.student.student_registration.edit',$data);
    }
    public function update($student_id, Request $request){
        DB::transaction(function() use($request,$student_id){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('user_type','student')->orderBy('id','DESC')->first();

            $user = User::where('id', $student_id)->first();
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
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = time().$file->getClientOriginalName();
                
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;
            }
            $user->save(); //insert data into user table
            

            //insert data into assign_students table
            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
            
            $assign_student->class_id = $request->class_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();
           

            $dis_student = DiscountStudent::where('assign_student_id',$request->id)->first();
        
            $dis_student->fee_category_id = '1';
            $dis_student->discount = $request->discount;
            $dis_student->save();
            

        });
        $notification = array(
            'message' =>'Student Registration updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
    }
    public function studentPromotion($student_id){
        $data['class'] = StudentClass::all();
        $data['year'] = StudentYear::all();
        $data['group'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        //dd($data['editData']->toArray());
        return view('backend.student.student_registration.promotion',$data);
    }
    public function studentPromotionUpdate($student_id, Request $request){

        DB::transaction(function() use($request,$student_id){
            
            $user = User::where('id', $student_id)->first();
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
                @unlink(public_path('upload/student_images/'.$user->image));
                $filename = time().$file->getClientOriginalName();
                
                $file->move(public_path('upload/student_images/'),$filename);
                $user['image'] = $filename;
            }
            $user->save(); //insert data into user table

            //insert data into assign_students table
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
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
            'message' =>'Student Promotion updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);

    }
    public function studentDetails($student_id){
        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        //dd($data['editData']->toArray());

        $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', $data);
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');

        return view('backend.student.student_registration.promotion',$data);
    }
    

}
