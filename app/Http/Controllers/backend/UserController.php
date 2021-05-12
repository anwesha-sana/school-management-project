<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userView(){
        //$all_data = User::all();
        $data['all_data'] = User::all();
        return view('backend.user.user_view', $data);
    }
    public function userAdd(){
        return view('backend.user.user_add');

    }
    public function userStore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);
        $data = new User();
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
       
    }

    public function userEdit($id){
        $get_user_details= User::find($id);
        return view('backend.user.user_edit', compact('get_user_details'));
    }
    
    public function userUpdate($id,Request $request){
        $data = User::find($id);
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' =>'Data Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }
    public function userDelete($id){
        $data = User::find($id);
        $data->delete();

        $notification = array(
            'message' =>'Data Deleted successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);

    }

}
