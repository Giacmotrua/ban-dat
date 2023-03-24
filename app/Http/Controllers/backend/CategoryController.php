<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostCategory;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.category.index', [
            'infoCategory' => Categories::checkSearch($request->keyword)->paginate(10)
        ]);
    }

    public function add()
    {
        return view('backend.category.add');
    }

    public  function store(StorePostCategory $request)
    {
        try {
            $dataCreate = $request->all();
            $dataCreate['slug'] = Str::slug($request->name);
            Categories::create($dataCreate);
            return redirect()->route('admin.category')->with('success', 'Thêm danh mục thành công!');
        } catch (\Exception $e){
            return redirect()->back()->with('message', 'co loi');
        }
    }

    public function edit($id)
    {
        $infoCategory = Categories::findOrFail($id);
        return view('backend.category.edit',[
            'info' => $infoCategory,
            'config' => [
                1 => 'Top',
                2 => 'Bottom',
                3 => 'Accessory'
            ]
        ]);
    }

    public function update(StorePostCategory $request, $id)
    {
        try {
            $category = $request->all();
            $category['slug'] =Str::slug($request->name);
            $infoCategory = Categories::findOrFail($id);
            if ($category['name'] === $infoCategory->name && $category['type'] === $infoCategory->type){
                return redirect()->route('admin.category')->with('success', 'Không có gì thay đổi');
            }
            $infoCategory->update($category);
            return redirect()->route('admin.category')->with('success', 'Sửa danh mục thành công');
        } catch (\Exception $e){
            return redirect()->route('admin.category')->with('message', 'Có lỗi xảy ra, vui lòng thử lại sau!!');
        }
    }

    public function delete(Request $request, $id)
    {
        $id = is_numeric($id) ? $id : 0;
        if($id > 0){
            $category = Categories::findOrFail($id);
            $del = $category->delete();
            if ($del) {
                return redirect()->back()->with('success', 'Xoá danh mục thành công');
            }
            return redirect()->back()->with('message', 'Xoá danh mục thất bại');
        }
//        if ($request->ajax()) {
//            $id = $request->id;
//            $id = is_numeric($id) ? $id : 0;
//            if ($id > 0) {
//                $category = Categories::find($id);
//                $del = $category->delete();
//                if ($del) {
//                    return response()->json([
//                        'messages' => 'delete category success',
//                        'code' => 200,
//                    ]);
//                    //$infoCategory = Categories::paginate(5);
//                    //return view('backend.category.data', compact('infoCategory'))->render();
//                }
//                return response()->json([
//                    'messages' => 'delete category fail',
//                    'code' => 500,
//                ]);
//            }
//        }
    }
}
