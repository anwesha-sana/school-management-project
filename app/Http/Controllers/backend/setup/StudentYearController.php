<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function viewYear(){
        $data['all_data'] = StudentYear::all();
        return view('backend.setup.year.view_year', $data);

    }
    public function addYear(){
        return view('backend.setup.year.add_year');

    }

    public function storeYear(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:student_years,name'
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function editYear($id){
        $get_user_details= StudentYear::find($id);
        return view('backend.setup.year.edit_year', compact('get_user_details'));
    }

    public function updateYear($id,Request $request){

        $data = StudentYear::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);
    }
    public function deleteYear($id){
        $data = StudentYear::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.year.view')->with($notification);

    }
    
}
