@extends('backend.layout')

@section('title', 'Admin user')

@section('content')
    <div class="mx-3 my-3">
        <div class=" row">
            <div class="col-lg-6">
                <h1 class="page-header" style="border: none; margin-top: 0">
                    Danh sách tài khoản nhân viên
                </h1>
            </div>
            <div class="col-lg-6">
                <form action="{{route('admin.user')}}" class="navbar-search" style="padding-left: 150px">
                    <div class="input-group border">
                        <input id="keyword" name="keyword" type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb" style="background: transparent">
                    <li class="active">
                        <i class="fa fa-table"></i> Danh sách tài khoản nhân viên
                    </li>
                </ol>
            </div>
            <div class="col-lg-6">
                <div class="text-right">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success">
                        <i class="fa fa-fw fa-plus-circle"></i>
                        Thêm tài khoản nhân viên
                    </a>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success my-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div id="product_data" class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Ảnh</th>
                            <th>Tên nhân viên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody id="listUser">
                        @foreach($listUser as $key => $item)
                            <tr id="cate{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td><img src="{{ asset('storage/images/'.$item->image)}}" height="150" width="100%" alt="contact-img"></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if($item->roles != null)
                                        @foreach($item->roles as $role)
                                            {{$role->display_name}} |
                                        @endforeach
                                    @else
                                        Chưa có chức vụ
                                    @endif
                                </td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->updated_at}}</td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $item->id) }}"  class="btn btn-sm btn-warning">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a id="{{ $item->id }}" class="btn btn-sm btn-danger " href="#" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ucwords("xoá danh mục ".$item->name)}}</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Bạn có chắc chắn muốn xoá danh mục này?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancel</button>
                                                    <form method="post" action="{{route('admin.user.delete', $item->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                        <button id="{{ $item->id }}" type="submit" class="btn btn-primary deleteProduct">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $listUser->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection
