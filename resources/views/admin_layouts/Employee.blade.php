@extends('admin_layouts.index')

@section('content')
@if(Session::has('role') && Session::get('role')=='admin')
    <p>you are not authorized|| Only employee Can view</p>
@endif

@if(Session::has('role') && Session::get('role')=='employee')
    <p> employee</p>
@endif

@stop
