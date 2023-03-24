@extends('backend.layout')

@section('title', 'Admin dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wellcome!!! {{auth()->guard('admin')->user()->name}}</h1>
        </div>

    </div>
@endsection
