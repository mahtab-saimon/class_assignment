<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Session;

class EmployeeController extends Controller
{
    public function index(){
        return view('admin_layouts.pages.addEmployee');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:employees',
            'phone' => 'required|max:200',
        ]);

        $employee = new Employee;
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->password=$request->password;
        $employee->gender=$request->gender;
        $employee->is_active=$request->is_active;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->role=$request->role;
           $employee->save();
        if ($employee) {
          //  Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
            $notification = array(
                'messege' => 'Successfully Inserted',
                'alert-type' => 'success'
            );
            return Redirect()->route('/addEmployee')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Not Inserted',
                'alert-type' => 'error'
            );
            return Redirect()->route('/addEmployee')->with($notification);
        }
    }


    public function showEmployees(){
        $employee=employee::all();
        return view('admin_layouts.pages.allEmployee',compact('employee'));
    }
    public function viewEmployee($id){
        $employee=employee::findorfail($id);
        return view('employee.viewEmployee',compact('employee'));
    }

    public function edit($id){
        $employee=employee::findorfail($id);
        return view('admin_layouts.pages.editEmployee', compact('employee'));
    }
    public function updateEmployee(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'phone' => 'required|max:200',
        ]);

        $employee=Employee::findorfail($id);
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->password=md5($request->password);
        $employee->gender=$request->gender;
        $employee->is_active=$request->is_active;
        $employee->date_of_birth=$request->date_of_birth;
        $employee->role=$request->role;
       $employee->save();
        if ($employee){
            $notification=array(
                'messege'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('/allEmployee')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return Redirect()->route('/editEmployee')->with($notification);
        }

    }
    public function destroy($id){

        $delete=DB::table('employees')->where('id',$id)->delete();
        if ($delete) {
            $notification=array(
                'messege'=>'Successfully Data Deleted !',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }


    }



}
