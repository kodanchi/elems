<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\RegForm;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
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
        $forms = RegForm::latest()->get();
        return view('cp.index',compact('forms'));
    }

    public function users()
    {
        $users = User::latest()->get();
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



    public function emrForms()
    {
        $forms = RegForm::latest()->get();
        return view('cp.index',compact('forms'));
    }

    public function view($id)
    {

        $form = RegForm::findOrFail($id);
        return view('forms.regform.view',compact('form'));
    }
}
