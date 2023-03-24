<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index(Request $request, $id)
    {
        if (is_numeric($id)) {
            $type = $request->type;
            $infoCategory = Categories::findOrFail($id)->name;
            $infoProduct = Products::where('category_id', $id)->withPrice($type)->paginate(9);
            return view('frontend.product.index', compact(['infoProduct', 'infoCategory', 'id', 'type']));
        } else {
            $type = $request->type;
            $infoCategory = $this->checkType($id);
            $infoProduct = Products::withType($id)->withPrice($type)->paginate(9);
            return view('frontend.product.index', compact(['infoProduct', 'infoCategory', 'id', 'type']));
        }
    }

    public function detail($id)
    {
        $product = Products::findOrFail($id);
        $type = strtolower(Categories::find($product->category_id)->type);
        $infoCategory = $this->checkType($type);
        $relatedProduct = Products::withType($type)->where('id', '<>', $id)->take(4)->get();
        return view('frontend.product.detail', compact('product','relatedProduct', 'type', 'infoCategory'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data = Products::checkSearch($keyword)->paginate(12);
        return view('frontend.product.search', compact('data', 'keyword'));
    }

    public function checkType($type)
    {
        $info = '';
        switch ($type) {
            case 'top' :
                $info = 'Áo';
                break;
            case 'bottom' :
                $info = 'Quần';
                break;
            case 'accessory' :
                $info = 'Phụ Kiện';
                break;
        }
        return $info;
    }
}
