@extends('backend.layout')

@section('title', 'Admin create user')

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-8 col-md-10">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Thêm Tài Khoản Nhân Viên</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label">Tên Tài Khoản</label>
                                <div class="col-md-8">
                                    <input name="name" placeholder="Tên tài khoản" class="form-control input-md" type="text">
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
                                <label class="col-md-2 control-label">Email</label>
                                <div class="col-md-8">
                                    <input name="email"  class="form-control input-md" placeholder="Email" type="text">
                                    @error('email')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-2 control-label">Mật Khẩu</label>
                                <div class="col-md-8">
                                    <input name="password"  class="form-control input-md" placeholder="Mật khẩu" type="text">
                                    @error('password')
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
                                            <div name="permission" class="form-check col-md-6">
                                                <input value="{{$item->id}}"  class="form-check-input" type="checkbox" name="roles[]" id="flexCheckChecked{{$item->id}}}">
                                                <label class="form-check-label" for="flexCheckChecked{{$item->id}}}">
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
                                <label class="col-md-2 control-label">Số Điện Thoại</label>
                                <div class="col-md-8">
                                    <input name="phone" placeholder="Số điện thoại" class="form-control input-md" type="text">
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
                                <label class="col-md-2 control-label">Địa chỉ</label>
                                <div class="col-md-8">
                                    <input name="address" class="form-control input-md" placeholder="Địa chỉ" type="text">
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
                                <label class="col-md-2 control-label">Ảnh</label>
                                <div class="col-md-8">
                                    <input name="image" class="input-file" type="file">
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
