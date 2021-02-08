<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index()
        {

            if(Session::has('name')){
                return redirect('/dashboard');

            }
            return view('admin_layouts/admin_Login');
        }
    public function dashboard(Request $request)
    {
        $email = $request->email;
        $password =$request->password;
        $employee=DB::table('employees')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        //$admin=Admin::all()->where('admin_email',$admin_email)->where('admin_password',$admin_password);
        if ($employee){
            $name = $employee->name;
            $role = $employee->role;
            Session::put('name',$name);
            Session::put('role',$role);
            $notification = array(
                'messege' => 'Successfully logged In',
                'alert-type' => 'success'
            );
            return Redirect('/dashboard')->with($notification);
        } else{
            $notification = array(
                'messege' => 'Something Went wrong',
                'alert-type' => 'error'
            );
            return Redirect('/')->with($notification);

        }


        //return view('admin.dashboard');
    }
    public function logout(){
        Session::flash('name');
        Session::flash('role');
        return redirect('/');
    }
    public function nonEmployee(){

        return view('admin_layouts/nonEmployee');
    }
      public function employee(){

        return view('admin_layouts/employee');
    }

}
