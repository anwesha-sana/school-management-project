<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectController extends Controller
{
    public function view(){
        $data['all_data'] = SchoolSubject::all();
        return view('backend.setup.subject.view', $data);

    }
    public function add(){
        return view('backend.setup.subject.add');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:school_subjects,name'
        ]);
        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= SchoolSubject::find($id);
        return view('backend.setup.subject.edit', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = SchoolSubject::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:school_subjects,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
    public function delete($id){
        $data = SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('school.subject.view')->with($notification);

    }
    
}
