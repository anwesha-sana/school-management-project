<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function view(){
        $data['all_data'] = StudentGroup::all();
        return view('backend.setup.group.view_group', $data);

    }
    public function add(){
        return view('backend.setup.group.add_group');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name'
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= StudentGroup::find($id);
        return view('backend.setup.group.edit_group', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = StudentGroup::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);
    }
    public function delete($id){
        $data = StudentGroup::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.group.view')->with($notification);

    }
}
