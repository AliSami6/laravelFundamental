<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StudentRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
            'status'=> false,
            'errors'=>$validator->errors()
            ], 200)
        );

    }
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $rules = [
            'name'  => ['required'],
            'email' => ['required','email'],
            'phone' => ['required'],
            'roll'  => ['required'],
            'reg'   => ['required'],
            'board' => ['required'],
            'avatar' => ['required'],

        ];
        if(request()->update!= ''){
            $rules['avatar'][0] = 'nullable';
        }
        return $rules;
    }
    public function messages(){
        return [

        ];
    }
}