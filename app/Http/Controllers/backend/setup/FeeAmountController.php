<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\FeeCategory;
use App\models\StudentClass;
use App\models\FeeCategoryAmount;

class FeeAmountController extends Controller
{
    public function view(){
        //$data['all_data'] = FeeCategoryAmount::all();
        $data['all_data'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.view', $data);
    }
    public function add(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add',$data);

    }
    public function store(Request $request){
        $countClass = count($request->class_id);
        if($countClass != NULL){
            for($i = 0; $i <= $countClass-1; $i++){
                $fee_data = new FeeCategoryAmount();
                $fee_data->fee_category_id = $request->fee_category_id;
                $fee_data->class_id = $request->class_id[$i];
                $fee_data->amount = $request->amount[$i];
                $fee_data->save();
            }
        }
        $notification = array(
            'message' =>'Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);
    }
    public function edit($fee_category_id){
        $data['editData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        //dd($data['editData']->toArray());
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit',$data);
    }
    public function update(Request $request, $fee_category_id){
        if($request->class_id == NULL){
            $notification = array(
                'message' =>'Sorry you do not select any class amount.',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);  

        }else{
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete(); // delete the previous data

                for($i = 0; $i <= $countClass-1; $i++){
                    $fee_data = new FeeCategoryAmount();
                    $fee_data->fee_category_id = $request->fee_category_id;
                    $fee_data->class_id = $request->class_id[$i];
                    $fee_data->amount = $request->amount[$i];
                    $fee_data->save();
                }
            
            $notification = array(
                'message' =>'Data updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('fee.amount.view')->with($notification);

        }

    }
    public function details($fee_category_id){
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        return view('backend.setup.fee_amount.details', $data);
    }

}
