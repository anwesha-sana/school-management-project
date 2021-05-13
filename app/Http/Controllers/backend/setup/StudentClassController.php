<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function viewStudent(){
        $data['all_data'] = StudentClass::all();
        return view('backend.setup.student_class.view_class', $data);

    }
    public function addStudentClass(){
        return view('backend.setup.student_class.add_class');

    }
    public function storeStudentClass(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name'
        ]);
        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function editStudentClass($id){
        $get_user_details= StudentClass::find($id);
        return view('backend.setup.student_class.edit_class', compact('get_user_details'));
    }
    
    public function updateStudentClass($id,Request $request){

        $data = StudentClass::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_classes,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function deleteStudentClass($id){
        $data = StudentClass::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);

    }
}
