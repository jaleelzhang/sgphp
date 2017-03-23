<?php

namespace App\Http\Controllers\blog;

use App\Http\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = '')
    {
        if (empty($type)) {
            $blogs = Blog::orderBy('create_time', 'desc')->paginate(10);
        } else {
            $blogs = Blog::where('type', $type)->orderBy('create_time', 'desc')->paginate(10);
        }

        return view('blog/bloglist')->withblogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'abstract' => 'required|max:300',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->abstract = $request->abstract;
        $blog->content = $request->content;
        $blog->create_time = time();
        $blog->save();
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $blog->content = html_entity_decode($blog->content);
        return view('blog/details')->withdetails($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogedit')->withblog($blog);
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
        $this->validate($request, [
            'title' => 'required',
            'abstract' => 'required|max:300',
            'content' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->abstract = $request->abstract;
        $blog->content = $request->content;
        $blog->create_time = time();
        $blog->save();
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::destroy($id);
        return redirect('posts');
    }
}