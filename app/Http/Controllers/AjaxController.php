<?php

namespace App\Http\Controllers;

use App\Models\profile;
use App\Models\AjaxForm;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AjaxController extends Controller
{
    public function GetAjaxData(Request $request)
    {
        $data = 'lorem ipsum';
        return response()->json([
            'data' => $data,
        ]);
    }
    public function FormAjaxData(Request $request)
    {
        AjaxForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'status' => $request->status,
        ]);
        return response()->json('Record Stored Successfully!.');
    }
    public function FormAjaxStore(Request $request)
    {
        $profile = $this->file_upload($request->file('image'), 'images/profile/');
        profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
            'reg' => $request->reg,
            'board' => $request->board,
            'image' => $profile,
        ]);
        return response()->json('Record Stored Successfully!.');
    }
     public function FormAdd(Request $request)
    {

        $profile = $this->file_upload($request->file('image'), 'images/profile/');
        $data = profile::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'roll' => $request->roll,
            'reg' => $request->reg,
            'board' => $request->board,
            'image' => $profile,
        ]);
        if($data){
          $output = ['status'=>'success','message'=>'Data has been saved successfully!.'];
        }else{
           $output = ['status'=>'error','message'=>'Something went wrong!.'];
        }
        return response()->json($output);
    }
}