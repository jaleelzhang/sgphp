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
            $blogs = Blog::where('status', '1')->orderBy('create_time', 'desc')->paginate(5);
        } else {
            $blogs = Blog::where('status', '1')->where('type', $type)->orderBy('create_time', 'desc')->paginate(5);
        }

//        var_dump($blogs);exit;

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
        $blog->content = htmlentities($request->content);
        $blog->create_time = time();
        $blog->status = $request->status;
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
        $id = strpos($id, '.') !== FALSE ? substr($id, 0, strpos($id, '.')) : $id;
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
        $blog->content = htmlentities($request->content);
        $blog->status = $request->status;
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
