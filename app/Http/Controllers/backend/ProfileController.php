<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function profileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view_profile', compact('user'));
    }
    public function profileEdit(){
        $id = Auth::user()->id;
        $get_user_details = User::find($id);
        return view('backend.user.edit_profile', compact('get_user_details'));

    }
    public function profileStore(Request $request){
        $user_id = Auth::user()->id;
        $data = User::find($user_id);
        $img = $request->file('image');
    
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('upload/images/'.$data->image));
            $filename = time().$file->getClientOriginalName();
            
            $file->move(public_path('upload/images/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' =>'Profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);

    }

    public function passwordView(){
        return view('backend.user.edit_password');
    }
    public function passwordUpdate(Request $request){
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $old_password = Auth::user()->password;
        if(Hash::check($request->current_password,$old_password)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }
}
