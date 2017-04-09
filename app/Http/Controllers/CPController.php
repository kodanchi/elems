<?php

namespace App\Http\Controllers;

use App\EmailValidation;
use App\Evaluation;
use App\FacultyForm;
use App\Http\Requests\AgreeRequest;
use App\Http\Requests\RegFormRequest;
use App\Http\Requests\updateRegFormRequest;
use App\Http\Requests\UsersRequest;
use App\RegForm;
use App\Survey;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;
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

        $totalResult = FacultyForm::all();

        return view('cp.form.facultyForm.index',compact('forms','totalResult'));
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
        $totalResult = '';
        //dd($searchType);
        switch ($searchType)
        {
            case 'cellphone':
                $this->validate($request,[
                    'search' => 'required|integer|min:500000000'
                ]);
                $forms = FacultyForm::where('cellphone','LIKE','%'.Input::get('search').'%')->get();
                $totalResult = FacultyForm::where('cellphone','LIKE','%'.Input::get('search').'%');
                break;
            case 'id':
                $this->validate($request,[
                    'search' => 'required|integer|min:1000000'
                ],[
                    'search.integer' => 'البحث عن طريق رقم الاكاديمي',
                    'search.min' => 'Search with valid ID number starting with 1 and at least 7 figures',
                ]);
                $forms = FacultyForm::where('nid','LIKE','%'.Input::get('search').'%')->get();
                $totalResult = FacultyForm::where('nid','LIKE','%'.Input::get('search').'%')->get();
                break;
            case 'email':
                $this->validate($request,[
                    'search' => 'required|string|exists:reg_forms,email'
                ],[
                    'search.string' => 'البحث عن طريق الايميل',
                    'search.exists' => 'الأيميل غير متواجد',
                ]);
                $forms = FacultyForm::where('email','LIKE','%'.Input::get('search').'%')->get();
                $totalResult = FacultyForm::where('email','LIKE','%'.Input::get('search').'%')->get();
                break;
        }

        return view('cp.form.facultyform.index',compact('forms', 'totalResult'));
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
        $totalResult = FacultyForm::where('status',1);
        return view('cp.form.facultyform.index',compact('forms','totalResult'));
    }
    public function FFRejected()
    {
        $forms = FacultyForm::where('status',2)->latest()->get();
        $totalResult = FacultyForm::where('status',2);
        return view('cp.form.facultyform.index',compact('forms','totalResult'));
    }
    public function FFPending()
    {
        $forms = FacultyForm::where('status',0)->latest()->get();
        $totalResult = FacultyForm::where('status',0);
        return view('cp.form.facultyform.index',compact('forms','totalResult'));
    }





    public function emrForms()
    {
        $forms = RegForm::latest()->paginate(25);
        $totalResult = RegForm::all();
        return view('cp.form.emr.index',compact('forms', 'totalResult'));
    }

    public function emrFormsApproved()
    {
        $forms = RegForm::where('status',1)->latest()->paginate(25);
        $totalResult = RegForm::where('status',1);
        return view('cp.form.emr.index',compact('forms', 'totalResult'));
    }
    public function emrFormsRejected()
    {
        $forms = RegForm::where('status',2)->latest()->paginate(25);
        $totalResult = RegForm::where('status',2);
        return view('cp.form.emr.index',compact('forms', 'totalResult'));
    }
    public function emrFormsPending()
    {
        $forms = RegForm::where('status',0)->latest()->paginate(25);
        $totalResult = RegForm::where('status',0);
        return view('cp.form.emr.index',compact('forms', 'totalResult'));
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
        $totalResult = '';
        //dd($searchType);
        switch ($searchType)
        {
            case 'cellphone':
                $this->validate($request,[
                    'search' => 'required|integer|min:500000000'
                ]);
                $forms = RegForm::where('cellphone','LIKE','%'.Input::get('search').'%')->paginate(25);
                $totalResult = RegForm::where('cellphone','LIKE','%'.Input::get('search').'%');
                break;
            case 'id':
                $this->validate($request,[
                    'search' => 'required|integer|min:1000000'
                ],[
                    'search.integer' => 'البحث عن طريق رقم الاكاديمي',
                    'search.min' => 'Search with valid ID number starting with 1 and at least 7 figures',
                ]);
                $forms = RegForm::where('nid','LIKE','%'.Input::get('search').'%')->paginate(25);
                $totalResult = RegForm::where('nid','LIKE','%'.Input::get('search').'%');
                break;
            case 'email':
                $this->validate($request,[
                    'search' => 'required|string|exists:reg_forms,email'
                ],[
                    'search.string' => 'البحث عن طريق الايميل',
                    'search.exists' => 'الأيميل غير متواجد',
                ]);
                $forms = RegForm::where('email','LIKE','%'.Input::get('search').'%')->paginate(25);
                $totalResult = RegForm::where('email','LIKE','%'.Input::get('search').'%');
                break;
        }

        return view('cp.form.emr.index',compact('forms', 'totalResult'));
    }




    public function excelExport()
    {
        $forms = DB::select('
    select 
    
        id as \'ID\',
		NID as \'NID\',
		fname as \'First\',
		faname as \'Father\',
		gfaname as \'Grand Father\',
		lname as \'Lastname\',
		birth_date as \'Birthdate\',
		nationality as \'Nationality\',
		gender as \'Gender\',
		phone as \'Phone\',
		cellphone as \'Cellphone\',
		email as \'Email\',

		qualification as \'Qualification\',
		major as \'Major\',
		department as \'Department\',
		section,
		employee_ID	,
		Case when is_contract = 0 then \'No\' else \'Yes\' end as \'Contract\' ,
		job_title as \'Job Title\'	,
		supervisor as \'Supervisor Name\'	,
		su_email as \'Supervisor email\'	,
		su_phone as \'Supervisor phone\'	,
		su_cellphone	as \'Supervisor Cellphone\',
		Case when el_exams_Before = 0 then \'No\' else \'Yes\' end as \'participate in EL exams inside university\',
		el_exams_num as \'Number of Exams\',
		Case when other_exams_Before = 0 then \'No\' else \'Yes\' end as \'participate in other exams?\',
		other_exams as \'specify ther exams\'	,
		Case when isSV = 0 then \'No\' else \'Yes\' end as \'Supervisor\'	,
		Case when isInspector = 0 then \'No\' else \'Yes\' end as \'Inspector\' 	,
		Case when isController = 0 then \'No\' else \'Yes\' end as \'Controller\'	,
		IBAN	,
		bank_name as \'Bank Name\'	,
		account_holder_name as \'Bank Holder name\'	,
		emergency_name as \'Emergency Person name\'	,
		emer_relation as \'Emergency Person Relation\'	,
		emer_cellphone as \'Emergency Person Cellphone\'	,

		Case when center_first = 1 then \'Main-Alrakkah\'
			when center_first = 2 then  \'college-of-education-dammam\'
			when center_first = 3 then  \'girls rayyan-dammam\'
			when center_first = 4 then   \'college-of-education-jubail\'
			when center_first = 5 then  \'college-arts-and-sciences-nairiyah\'
			when center_first = 6 then  \'orienation building -hafralbatin\'
			when center_first = 7 then  \'college-arts-and-sciences-al-khafji\'
			when center_first = 8 then   \'college-education-hafralbatin\'
			end as \'First select center\'	,
		Case when center_second = 1 then \'Main-Alrakkah\'
			when center_second = 2 then  \'college-of-education-dammam\'
			when center_second = 3 then  \'girls rayyan-dammam\'
			when center_second = 4 then   \'college-of-education-jubail\'
			when center_second = 5 then  \'college-arts-and-sciences-nairiyah\'
			when center_second = 6 then  \'orienation building -hafralbatin\'
			when center_second = 7 then  \'college-arts-and-sciences-al-khafji\'
			when center_second = 8 then   \'college-education-hafralbatin\'
			end as \'Second select center\'	,
		created_at	,
		updated_at	,
		REPLACE(job_identity_file,job_identity_file,\'http://elweb.uod.edu.sa/storage/\'+job_identity_file) as \'job Identitification\'	,
		REPLACE(qualification_identity_file,qualification_identity_file,\'http://elweb.uod.edu.sa/storage/\'+qualification_identity_file) as \'Qualification Proof\'	,
		Case when status = 0 then \'Pending\'
			when status = 1 then  \'Approved\'
			when status = 2 then  \'Rejected\'
		end as \'Status\'		


from reg_forms ');


        $forms3 = DB::select('
    select 
            id as \'ID\',
		NID as \'NID\',
		fname as \'First\',
		faname as \'Father\',
		gfaname as \'Grand Father\',
		lname as \'Lastname\',
		birth_date as \'Birthdate\',
		nationality as \'Nationality\',
		gender as \'Gender\',
		phone as \'Phone\',
		cellphone as \'Cellphone\',
		email as \'Email\',

		qualification as \'Qualification\',
		major as \'Major\',
		department as \'Department\',
		section,
		employee_ID	,
		Case when is_contract = 0 then \'No\' else \'Yes\' end as \'Contract\' ,
		job_title as \'Job Title\'	,
		supervisor as \'Supervisor Name\'	,
		su_email as \'Supervisor email\'	,
		su_phone as \'Supervisor phone\'	,
		su_cellphone	as \'Supervisor Cellphone\',
		Case when el_exams_Before = 0 then \'No\' else \'Yes\' end as \'participate in EL exams inside university\',
		el_exams_num as \'Number of Exams\',
		Case when other_exams_Before = 0 then \'No\' else \'Yes\' end as \'participate in other exams?\',
		other_exams as \'specify ther exams\'	,
		Case when isSV = 0 then \'No\' else \'Yes\' end as \'Supervisor\'	,
		Case when isInspector = 0 then \'No\' else \'Yes\' end as \'Inspector\' 	,
		Case when isController = 0 then \'No\' else \'Yes\' end as \'Controller\'	,
		IBAN	,
		bank_name as \'Bank Name\'	,
		account_holder_name as \'Bank Holder name\'	,
		emergency_name as \'Emergency Person name\'	,
		emer_relation as \'Emergency Person Relation\'	,
		emer_cellphone as \'Emergency Person Cellphone\'	,

		Case when center_first = 1 then \'Main-Alrakkah\'
			when center_first = 2 then  \'college-of-education-dammam\'
			when center_first = 3 then  \'girls rayyan-dammam\'
			when center_first = 4 then   \'college-of-education-jubail\'
			when center_first = 5 then  \'college-arts-and-sciences-nairiyah\'
			when center_first = 6 then  \'orienation building -hafralbatin\'
			when center_first = 7 then  \'college-arts-and-sciences-al-khafji\'
			when center_first = 8 then   \'college-education-hafralbatin\'
			end as \'First select center\'	,
		Case when center_second = 1 then \'Main-Alrakkah\'
			when center_second = 2 then  \'college-of-education-dammam\'
			when center_second = 3 then  \'girls rayyan-dammam\'
			when center_second = 4 then   \'college-of-education-jubail\'
			when center_second = 5 then  \'college-arts-and-sciences-nairiyah\'
			when center_second = 6 then  \'orienation building -hafralbatin\'
			when center_second = 7 then  \'college-arts-and-sciences-al-khafji\'
			when center_second = 8 then   \'college-education-hafralbatin\'
			end as \'Second select center\'	,
		created_at	,
		updated_at	,
		REPLACE(job_identity_file,job_identity_file,\'http://elweb.uod.edu.sa/storage/\'+job_identity_file) as \'job Identitification\'	,
		REPLACE(qualification_identity_file,qualification_identity_file,\'http://elweb.uod.edu.sa/storage/\'+qualification_identity_file) as \'Qualification Proof\'	,
		Case when status = 0 then \'Pending\'
			when status = 1 then  \'Approved\'
			when status = 2 then  \'Rejected\'
		end as \'Status\'		


from reg_forms 
 WHERE  update_status = \'OK\'

');


        $forms2 = DB::select('select NID , 
		
		REPLACE(hash,hash,\'http://elweb.uod.edu.sa/form/emr/updateform/\'+hash) as \'link\' ,
			
			email as \'email\'

		from RegHash');

        $forms = collect($forms)->map(function($x){ return (array) $x; })->toArray();
        $forms2 = collect($forms2)->map(function($x){ return (array) $x; })->toArray();
        $forms3 = collect($forms3)->map(function($x){ return (array) $x; })->toArray();

        //dd($forms);
        $date = Carbon::now();

        Excel::create('RegForm-'.$date, function($excel) use($forms , $forms2 ,$forms3) {

            $excel->sheet('جميع المسجلين', function($sheet) use($forms) {

                $sheet->fromArray($forms);

            });

                $excel->sheet('روابط تجديد الرغبة', function($sheet) use($forms2) {

                $sheet->fromArray($forms2);

            });

            $excel->sheet('تم تجديد الرغبة', function($sheet) use($forms3) {

                $sheet->fromArray($forms3);

            });

        })->download('xls');
    }

    public function ObjRequested()
    {

            $forms = EmailValidation::where('valid_for', 'objection')
                ->latest()->paginate(15);


        return view('cp.students.objection.requested',compact('forms'));
    }

    public function SPRequested()
    {

            $forms = EmailValidation::where('valid_for', 'sp')
                ->latest()->paginate(15);


        return view('cp.students.sp.requested',compact('forms'));
    }

    public function SPValidate()
    {

        $email = Input::get('email');
        $sid = explode('@',$email)[0];

        Session::put('sid', $sid);

        $classes = DB::select('select courses.des, courses.cid, classes.name, SSC.class_id from courses, classes, SSC '.
            'WHERE SSC.class_id = classes.class_id '.
            'AND classes.cid = courses.cid '.
            'AND SSC.sid= ?',[$sid]);
        //dd($classes);
        //$majors = trans('majors');
        //$dates = DB::table('exams')->select('exams.date')->get();
        //$datesArr = DB::select('select date from exams ');
        $courses = [''=>'حدد'];
        foreach($classes as $class)
        {
            //print_r(get_object_vars($date));
            $courses[$class->class_id] = $class->des . ' - ' . $class->name;
            //print_r($dates);
        }
        //dd(get_object_vars($dates));
        return view('students.sp.search', compact('courses'));

    }

    public function ObjValidate()
        {

            $email = Input::get('email');
            $sid = explode('@',$email)[0];

            Session::put('sid', $sid);

            $classes = DB::select('select courses.des, courses.cid, classes.name, SSC.class_id from courses, classes, SSC '.
                'WHERE SSC.class_id = classes.class_id '.
                'AND classes.cid = courses.cid '.
                'AND SSC.sid= ?',[$sid]);
            //dd($classes);
            //$majors = trans('majors');
            //$dates = DB::table('exams')->select('exams.date')->get();
            //$datesArr = DB::select('select date from exams ');
            $courses = [''=>'حدد'];
            foreach($classes as $class)
            {
                //print_r(get_object_vars($date));
                $courses[$class->class_id] = $class->des . ' - ' . $class->name;
                //print_r($dates);
            }
            //dd(get_object_vars($dates));
            return view('students.objection.search', compact('courses'));

        }


    public function SIDHashAll()
    {
        $deleted = DB::delete('delete from hashedSID');
        $students = DB::table('students')->get();

        foreach ($students as $student) {

            //$hsid = Hash::make($student->sid);
            $pin = str_random(20);
            DB::insert('insert into hashedSID (sid,hash) values (?,?)',[ $student->sid, $pin]);
        }

    }

    public function surveyList()
    {
        $forms = Survey::paginate(20);
        $infos=DB::select('select * from surveys_questions ,Surveys  where id = survey_id ');

        $totalResult = Survey::all();

        return view('cp.surveys.index',compact('forms', 'totalResult', 'infos'));
    }

    public function surveySearch(Request $request)
    {
        $searchType = Input::get('searchType');
        $searchText = Input::get('search');
        //dd($searchType);
        switch ($searchType)
        {

            case 'sid':
                $validator = Validator::make($request->all(),[
                    'search' => 'required|numeric|exists:surveys,sid'
                ],[
                    'search.string' => 'البحث عن طريق الرقم الاكاديمي',
                    'search.exists' => 'الرقم الاكاديمي غير متواجد',
                ]);
                if($validator->fails()){
                    return redirect(URL::previous())
                        ->withErrors($validator)
                        ->withInput();
                }
                $forms = Survey::paginate(20);
                $infos = DB::select('select * from surveys_questions ,Surveys  where id = survey_id and sid = ?',[$searchText]);
                break;
        }

        return view('cp.surveys.index',compact('infos' , 'forms'));
    }


    public function regFormNew()
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
        return view('cp.form.emr.create',compact('nationality','gender','jobTitles','relation','qualification','boolean','centers_male','centers_female','banks'));


    }

    public function regFormAdd(RegFormRequest $request)
    {

        $attach = $request->file('job_identity_attach');

        do{
            $fileName = str_random('20').'.'.$attach->getClientOriginalExtension();
        }while(Storage::exists($fileName));

        Storage::put($fileName,File::get($attach));
        $request->merge(['job_identity_file' => $fileName]);

        //qualification_attach
        $attach = $request->file('qualification_identity_attach');

        do{
            $fileName = str_random('20').'.'.$attach->getClientOriginalExtension();
        }while(Storage::exists($fileName));

        Storage::put($fileName,File::get($attach));
        $request->merge(['qualification_identity_file' => $fileName]);



        if($request->input('nationality') === 'other')
            $request->merge(['nationality' => $request->input('other_nationality')]);


        if($request->input('job_title') === 'other')
            $request->merge(['job_title' => $request->input('other_job_title')]);


        if($request->input('emer_relation') === 'other')
            $request->merge(['emer_relation' => $request->input('other_emer_relation')]);

        $request->merge(['is_contract' => $request->input('is_contract') === '1' ? 1 : 0]);
        $request->merge(['isSV' => $request->input('isSV') === '1' ? 1 : 0]);
        $request->merge(['isInspector' => $request->input('isInspector') === '1' ? 1 : 0]);
        $request->merge(['isController' => $request->input('isController') === '1' ? 1 : 0]);

        RegForm::create($request->all());

        //return Redirect::to('/form/emr/form/success')->with('status',trans('regform.SuccessSubmit'));
        return redirect('/cp/form/emr/')->with('status','تم إضافة المراقب');

    }

    public function EmrEvaluationExcelExport()
    {
        $forms = DB::select('  select form_id as \'ID\',
  NID AS \'NID\',
		fname as \'First Name\',
		faname as \'Father Name\',
		gfaname as \'Grandfather Name\',
		lname as \'Last name\',
		rate as \'Rate\',
		evaluation.days as \'Days\',
		evaluation.des as \'Description\',
		evaluation.[user] as \'Evaluator\',


		
		evaluation.created_at	,
		evaluation.updated_at

from evaluation, reg_forms
where evaluation.form_id = reg_forms.id ');

        $forms = collect($forms)->map(function($x){ return (array) $x; })->toArray();

        //dd($forms);
        $date = Carbon::now();

        Excel::create('Evaluation-'.$date, function($excel) use($forms) {

            $excel->sheet('All', function($sheet) use($forms) {

                $sheet->fromArray($forms);

            });

        })->download('xls');
    }


}
