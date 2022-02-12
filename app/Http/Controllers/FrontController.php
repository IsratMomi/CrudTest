<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.home.home',[
            'employees' => Employee::all()
        ]);
    }
}
