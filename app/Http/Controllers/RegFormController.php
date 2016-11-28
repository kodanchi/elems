<?php

namespace App\Http\Controllers;

use App\EmailValidation;
use App\Http\Requests\EmailValidationRequest;
use App\Http\Requests\RegFormRequest;

use App\RegForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class RegFormController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('formSubmitCheck:emr')->only('/form/emr/new');

    }
    public function index()
    {
        //$forms = RegForm::latest()->get();
        //$forms = Auth::user()->emrForm()->get();
        //dd($forms);

        return $this->langCheck(view('forms.regform.index'));
    }

    public function emailValidate(EmailValidationRequest $request)
    {
        //dd(str_random(10));
        //$request->merge(['pin', str_random(10)]);
        $request->request->add(['pin' => str_random(10)]);
        EmailValidation::create($request->all());
        $email = Input::get('email');
        return redirect('/form/emr/pin')->with('status',' الرجاءاستخدام الكود المرسل في الدخول '.$email.'تم إرسال بريد إلى ')
            ->with('email',$email);


    }
    public function pinEmailValidate(Request $request)
    {

        //$request->request->add(['pin' => str_random(10)]);
        $isUserExist = EmailValidation::where('email','=',Input::get('email'))->where('pin','=',Input::get('pin'))->count()> 0;
        //dd($isUserExist);
        $email = Input::get('email');
        if($isUserExist){
            return view('forms.regform.rules',compact('email'));
        }else{
            //return view('forms.regform.plogin',compact('email'))->with('status','يوجد خطأ في البريد الإلكتروني أو الرقم السري');
            return redirect('/form/emr/pin')->with('status','يوجد خطأ في البريد الإلكتروني أو الرقم السري')
                ->with('email',$email);
        }



    }

    public function pinPage()
    {
        $email = '';
        return view('forms.regform.plogin');
    }

    //service name
    //sid
    public function view($id)
    {

        $form = RegForm::findOrFail($id);
        return view('forms.regform.view',compact('form'));
    }



    public function create()
    {

        //$forms = Auth::user()->emrForm()->get();
        //dd($form->isEmpty());
        //if($forms->isEmpty()){
            $nationality = trans('nationality');

            $jobTitles = trans('jobsTitles');

            $relation = trans('relations');

            $gender = trans('gender');
            $boolean = trans('boolean');
            $centers_male = trans('centers_male');
            $centers_female = trans('centers_female');

            $qualification = trans('qualification');
            return view('forms.regform.create',compact('nationality','gender','jobTitles','relation','qualification','boolean','centers_male','centers_female'));
        /*}else{
            return Redirect::to('/form/emr')->with('status','you already submitted');
        }*/


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
        RegForm::create($request->all());

        return Redirect::to('/')->with('status',trans('regform.SuccessSubmit'));

    }

    public function langCheck($view)
    {

        $response = new \Illuminate\Http\Response($view);
        $request = new \Illuminate\Http\Request;

        //if($request->cookie('lang')=='ar')

        $langCookie = $request->cookie('lang') ? $request->cookie('lang') : cookie('lang', 'ar' );

        $response->withCookie($langCookie);

        return $response;
    }
}
