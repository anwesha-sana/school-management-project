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
        $data['all_data'] = FeeCategoryAmount::all();
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
}
