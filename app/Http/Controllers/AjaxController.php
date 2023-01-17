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
    public function StudentData(Request $request){
      if($request->ajax()){
        $getData = profile::latest('id')->get();
        $code = '';
        foreach($getData as $key=>$student){
            $count = $key+1;
            $code.= '<tr>
                        <td>'.$count.'</td>
                        <td>'.$student->name.'</td>
                        <td><img src="images/profile/'.$student->image.'" class="rounded img" alt="'.$student->name.'"></td>
                        <td>'.$student->email.'</td>
                        <td>'.$student->phone.'</td>
                        <td>'.$student->roll.'</td>
                        <td>'.$student->reg.'</td>
                        <td>'.$student->board.'</td>
                        <td>
                         <button type="button" class="btn btn-sm btn-info edit-btn" data-id="'.$student->id.'">Edit</button>
                          <button type="button" class="btn btn-sm btn-danger del-btn" data-id="'.$student->id.'">Delete</button>
                        </td>
                    </tr>';
        }
        return response()->json($code);
      }
    }

    public function StudentDelete(Request $request){
        if($request->ajax()){
            $student =  profile::findOrFail($request->student_id);
            if(file_exists('images/profile/'.$student->image)){
                unlink('images/profile/'.$student->image);
            }
            $student->delete();
            $output = ['status'=>'success','message'=>'Student record has been deleted successfully'];
            return response()->json($output);
        }

    }
}