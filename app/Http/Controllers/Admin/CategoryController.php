<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function category()
    {
        $category = category::all();
        return view('admin.category.category',compact('category'));
    }
    public function show()
    {
        return view('admin.category.add');
    }
    public function add(Request $request)
    {
        $category = $request->all();
        category::create($category);
        return redirect()->to('admin/category');
    }
    public function edit($id)
    { 
        $editCategory = category::where('id',$id)
        ->get();
        return view('admin.category.edit',compact('editCategory'));
    }
    public function update(Request $request,$id)
    {
        $category = $request->all();
        category::where('id',$id)->update(['name'=>$category['name']]);
        return redirect('admin/category');
    }
    public function delete($id)
    {
        category::where('id',$id)->delete();
        return redirect()->back();
    }

}
