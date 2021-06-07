<?php

namespace App\Http\Controllers\backend\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FeeCategoryAmount;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\ExamType;
use App\Models\EmployeeSalaryLog;
use App\Models\Designation;
use DB;
use PDF;

class EmpRegistrationController extends Controller
{
    public function view(){
      $data['all_data'] = User::where('user_type','Employee')->get();
      return view('backend.employee.emp_reg.view', $data);
    }
    public function add(){
      $data['designation'] = Designation::all();
      return view('backend.employee.emp_reg.add', $data);
    }
    public function store(Request $request){
      DB::transaction(function() use($request){
          $joinDate = date('Ym',strtotime($request->join_date));
          
          $employee = User::where('user_type','employee')->orderBy('id','DESC')->first();

          if($employee == NULL){
              $employeeReg = 0;
              $employeeId = $employeeReg + 1;
              if($employeeId < 10){
                  $id_no = '000'.$employeeId;
              }elseif($employeeId < 100){
                  $id_no = '00'.$employeeId;
              }elseif($employeeId < 1000){
                  $id_no = '0'.$employeeId;
              }
          }else{
            $employee = User::where('user_type','employee')->orderBy('id','DESC')->first()->id;
              $employeeId = $employee + 1;
              if($employeeId < 10){
                  $id_no = '000'.$employeeId;
              }elseif($employeeId < 100){
                  $id_no = '00'.$employeeId;
              }elseif($employeeId < 1000){
                  $id_no = '0'.$employeeId;
              }
          }
          $final_id_no = $joinDate.$id_no;
          
          $user = new User();
          $code = rand(0000,9999);
          $user->id_no = $final_id_no;
          $user->password = bcrypt($code);
          $user->user_type = 'employee';
          $user->name = $request->name;
          $user->fname = $request->fname;
          $user->mname = $request->mname;
          $user->mobile = $request->mobile;
          $user->address = $request->address;
          $user->gender = $request->gender;
          $user->religion = $request->religion;
          $user->code = $code;
          $user->salary = $request->salary;
          $user->join_date = date('Y-m-d',strtotime($request->join_date));
          $user->designation_id = $request->designation_id;
          $user->dob = date('Y-m-d',strtotime($request->dob));
          
           
          if($request->file('image'))
          {
              $file = $request->file('image');
              $filename = time().$file->getClientOriginalName();
              
              $file->move(public_path('upload/employee_images/'),$filename);
              $user['image'] = $filename;
          }
          $user->save(); //insert data into user table
          

          //insert data into EmployeeSalaryLog table
          $emp_salary = new EmployeeSalaryLog();
          $emp_salary->emp_id = $user->id;
          $emp_salary->previous_salary = $request->salary;
          $emp_salary->present_salary = $request->salary;
          $emp_salary->increment_salary = '0';
          $emp_salary->effected_date = date('Y-m-d',strtotime($request->join_date));
          
          $emp_salary->save();
          

      });
      $notification = array(
          'message' =>'Employee Registration added successfully',
          'alert-type' => 'success'
      );
      return redirect()->route('employee.registration.view')->with($notification);
    }
    public function edit($employee_id){
    
        $data['editData'] = User::find($employee_id);
        $data['designation'] = Designation::all();
        return view('backend.employee.emp_reg.edit',$data);
    }
    public function update($employee_id, Request $request){
        
            $user = User::find($employee_id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            
            $user->designation_id = $request->designation_id;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            
             
            if($request->file('image'))
            {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$user->image));
                $filename = time().$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images/'),$filename);
                $user['image'] = $filename;
            }
            $user->save(); //insert data into user table
        
            $notification = array(
                'message' =>'Employee Registration updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('employee.registration.view')->with($notification);
    }
    public function details($employee_id){
        $data['details'] = User::find($employee_id);
        $pdf = PDF::loadView('backend.employee.emp_reg.emp_details_pdf', $data);
	    $pdf->SetProtection(['copy', 'print'], '', 'pass');
	    return $pdf->stream('document.pdf');
    }
}
