@extends('admin_layouts.index')

@section('content')
@section('content')
    @if(Session::has('role') && Session::get('role')=='employee')
        <p>you are not authorized|| Only Admin Can view</p>
    @endif

    @if(Session::has('role') && Session::get('role')=='admin')
        <p> not an employee</p>
    @endif


    @stop
