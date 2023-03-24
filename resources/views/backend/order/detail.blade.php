@extends('backend.layout')

@section('title', 'Admid Order Detail')

@section('content')
    <div class="mx-3 my-3">
        <div class=" row">
            <div class="col-lg-6">
                <h1 class="page-header" style="border: none; margin-top: 0">
                    Chi Tiết Đơn Hàng
                </h1>
            </div>
            <div class="col-lg-6">
                <div class="text-right">
                    <a href="{{ route('admin.order') }}" class="btn btn-success">
                        <i class="fa fas fa-fw fa-step-backward"></i>
                        Quay lại đơn hàng
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb" style="background: transparent">
                    <li class="active">
                        <i class="fa fa-table"></i> Đơn hàng {{$data->code_order}}
                    </li>
                </ol>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 col-sm-11">
                <div class="tracking text-center">
                    <div class="title">Tracking Order</div>
                </div>
                <div class="progress-track">
                    <ul id="progressbar">
                        <li class="step0 {{$data->status == 0 || $data->status == 1 || $data->status == 2 || $data->status == 3 ? 'active' : ''}} " id="step1">Ordered</li>
                        <li class="step0 {{$data->status == 1 || $data->status == 2 || $data->status == 3 ? 'active' : ''}} text-center" id="step2">Shipped</li>
                        <li class="step0 {{$data->status == 2 || $data->status == 3  ? 'active' : ''}} text-right" id="step3">On the way</li>
                        <li class="step0 {{$data->status == 3 ? 'active' : ''}} text-right" id="step4">Delivered</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Sản phẩm</h4>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach($product as $id => $item)
                                    @php
                                        $total += $item->price * $item->quantity;
                                    @endphp
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td><img src="{{asset('storage/images/'.$item->image)}}" width="100px" alt="">
                                        </td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{number_format($item->price)}}đ</td>
                                        <td>{{number_format($item->price * $item->quantity)}}đ</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">Tổng tiền</td>
                                    <td>{{number_format($total)}}đ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Thông tin người mua</h4>
                        <h5>{{$data->name}}</h5>
                        <h6>{{$data->address}}</h6>
                        <h6>{{$data->phone}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


