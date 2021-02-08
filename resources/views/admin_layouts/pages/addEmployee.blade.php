@extends('admin_layouts.index')
@section('content')
    @if(Session::has('role') && Session::get('role')=='admin')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 offset-2">
                    <div class="card card-dark">
                        <div class="card-header">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="card-title">Add Employee</h3>
                                <a href="{{route('/allEmployee')}}" class="btn btn-primary">Manage Employee</a>
                        </div>
                        <form action="{{route('/insertEmployee')}}" method="post">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input id="name" class="form-control" name="name" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input id="email" class="form-control" name="email" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="phone"> Phone</label>
                                    <input id="phone" class="form-control" name="phone" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="password"> password</label>
                                    <input id="password" class="form-control" name="password" type="password">
                                </div>

                                <div class="form-group">
                                    <label for="password"> Gender</label> <br>
                                    <input type="radio" id="male" name="gender" value="male">
                                    <label for="male">Male</label><br>
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck" name="is_active" value="1">
                                        <label class="form-check-label" for="gridCheck">
                                            Is Active
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth "> Date Of Birth</label>
                                    <input id="date_of_birth" class="form-control" name="date_of_birth" type="date">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="role">
                                        <option > select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if(Session::has('role') && Session::get('role')=='employee')
    <p>you are not authorized || Only Admin Can view</p>
    @endif
@endsection
