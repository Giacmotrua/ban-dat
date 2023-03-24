@extends('backend.layout')

@section('title', 'Admin add property')

@push('stylesheets')
    <style>
        .list-images {
            width: 50%;
            margin-top: 20px;
            display: inline-block;
        }
        .hidden { display: none; }
        .box-image {
            width: 100px;
            height: 108px;
            position: relative;
            float: left;
            margin-left: 5px;
        }
        .box-image img {
            width: 100px;
            height: 100px;
        }
        .wrap-btn-delete {
            position: absolute;
            top: -8px;
            right: 0;
            height: 2px;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }
        .btn-delete-image {
            cursor: pointer;
        }
        .table {
            width: 15%;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-10 col-md-12">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Thêm đất</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.store.property')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_name">Tiêu đề</label>
                                <div class="col-md-4">
                                    <input name="title" placeholder="Tiêu đề..." class="form-control input-md" type="text">
                                    @error('title')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_name">Diện tích (m2)</label>
                                <div class="col-md-4">
                                    <input name="area"  class="form-control input-md" placeholder="100..." type="text">
                                    @error('area')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_name">Số mặt tiền</label>
                                <div class="col-md-4">
                                    <input name="house_facade"  class="form-control input-md" placeholder="2..." type="text">
                                    @error('house_facade')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_name">Chiều dài mặt tiền (m)</label>
                                <div class="col-md-4">
                                    <input name="facade_area"  class="form-control input-md" placeholder="3.5..." type="text">
                                    @error('facade_area')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_description">Mô tả</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Mô tả..." name="description"></textarea>
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
                                <label class="col-md-4 control-label" for="product_description">Địa chỉ</label>
                                <div class="col-md-4">
                                    <div class="row province_field mb-2">
                                        <label class="col-md-4 control-label" for="province">Tỉnh</label>
                                        <select class="form-control col-md-7" name="province" id="province">
                                            <option disabled selected="selected">Chọn</option>
                                        </select>
                                    </div>

                                    <div class="row district_field mb-2">
                                        <label class="col-md-4 control-label" for="district">Quận/Huyện</label>
                                        <select class="form-control col-md-7" name="district" id="district">
                                            <option value="" selected="selected" disabled>Chọn</option>

                                        </select>
                                    </div>

                                    <div class="row ward_field mb-2">
                                        <label class="col-md-4 control-label" for="ward">Phường/Xã</label>
                                        <select class="form-control col-md-7" name="ward" id="ward">
                                            <option value="" selected="selected" disabled>Chọn</option>
                                        </select>
                                    </div>
                                    <input name="address"  class="form-control input-md" placeholder="Địa chỉ cụ thể" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="filebutton">Ảnh sản phẩm</label>
                                <div class="col-md-4">
                                    <div class="input-group hdtuto control-group lst increment" >
                                        <div class="list-input-hidden-upload">
                                            <input type="file" name="image[]" id="file_upload" class="myfrm form-control hidden">
                                            @error('image')
                                            <small class="alert" style="color: red">
                                                {{$message}}
                                            </small>
                                            @enderror
                                        </div>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary btn-add-image" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>+Thêm ảnh</button>
                                        </div>
                                    </div>
                                    <div class="list-images" style="display:flex;">
                                        @if (isset($list_images) && !empty($list_images))
                                            @foreach (json_decode($list_images) as $key => $img)
                                                <div class="box-image">
                                                    <input type="hidden" name="image[]" value="{{ $img }}" id="img-{{ $key }}">
                                                    <img src="{{ asset('files/'.$img) }}" class="picture-box">
                                                    <div class="wrap-btn-delete"><span data-id="img-{{ $key }}" class="btn-delete-image">x</span></div>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                                            <input type="hidden" name="id" value="{{ $id }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.property')}}">Back</a>
                            <button value="Submit" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascripts')
    <script src="{{ asset('backend/js/property.js') }}" type="text/javascript">

    </script>
@endpush
