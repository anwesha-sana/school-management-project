<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;

class AssignSubjectController extends Controller
{
    public function view(){
        //$data['all_data'] = AssignSubject::all();
        $data['all_data'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
        return view('backend.setup.assign_subject.view', $data);
    }
    public function add(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add',$data);

    }
    public function store(Request $request){
        $countSubject = count($request->subject_id);
        if($countSubject != NULL){
            for($i = 0; $i <= $countSubject-1; $i++){
                $fee_data = new AssignSubject();
                $fee_data->class_id = $request->class_id;
                $fee_data->subject_id = $request->subject_id[$i];
                $fee_data->full_mark = $request->full_mark[$i];
                $fee_data->pass_mark = $request->pass_mark[$i];
                $fee_data->subjective_mark = $request->subjective_mark[$i];
                $fee_data->save();
            }
        }
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($notification);
    }
    public function edit($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        //dd($data['editData']->toArray());
        
        $data['classes'] = StudentClass::all();
        $data['subjects'] = SchoolSubject::all();
        return view('backend.setup.assign_subject.edit',$data);
    }
    public function update(Request $request, $class_id){
        if($request->subject_id == NULL){
            $notification = array(
                'message' =>'Sorry you do not select any Subject.',
                'alert-type' => 'error'
            );
            return redirect()->route('assign.subject.edit', $class_id)->with($notification);  

        }else{
            $countSubject = count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete(); // delete the previous data

                for($i = 0; $i <= $countSubject-1; $i++){
                    $fee_data = new AssignSubject();
                    $fee_data->class_id = $request->class_id;
                    $fee_data->subject_id = $request->subject_id[$i];
                    $fee_data->full_mark = $request->full_mark[$i];
                    $fee_data->pass_mark = $request->pass_mark[$i];
                    $fee_data->subjective_mark = $request->subjective_mark[$i];
                    $fee_data->save();
                }
            
            $notification = array(
                'message' =>'Data updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('assign.subject.view')->with($notification);

        }

    }
    public function details($class_id){
        $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        //dd($data['detailsData']);
        return view('backend.setup.assign_subject.details', $data);
    }
}
