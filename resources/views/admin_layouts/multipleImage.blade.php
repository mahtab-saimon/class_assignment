<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Image Upload</title>
    <style>
        img {
            border-radius: 2px;
            padding: 3px;
            width:200px;
            height:100px;
        }
    </style>
</head>
<body>


</body>
</html>



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
        <div class="container">
            <h2>Image Upload Using Intervention</h2>
            @if(Session::has('msg'))
                <div class="alert alert-success">
                    {{ Session::get('msg')}}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{URL::to('upload-image')}}" method="post" enctype="multipart/form-data">
                {{csrf_field() }}

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" multiple class="form-control" name="filename[]" id="imgInp">
                    <!-- <img width= " 200px"id="blah" src="#" alt="your image" /> -->
                    <div id="blah" class="blah"></div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>

            <hr>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2>Uploaded Images</h2>
                    </div>

                    <div class="card-body">
                        @if($images)
                            @foreach($images as $i)
                                <img src="{{ asset('images/'. $i->filename)}}" alt="">
                            <!-- {{ $i->filename}} -->
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
