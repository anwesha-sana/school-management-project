<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;

class FeeCategoryController extends Controller
{
    public function view(){
        $data['all_data'] = FeeCategory::all();
        return view('backend.setup.fee_category.view', $data);

    }
    public function add(){
        return view('backend.setup.fee_category.add');

    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:fee_categories,name'
        ]);
        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function edit($id){
        $get_user_details= FeeCategory::find($id);
        return view('backend.setup.fee_category.edit', compact('get_user_details'));
    }
    
    public function update($id,Request $request){

        $data = FeeCategory::find($id);
        $validated = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }
    public function delete($id){
        $data = FeeCategory::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('fee.category.view')->with($notification);

    }
}
