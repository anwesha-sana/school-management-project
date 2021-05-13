<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftController extends Controller
{
    public function view(){
        $data['all_data'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);

    }
    public function add(){
        return view('backend.setup.shift.add_shift');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:student_shifts,name'
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = StudentShift::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_shifts,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }
    public function delete($id){
        $data = StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.shift.view')->with($notification);

    }
}
