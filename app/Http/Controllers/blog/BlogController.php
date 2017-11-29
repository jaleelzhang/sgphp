<?php

namespace App\Http\Controllers\blog;

use App\Http\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Yaml\Tests\B;
use Validator;

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
            'blogContent-markdown-doc' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->abstract = $request->abstract;
        $blog->content = $request->input('blogContent-markdown-doc');
        $blog->create_time = time();
        $blog->status = $request->status;
        $blog->save();
        return redirect('jaleelman/posts');
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

        if (Cache::has('blog:profile:' . $id)) {
            $blog = Cache::get('blog:profile:' . $id);
        } else {
            $blog = Blog::find($id);
            $blog->content = html_entity_decode($blog->content);
            Cache::forever('blog:profile:' . $id, $blog);
        }

        return view('blog/details')->withdetails($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $page)
    {
        if (Cache::has('blog:profile:' . $id)) {
            $blog = Cache::get('blog:profile:' . $id);
        } else {
            $blog = Blog::find($id);
        }

        return view('admin.blogedit', array('blog' => $blog, 'page' => $page));
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
            'blogContent-markdown-doc' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->abstract = $request->abstract;
        $blog->content = $request->input('blogContent-markdown-doc');
        $blog->status = $request->status;
        $blog->save();

        if (Cache::has('blog:profile:' . $id)) {
            Cache::forget('blog:profile:' . $id);
        }

        $page = $request->page;
        return redirect('jaleelman/posts?page=' . $page);
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

        if (Cache::has('blog:profile:' . $id)) {
            Cache::forget('blog:profile:' . $id);
        }

        return redirect('jaleelman/posts');
    }

    public function comment(Request $request)
    {
        $rules = [
            'validator' => 'required',
            'username'=>'required',
            'comment'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $err = $validator->errors()->messages();

            $str = '';
            foreach($err as $k => $v) {

                if ($k == 'username') {
                    $str .= '<div class="alert alert-danger" role="alert" id="notice">请输入您的用户名!</div>';
                }

                if ($k == 'comment') {
                    $str .= '<div class="alert alert-danger" role="alert" id="notice">请输入您要输入的评论内容!</div>';
                }

                if ($k == 'validator') {
                    $str .= '<div class="alert alert-danger" role="alert" id="notice">请输入验证码!</div>';
                }
            }

            die($str);
        }

        $id = $request->id;
        $blog = Blog::find($id);
        $old_comment_arr = json_decode(html_entity_decode($blog->comments), true);

        if (!is_array($old_comment_arr)) {
            $old_comment_arr = [];
        }

        $new_comments_arr = array_merge($old_comment_arr, array(array($request->username,$request->comment)));
        $new_comment_json = json_encode($new_comments_arr);

//        DB::collection('s_article')->where('_id', $id)->update(array('comments' => $new));
        $blog->comments = $new_comment_json;
        $blog->save();

        if (Cache::has('blog:profile:' . $id)) {
            Cache::forget('blog:profile:' . $id);
        }

        $str = '';
        foreach ($new_comments_arr as $v) {
            $str .= "<p>[<b>$v[0]</b>]：$v[1]</p>";
        }

        echo $str;
    }
}
