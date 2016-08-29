<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegFormRequest;

use App\RegForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class RegFormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('formSubmitCheck:emr')->only('/form/emr/new');
    }
    public function index()
    {
        //$forms = RegForm::latest()->get();
        $forms = Auth::user()->emrForm()->get();
        //dd($forms);
        return view('forms.regform.index',compact('forms'));
    }

    public function view($id)
    {

        $form = RegForm::findOrFail($id);
        return view('forms.regform.view',compact('form'));
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
        return view('forms.regform.create',compact('nationality','jobTitles','relation'));
    }

    public function add(RegFormRequest $request)
    {

        //dd((int) preg_replace("/\D/", "", Input::get("nid")));
        //$request->nid = (int) preg_replace("/\D/", "", Input::get("nid"));
        //dd($request->all());

        $attach = $request->file('job_identity_attach');

        do{
            $fileName = str_random('20').'.'.$attach->getClientOriginalExtension();
        }while(Storage::exists($fileName));

        Storage::put($fileName,File::get($attach));
        $request->merge(['job_identity_file' => $fileName]);



        if($request->input('nationality') === 'other')
            $request->merge(['nationality' => $request->input('other_nationality')]);


        if($request->input('job_title') === 'other')
            $request->merge(['job_title' => $request->input('other_job_title')]);


        if($request->input('emer_relation') === 'other')
            $request->merge(['emer_relation' => $request->input('other_emer_relation')]);

        $request->merge(['is_contract' => $request->input('is_contract') === '1' ? 1 : 0]);


        //dd($request->all());
        Auth::user()->emrForm()->create($request->all());

        return $this->index();

    }
}
