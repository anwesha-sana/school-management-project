<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    public function view(){
        $data['all_data'] = ExamType::all();
        return view('backend.setup.exam_type.view', $data);

    }
    public function add(){
        return view('backend.setup.exam_type.add');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:exam_types,name'
        ]);
        $data = new ExamType();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= ExamType::find($id);
        return view('backend.setup.exam_type.edit', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = ExamType::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:exam_types,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }
    public function delete($id){
        $data = ExamType::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('exam.type.view')->with($notification);

    }
}
