<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegFormRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function add(RegFormRequest $request)
    {

        //dd((int) preg_replace("/\D/", "", Input::get("nid")));
        $request->nid = (int) preg_replace("/\D/", "", Input::get("nid"));
        //dd($request->all());
        Auth::user()->form()->create($request->all());

        //$form->save($request->all());
        //dd($form);
    }
}
