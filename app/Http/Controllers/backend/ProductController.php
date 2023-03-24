<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePostProduct;
use App\Http\Requests\EditPostProduct;
use Illuminate\Support\Str;
use Config;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $infoProduct = Products::checkSearch($request->keyword)->paginate(5);
        return view('backend.product.index', compact('infoProduct'));
    }

    public function add()
    {
        $nameCategory = Categories::get();
        return view('backend.product.add', compact('nameCategory'));
    }

    public function store(StorePostProduct $request)
    {
        try {
            $dataCreate = $request->all();
            $dataCreate['slug'] = Str::slug($request->name);
            $nameImage = null;
            if ($request->file('image')->isValid()) {
                $nameImage = $request->file('image')->hashName();
                $request->file('image')->store('public/images');
            }
            if($nameImage === null){
                return redirect()->route('admin.add.product')->with('invalidLogo', 'Can not upload logo brand');
            }
            $dataCreate['image'] = $nameImage;
            Products::create($dataCreate);
            return redirect()->route('admin.product')->with('success', 'Thêm sản phẩm thành công!');
        } catch (\Exception $e){
            if (Storage::exists('public/images/'.$nameImage)){
                Storage::delete('public/images/'.$nameImage);
            }
            return redirect()->back()->with('message', 'co loi');
        }
    }

    public function edit($id)
    {
        $infoProduct = Products::findOrFail($id);
        $nameCategory = Categories::get();
        return view('backend.product.edit', compact(['infoProduct', 'nameCategory']));
    }

    public function update(EditPostProduct $request, $id)
    {
        $infoProduct = Products::findOrFail($id);
        $product = $request->all();
        $product['slug'] = Str::slug($request->name);

        $oldImage = $infoProduct->image;
        $nameImage = null;
        if ($request->hasFile('image')){
            if ($request->file('image')->isValid()) {
                $nameImage = $request->file('image')->hashName();
            }
        }
        if ($nameImage !== null){
            $validator = Validator::make(
                $request->all(),
                ['image' => 'mimes:jpg,png,jpeg'],
                ['image.mimes' => 'Logo phai la cac dinh dang jpg,png,jpeg']
            );
            if ($validator->fails()) {
                return redirect()
                    ->route('admin.edit.product', ['slug' => $infoProduct->slug, 'id' => $infoProduct->id])
                    ->withErrors($validator)
                    ->withInput();
            }
            $product['image'] = $nameImage;
        }

        $update = $infoProduct->update($product);
        if ($update) {
            if ($nameImage !== null) {
                $request->file('image')->store('public/images');
                if (Storage::exists('public/images/'.$oldImage)){
                    Storage::delete('public/images/'.$oldImage);
                }
            }
            return redirect()->route('admin.product')->with('success', 'Sửa sản phẩm thành công!');
        }
        return redirect()->back()->with('message', 'co loi');
    }

    public function delete(Request $request, $id)
    {
        $id = is_numeric($id) ? $id : 0;
        if($id > 0){
            $product = Products::findOrFail($id);
            $del = $product->delete();
            if ($del) {
                return redirect()->back()->with('success', 'Xoá sản phẩm thành công');
            }
            return redirect()->back()->with('message', 'Xoá sản phẩm thất bại');
        }
//        if ($request->ajax()){
//            $id = $request->id;
//            $infoProduct = Products::findOrFail($id);
//            $delProduct = $infoProduct->delete();
//            if ($delProduct){
//                return response()->json([
//                    'message' => 'Xoá sản phẩm thành công',
//                    'code' => 200
//                ]);
//            }
//            return response()->json([
//                'messages' => 'delete category fail',
//                'code' => 500,
//            ]);
//        }
    }
}
