@extends('backend.layout')

@section('title', 'Admin order')

@section('content')
    <div class="mx-3 my-3">
        <div class=" row">
            <div class="col-lg-6">
                <h1 class="page-header" style="border: none; margin-top: 0">
                    Lời nhắn
                </h1>
            </div>
            <div class="col-lg-6">
                <form action="{{route('admin.contact')}}" class="navbar-search" style="padding-left: 150px">
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
                        <i class="fa fa-table"></i> Danh sách lời nhắn
                    </li>
                </ol>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success my-3 ">
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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Lời nhắn</th>
                            <th>Ngày gửi</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody id="listUser">
                        @foreach($data as $key => $item)
                            <tr data-id="{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->message}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <a id="{{ $item->id }}" class="btn btn-sm btn-danger " href="#" data-toggle="modal" data-target="#deleteModal{{$item->id}}">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                    <div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{ucwords("xoá mục này?")}}</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Bạn có chắc chắn muốn xoá?</div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary " type="button" data-dismiss="modal">Cancel</button>
                                                    <form method="post" action="{{route('admin.contact.delete', $item->id)}}">
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
                    {{ $data->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascripts')
    <script src="{{ asset('backend/js/order.js') }}" type="text/javascript">

    </script>
@endpush

