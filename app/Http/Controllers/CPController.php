<?php

namespace App\Http\Controllers;

use App\FacultyForm;
use App\Http\Requests\updateRegFormRequest;
use App\Http\Requests\UsersRequest;
use App\RegForm;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminAuth');
    }


    public function index()
    {
        $forms = RegForm::latest()->simplePaginate(10);
        return view('cp.index',compact('forms'));
    }

    public function users()
    {
        $users = User::latest()->simplePaginate(10);
        return view('cp.users.index',compact('users'));
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        //dd($user);
        return view('cp.users.update_user',compact('user'));
    }

    public function userUpdate(UsersRequest $request, $id)
    {
        $user = User::findOrFail($id);

        //$request->role = Input::get('role');
        $user->update($request->all());

        return redirect(LaravelLocalization::getLocalizedURL(null, 'cp/users'))->with('status',trans('cp.status.update'));
    }

    public function delUpdate($id)
    {
        $user = User::findOrFail($id);

        //$request->role = Input::get('role');
        $user->delete();

        return redirect(LaravelLocalization::getLocalizedURL(null, 'cp/users'))->with('status',trans('cp.status.del'));
    }



    public function facultyForms()
    {
        $forms = FacultyForm::latest()->get();
        return view('cp.form.facultyForm.index',compact('forms'));
    }


    public function viewFF($id)
    {


        $form = FacultyForm::findOrFail($id);
        $courses = DB::select('select courses.des,courses.subject from FTC, courses where courses.cid = FTC.cid and FTC.fid = ? ',[$form->id]);
        return view('forms.facultyForm.view',compact('form','courses'));
    }


    public function searchFF(Request $request)
    {
        $searchType = Input::get('searchType');
        //dd($searchType);
        switch ($searchType)
        {
            case 'cellphone':
                $this->validate($request,[
                    'search' => 'required|integer|min:500000000'
                ]);
                $forms = FacultyForm::where('cellphone','LIKE','%'.Input::get('search').'%')->get();
                break;
            case 'id':
                $this->validate($request,[
                    'search' => 'required|integer|min:1000000'
                ],[
                    'search.integer' => 'البحث عن طريق رقم الاكاديمي',
                    'search.min' => 'Search with valid ID number starting with 1 and at least 7 figures',
                ]);
                $forms = FacultyForm::where('nid','LIKE','%'.Input::get('search').'%')->get();
                break;
            case 'email':
                $this->validate($request,[
                    'search' => 'required|string|exists:reg_forms,email'
                ],[
                    'search.string' => 'البحث عن طريق الايميل',
                    'search.exists' => 'الأيميل غير متواجد',
                ]);
                $forms = FacultyForm::where('email','LIKE','%'.Input::get('search').'%')->get();
                break;
        }

        return view('cp.form.facultyform.index',compact('forms'));
    }


    public function approveFF($id)
    {
        $form = FacultyForm::findOrFail($id);

        $form->status = 1;
        //$request->role = Input::get('role');
        $form->update();

        return redirect(url('/cp/form/ff/'.$form->id.'/view'))->with('status',trans('cp.status.update'));
    }


    public function rejectFF($id)
    {
        $form = FacultyForm::findOrFail($id);

        $form->status = 2;
        //$request->role = Input::get('role');
        $form->update();

        return redirect(url('/cp/form/ff/'.$form->id.'/view'))
            ->with('status',trans('cp.status.update'));
    }

    public function FFApproved()
    {
        $forms = FacultyForm::where('status',1)->latest()->get();
        return view('cp.form.facultyform.index',compact('forms'));
    }
    public function FFRejected()
    {
        $forms = FacultyForm::where('status',2)->latest()->get();
        return view('cp.form.facultyform.index',compact('forms'));
    }
    public function FFPending()
    {
        $forms = FacultyForm::where('status',0)->latest()->get();
        return view('cp.form.facultyform.index',compact('forms'));
    }





    public function emrForms()
    {
        $forms = RegForm::latest()->paginate(25);
        return view('cp.form.emr.index',compact('forms'));
    }

    public function emrFormsApproved()
    {
        $forms = RegForm::where('status',1)->latest()->paginate(25);
        return view('cp.form.emr.index',compact('forms'));
    }
    public function emrFormsRejected()
    {
        $forms = RegForm::where('status',2)->latest()->paginate(25);
        return view('cp.form.emr.index',compact('forms'));
    }
    public function emrFormsPending()
    {
        $forms = RegForm::where('status',0)->latest()->paginate(25);
        return view('cp.form.emr.index',compact('forms'));
    }

    public function viewRegForm($id)
    {


        $form = RegForm::findOrFail($id);
        $next = RegForm::where('status', '=', 0)->where('id', '!=', $id)->min('id');

        return view('forms.regform.view',compact('form','next'));
    }

    public function editRegForm($id)
    {

        $nationality = trans('nationality');

        $jobTitles = trans('jobsTitles');

        $relation = trans('relations');

        $gender = trans('gender');
        $boolean = trans('boolean');

        $centers_male = trans('centers_male');
        $centers_female = trans('centers_female');

        $qualification = trans('qualification');
        $banks = trans('banks');

        $regForm = RegForm::findOrFail($id);

        if($regForm->gender == 'male')
            $centers = trans('centers_male');
        else
            $centers = trans('centers_female');
        return view('cp.form.emr.edit',compact('regForm','nationality','gender','jobTitles','relation','qualification','boolean','centers','centers_male','centers_female','banks'));
    }

    public function updateRegForm(updateRegFormRequest $request, $id)
    {
        $form = RegForm::findOrFail($id);

        //$request->role = Input::get('role');
        $form->update($request->all());

        return redirect(url('/cp/form/emr/'))->with('status',trans('cp.status.update'));
    }


    public function approveRegForm($id)
    {
        $form = RegForm::findOrFail($id);

        $form->status = 1;
        //$request->role = Input::get('role');
        $form->update();

        return redirect(url('/cp/form/emr/'.$form->id.'/view'))->with('status',trans('cp.status.update'));
    }


    public function rejectRegForm($id)
    {
        $form = RegForm::findOrFail($id);

        $form->status = 2;
        //$request->role = Input::get('role');
        $form->update();

        return redirect(url('/cp/form/emr/'.$form->id.'/view'))->with('status',trans('cp.status.update'));
    }



    public function search(Request $request)
    {
        $searchType = Input::get('searchType');
        //dd($searchType);
        switch ($searchType)
        {
            case 'cellphone':
                $this->validate($request,[
                    'search' => 'required|integer|min:500000000'
                ]);
                $forms = RegForm::where('cellphone','LIKE','%'.Input::get('search').'%')->paginate(25);
                break;
            case 'id':
                $this->validate($request,[
                    'search' => 'required|integer|min:1000000'
                ],[
                    'search.integer' => 'البحث عن طريق رقم الاكاديمي',
                    'search.min' => 'Search with valid ID number starting with 1 and at least 7 figures',
                ]);
                $forms = RegForm::where('nid','LIKE','%'.Input::get('search').'%')->paginate(25);
                break;
            case 'email':
                $this->validate($request,[
                    'search' => 'required|string|exists:reg_forms,email'
                ],[
                    'search.string' => 'البحث عن طريق الايميل',
                    'search.exists' => 'الأيميل غير متواجد',
                ]);
                $forms = RegForm::where('email','LIKE','%'.Input::get('search').'%')->paginate(25);
                break;
        }

        return view('cp.form.emr.index',compact('forms'));
    }

    public function evaIndex()
    {
        return view('cp.form.emr.evaluation.index');
    }
    public function evaView(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nid' => 'required|numeric|exists:reg_forms,nid,status,1'
        ]);
        if($validator->fails()){
            return redirect(URL::previous())
                ->withErrors([
                    'nid.numeric' => 'يجب إدخال رقم الهوية/الإقامة',
                    'nid.exists' => 'رقم الهوية/الإقامة غير متواجد',
                ])
                ->withInput();
        }
        $nid = $request->get('nid');
        $form = RegForm::where('NID','=',$nid)->first();
        //dd($form);
        $rateForm = null;
        return view('cp.form.emr.evaluation.view',compact('form','rateForm'));
    }




}
