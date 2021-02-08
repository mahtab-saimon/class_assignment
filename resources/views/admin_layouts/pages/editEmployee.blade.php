@extends('admin_layouts.index')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Employee</li>
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
                            <h3 class="card-title">Edit Employee</h3>
                        </div>
                        <form action="{{URL::to('/updateEmployee/'.$employee->id)}}" method="post">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input id="name" class="form-control" name="name" value="{{ $employee->name }}" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="email"> Email</label>
                                    <input id="email" class="form-control" name="email" value="{{ $employee->email }}" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="phone"> Phone</label>
                                    <input id="phone" class="form-control" name="phone" value="{{ $employee->phone }}" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="password"> password</label>
                                    <input id="password" class="form-control" name="password" value="{{ $employee->password }}" type="password">
                                </div>
                                <div class="form-group">
                                    <label for="password"> Gender</label> <br>
                                    <input type="radio" name="gender"
                                           <?php if ($employee->gender == 'male'){ echo "checked"; } ?>
                                           value="male">
                                    <label for="male">Male</label><br>
                                    <input type="radio" name="gender"  <?php if ($employee->gender == 'female')
                                    { echo "checked"; }?>  value="female">
                                    <label for="female">Female</label><br>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        @if($employee->is_active == 1)
                                            <input class="form-check-input" checked type="checkbox" id="gridCheck" name="is_active" value="{{ $employee->is_active }}" value="1">
                                        @else
                                        <input class="form-check-input" type="checkbox" id="gridCheck" name="is_active" value="{{ $employee->is_active }}" value="1">
                                        @endif
                                        <label class="form-check-label" for="gridCheck">
                                            Is Active
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth "> Date Of Birth</label>
                                    <input id="date_of_birth" class="form-control" name="date_of_birth" value="{{$employee->date_of_birth }}" type="date">
                                </div>
                                <div class="form-group">
                                    <label for="role"> Role</label>
                                    <input id="role" class="form-control" name="role" value="{{ $employee->role }}" type="text">
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
@endsection
