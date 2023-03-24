@extends('backend.layout')

@section('title', 'Admin add product')

@section('content')
    <div class="row">
        <div class="mx-xl-auto col-xl-10 col-md-12">
            <div class="card card-default">
                <div class="card-header"><h2 class="card-title"><span>Sửa Sản Phẩm</span></h2></div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.update.product', $infoProduct->id) }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        @if (session('status'))
                            <div class="alert alert-danger">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_name">Tên sản phẩm</label>
                                <div class="col-md-4">
                                    <input name="name" placeholder="Tên sản phẩm" value="{{ $infoProduct->name }}" class="form-control input-md" type="text">
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
                                <label class="col-md-4 control-label" for="product_name">Giá sản phẩm (VND)</label>
                                <div class="col-md-4">
                                    <input name="price" value="{{ $infoProduct->price }}"  class="form-control input-md" data-type="currency" placeholder="100.000" type="text">
                                    @error('price')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="product_description">Mô tả sản phẩm</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" placeholder="Mô tả sản phẩm" name="description">{{ $infoProduct->description }}</textarea>
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
                                <label class="col-md-4 control-label" for="product_categorie">Danh mục sản phẩm</label>
                                <div class="col-md-4">
                                    <select name="category_id" class="form-control" >
                                        @foreach($nameCategory as $item)
                                            <option value="{{ $item->id }}" {{ $item->id === $infoProduct->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="available_quantity">Số lượng</label>
                                <div class="col-md-4">
                                    <input name="in_stock" min="0" value="{{ $infoProduct->in_stock }}" class="form-control input-md" required="" type="number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="row">
                                <label class="col-md-4 control-label" for="filebutton">Ảnh sản phẩm</label>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/images/'.$infoProduct->image) }}" height="150" alt="">
                                    <input name="image" class="input-file" value="{{ $infoProduct->image }}" type="file">
                                    @error('image')
                                    <small class="alert" style="color: red">
                                        {{$message}}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.product')}}">Back</a>
                            <button value="Submit" class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascripts')
    <script src="{{ asset('backend/js/product.js') }}" type="text/javascript">

    </script>
@endpush
