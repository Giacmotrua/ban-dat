<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Properties::get();
        return view('backend.property.index', compact('properties'));
    }

    public function add()
    {
        return view('backend.property.add');
    }

    public function store(Request $request)
    {
        try {
            $dataCreate = $request->all();
            $dataCreate['property_id'] = Str::random('8');

            $image = [];
            if($request->hasfile('image'))
            {
                foreach($request->file('image') as $file)
                {
                    $dir = $dataCreate['property_id'];
                    $name = $file->store($dir);
                    $image[] = $name;
                }
            }
            $dataCreate['image'] = json_encode($image);

            Properties::create($dataCreate);

            return redirect()->route('admin.property')->with('success', 'Thêm đất thành công!');
        } catch (\Exception $e){
            foreach($image as $file)
            {
                if (Storage::exists('public/'.$dataCreate['property_id'].'/'.$file)){
                    Storage::delete('public/'.$dataCreate['property_id'].'/'.$file);
                }
            }

            return redirect()->back()->with('message', 'co loi');
        }
    }
}
