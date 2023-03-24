@extends('backend.layout')

@section('title', 'Admin add category')

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-10 col-md-12">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Thêm Danh Mục</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.store.category') }}" class="form-horizontal">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4">Category Name :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" type="text">
                                    @error('name')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4">Parent category :</label>
                                <div class="col-md-8">
                                    <select class="form-control form-custom" name="type">
                                        <option value="Top">Top</option>
                                        <option value="Bottom">Bottom</option>
                                        <option value="Accessory">Accessory</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.category')}}">Back</a>
                            <button value="Submit" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
