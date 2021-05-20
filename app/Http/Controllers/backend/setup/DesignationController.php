<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function view(){
        $data['all_data'] = Designation::all();
        return view('backend.setup.designation.view', $data);

    }
    public function add(){
        return view('backend.setup.designation.add');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:designations,name'
        ]);
        $data = new Designation();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= Designation::find($id);
        return view('backend.setup.designation.edit', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = Designation::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('designation.view')->with($notification);
    }
    public function delete($id){
        $data = Designation::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('designation.view')->with($notification);

    }
    
}
