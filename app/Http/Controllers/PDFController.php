<?php

namespace App\Http\Controllers;

 use Barryvdh\DomPDF\Facade\Pdf;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
     public function generatePDF()
    {
        $users = DB::table('students')->get();


        $pdf = PDF::loadView('myPDF',['users'=>$users]);

        return $pdf->stream('laraveltuts.pdf');
    }
}