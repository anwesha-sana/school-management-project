<?php

namespace App\Http\Controllers\backend\student;

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
use DB;

class RegistrationFeeController extends Controller
{
    public function view(){
        $data['classes'] = StudentClass::all();
        $data['years'] = StudentYear::all();
        return view('backend.student.reg_fee.view', $data);
    }
 
    
 public function getClasswiseData(Request $request){
    $year_id = $request->year_id;
    $class_id = $request->class_id;
    //dd($request->all());
    if ($year_id !='') {
        $where[] = ['year_id','like',$year_id.'%'];
    }
    if ($class_id !='') {
        $where[] = ['class_id','like',$class_id.'%'];
    }
    $allStudent = AssignStudent::with(['discount'])->where($where)->get();
    //dd($allStudent);
    $html['thsource']  = '<th>SL</th>';
    $html['thsource'] .= '<th>ID No</th>';
    $html['thsource'] .= '<th>Student Name</th>';
    $html['thsource'] .= '<th>Roll No</th>';
    $html['thsource'] .= '<th>Reg Fee</th>';
    $html['thsource'] .= '<th>Discount </th>';
    $html['thsource'] .= '<th>Student Fee </th>';
    $html['thsource'] .= '<th>Action</th>';


    foreach ($allStudent as $key => $v) {
        $registrationfee = FeeCategoryAmount::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
        dd($registrationfee);
        $color = 'success';
        $html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
        $html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
        $html[$key]['tdsource'] .= '<td>'.$v['student']['name'].'</td>';
        $html[$key]['tdsource'] .= '<td>'.$v->roll.'</td>';
        $html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
        $html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
        
        $originalfee = $registrationfee->amount;
        $discount = $v['discount']['discount'];
        $discounttablefee = $discount/100*$originalfee;
        $finalfee = (float)$originalfee-(float)$discounttablefee;

        $html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
        $html[$key]['tdsource'] .='<td>';
        $html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.registration.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Fee Slip</a>';
        $html[$key]['tdsource'] .= '</td>';

    }  
   return response()->json(@$html);

}
}
