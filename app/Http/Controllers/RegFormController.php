<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegFormController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

        $nationality = [
            'Saudi Arabia',
            'Jordan',
            'Egypt'
        ];
        return view('forms.create',compact('nationality'));
    }

    public function add(Request $request)
    {

    }
}
