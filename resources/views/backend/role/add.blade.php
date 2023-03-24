@extends('backend.layout')

@section('title', 'Admin add role')

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-8 col-md-8">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Thêm Vai Trò</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.role.store') }}" class="form-horizontal">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2">Tên Vai Trò :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" placeholder="Tên vai trò" type="text">
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
                                <label class="col-md-2">Tên Hiển Thị :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="display_name" placeholder="Tên hiển thị" type="text">
                                    @error('display_name')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label" for="product_description">Mô tả :</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" placeholder="Mô tả vai trò" name="description"></textarea>
                                    @error('description')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2">Quyền :</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        @foreach($permissions as $key => $item)
                                            <div name="permission" class="form-check col-md-4">
                                                <input value="{{$item->id}}"  class="form-check-input" type="checkbox" name="permissions[]" id="flexCheckChecked{{$item->id}}}">
                                                <label class="form-check-label" for="flexCheckChecked{{$item->id}}}">
                                                    {{$item->display_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.role')}}">Back</a>
                            <button value="Submit" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
