<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

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
/*

    public function login(Request $request){
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,

        ])){
            $user = Auth::user();
            $resArr = [];
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;
            return response()->json($resArr,200);
        } else{
            return response()->json([
                'error'=> 'Unauthorize Access'
            ],200);
        }

    }
   public function registration(Request $request){
       $validator = Validator::make($request->all(),[
           'name'=>'required',
           'email'=>'required|email',
           'password'=>'required',
           'c_password'=>'required|same:password'
       ]);
       if($validator->fails()){
           return response()->json($validator->errors(),202);
       }
        $allData = $request->all();
        $allData['password'] = bcrypt($allData['password']);

        $user = User::create($allData);

        $resArr = [];
        $resArr['token']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;
        return response()->json($resArr,200);

    }*/


    function registration(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
//        $user =new User::firstOrNew(['email'=>$request->email]);
        $user =new User;
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->save();

        $http = new Client();

        $response = $http->post(url('http://127.0.0.1:8000/oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'zRhFJz94JHacRotPFhQvKO2Nv2ao32yireZwTlBH',
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);

    }
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response(['data'=>'User not found']);
        }
        if(Hash::check($request->password,$user->password)){
            $http = new Client;

            $response = $http->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '4',
                    'client_secret' => 'zRhFJz94JHacRotPFhQvKO2Nv2ao32yireZwTlBH',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            return response(['data'=>json_decode((string) $response->getBody(), true),]);
        }
    }

/*    public function registration(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),202);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $responseArray = [];
        $responseArray['token'] = $user->createToken('MyApp')->accessToken;
        $responseArray['name'] = $user->name;

        return response()->json($responseArray,200);
    }*/
}
