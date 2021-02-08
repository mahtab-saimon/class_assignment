<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_layouts/admin_Login');
    }
    public function show_dashboard()
    {
        return view('admin_layouts/dashboard');
    }
    public function dashboard()
    {
        return view('admin_layouts/dashboard');
    }

}
