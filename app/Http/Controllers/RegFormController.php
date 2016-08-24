<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegFormRequest;

use App\RegForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RegFormController extends Controller
{
    public function index()
    {
        $forms = RegForm::latest()->get();
        return view('forms.index',compact('forms'));
    }

    public function view($id)
    {

        $form = RegForm::findOrFail($id);
        return view('forms.view',compact('form'));
    }

    public function create()
    {

        $nationality = [
            'Saudi Arabia' => 'Saudi Arabia',
            'Jordan' => 'Jordan',
            'Egypt' => 'Egypt',
            'other' => 'Other'
        ];

        $jobTitles = [
            'Administrator'=>'Administrator',
            'IT Support'=>'IT Support',
            'other'=>'Other'
        ];

        $relation = [
            'relative'=>'Relative',
            'friend'=>'Friend',
            'other'=>'Other',
        ];
        return view('forms.create',compact('nationality','jobTitles','relation'));
    }

    public function add(RegFormRequest $request)
    {

        //dd((int) preg_replace("/\D/", "", Input::get("nid")));
        //$request->nid = (int) preg_replace("/\D/", "", Input::get("nid"));
        //dd($request->all());
        Auth::user()->form()->create($request->all());

        //$form->save($request->all());
        //dd($form);
    }
}
