<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand()
    {
        $brand = brand::all();
        return view('admin.brand.brand',compact('brand'));
    }
    public function show()
    {
        return view('admin.brand.add');
    }
    public function create(Request $request)
    {
        $brand = $request->all();
        brand::create($brand);
        return redirect('admin/brand');
    }
    public function edit($id)
    {
        $editBrand = brand::where('id',$id)->get();
        return view('admin.brand.edit',compact('editBrand'));
    }
    public function update(Request $request,$id)
    {
        $result = $request->all();
        brand::where('id',$id)->update(['name' => $result['name']]);
        return redirect('admin/brand');
    }
    public function destroy($id)
    {
        brand::where('id',$id)->delete();
        return redirect()->back();
    }
}
