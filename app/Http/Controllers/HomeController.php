<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function upload(Request $request)
    {
        //$request->avater->store('images','public');

        if($request->hasFile('avater')){

            Storage::disk('public')->delete('images/'.auth()->user()->avater);
            $file_name = $request->avater->getClientOriginalName();
            $request->avater->storeAs('images',$file_name,'public');

        }
        auth()->user()->update([
                'avater'=>$file_name
            ]);
         return back();
    }

}