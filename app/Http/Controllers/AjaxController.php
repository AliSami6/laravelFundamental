<?php

namespace App\Http\Controllers;

use App\Models\AjaxForm;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class AjaxController extends Controller
{
   public function GetAjaxData(Request $request){
    $data = 'lorem ipsum';
    return response()->json([
        'data'=>$data
    ]);
   }

   public function FormAjaxData(Request $request){
      AjaxForm::create([
        'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'gender'=>$request->gender,
         'status'=>$request->status

      ]);
      return response()->json('Record Stored Successfully!.');
   }
}