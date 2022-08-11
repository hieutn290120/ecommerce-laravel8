<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\BlogRequest;

use App\Models\blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::paginate(3);
        return view('admin.blog.blog',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function add()
    {
        
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(BlogRequest $request)
    {
        $data = $request->all();
        $file = $request->file('image');
        $data['image'] = $file->getClientOriginalName();
        if(blog::create($data)){
            $file->move('upload/image_blog',$file->getClientOriginalName());
        }
        return redirect()->to('/admin/blog'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editBlog = blog::where('id',$id)->get();
        return view('admin.blog.edit',compact('editBlog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $file = $request->file('image');
        $data['image'] = $file->getClientOriginalName();
        if(blog::where('id',$id)->update([
            'title' => $data['title'],
            'image' => $data['image'],
            'description' => $data['description'],
        ])){
            $file->move('upload/image_blog',$file->getClientOriginalName());
        }
        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        blog::where('id',$id)->delete();
        return redirect()->back();
    }
}
