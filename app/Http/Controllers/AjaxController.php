<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
   public function GetAjaxData(Request $request){
    $data = 'lorem ipsum';
     return response()->json([
        'data'=>$data
     ]);
   }
}