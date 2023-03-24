@extends('backend.layout')

@section('title', 'Admin edit user')

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-8 col-md-10">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Chỉnh sửa tài khoản nhân viên</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.update', $user->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2">Tên Nhân Viên :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="name" type="text" value="{{$user->name}}">
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
                                <label class="col-md-2">Email :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="email" type="text" value="{{$user->email}}">
                                    @error('email')
                                    <small class="alert" style="color: #ff0000">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2">Password :</label>
                                <div class="col-md-8">
                                    <input class="form-control" name="password" type="text">
                                    @error('password')
                                    <small class="alert" style="color: #ff0000">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label">Số điện thoại :</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Số điện thoại" value="{{$user->phone}}" name="phone">
                                    @error('phone')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label">Địa chỉ :</label>
                                <div class="col-md-8">
                                    <input class="form-control" placeholder="Địa chỉ" name="address">{{$user->address}}</input>
                                    @error('address')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2">Chức vụ :</label>
                                <div class="col-md-8">
                                    <div class="row ml-2">
                                        @foreach($roles as $key => $item)
                                            <div class="form-check col-md-4">
                                                <input value="{{$item->id}}"  class="form-check-input" type="checkbox" name="roles[]" id="flexCheckChecked{{$item->id}}" {{$user->roles->contains($item->id) ? 'checked' : ''}}>
                                                <label class="form-check-label" for="flexCheckChecked{{$item->id}}">
                                                    {{$item->display_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label">Ảnh :</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/images/'.$user->image) }}" height="150" alt="">
                                    <input name="image" class="input-file" value="{{ $user->image }}" type="file">
                                    @error('image')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.user')}}">Back</a>
                            <button value="Submit" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
