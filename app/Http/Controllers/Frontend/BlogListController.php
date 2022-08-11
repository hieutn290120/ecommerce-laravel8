<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blog;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use App\Models\rate;

class BlogListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showBlog = blog::latest()->paginate(3);
        return view('frontend.blog.blog', compact('showBlog'));
    }
    public function blogDetails($id)
    {
        $blogSingle = blog::where('id', $id)->get();
        $user = blog::find($id);
        $previous = blog::where('id', '<', $user->id)->max('id');
        $next = blog::where('id', '>', $user->id)->min('id');
        $avgRating = rate::where('id_blog', $id)->avg('rating');
        $roundRating = round($avgRating);
        $comment = comment::where('id_blog',$id)->get();
        return view('frontend.blog.blogsingle', compact('blogSingle', 'user', 'previous', 'next', 'roundRating','comment'));
    }
    public function rating(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = $request->all();
            $data = [
                'id_user' =>  $userId,
                'rating' =>   $data['values'],
                'id_blog' =>  $data['id_blog']
            ];
            rate::create($data);
            echo 'Done';
        }
    }
    public function comment(Request $request)
    {
        $userId = Auth::id();
        $avt = Auth::user()->avatar;
        $name = Auth::user()->name;
        $result = $request->all();
        // dd($result);
        $result = [
            'id_user' => $userId,
            'id_blog' => $result['id_blog'],
            'cmt' => $result['message'],
            'level' => $result['level'],
            'avatar' => $avt,
            'name' => $name
        ];
        comment::create($result);
        return redirect()->back();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
