@extends('admin_layouts.index')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Employee</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Employee</h3>
                            <a href="{{route('/addEmployee')}}" class="btn btn-primary">Add Employee</a>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1 " class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Active</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($employee as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->date_of_birth }}</td>
                                        <td>
                                            @if($row->is_active == '1')
                                                <span class="badge badge-success">
                                                   Active
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    Inactive
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $row->role }}</td>
                                        <td class="center">
                                            <a class="btn btn-success btn-sm" href="{{ URL::to('editEmployee/'.$row->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm" href="{{ URL::to('viewEmployee/'.$row->id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="{{ URL::to('deleteEmployee/'.$row->id) }}" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Active</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
