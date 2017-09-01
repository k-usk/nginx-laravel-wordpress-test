<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InquiryController extends Controller
{
    public function input(){
        return view('inquiry.input');
    }
}
