<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\formBasic;

class FormController extends Controller
{
    //view page
    public function index()
    {
        $data = formBasic::all();
        return view('form',compact('data'));
    }
    // save record
    public function saveRecord(Request $request)
    {
            foreach($request->empname as $key=>$insert) {

                $saveRecord = [
                    'empname'   =>$request->empname[$key],
                    'phone'     =>$request->phone[$key],
                    'department'=>$request->department[$key],
                ];
                DB::table('form_basics')->insert($saveRecord);
            }
        return redirect()->back();
    }

}

