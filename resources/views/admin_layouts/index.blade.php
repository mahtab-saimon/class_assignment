<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin_layouts/inc/head')
</head>
<body class="sb-nav-fixed">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    @include('admin_layouts/inc/nav')
<div id="layoutSidenav">
    @include('admin_layouts/inc/sideBar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('admin_layouts/inc/head') @include('admin_layouts/inc/footer')
    </div>
</div>
@include('admin_layouts/inc/script')
</body>
</html>
