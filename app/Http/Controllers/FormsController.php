<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('adminAuth');
    }

    public function index()
    {
        return view('forms.index');

    }

    public function students()
    {
        return view('students.index');
    }

    public function closed()
    {
        return view('forms.regform.closed');
    }
}
