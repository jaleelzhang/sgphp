<?php
/**
 * Created by PhpStorm.
 * User: jaleel
 * Date: 2017/3/22
 * Time: 上午11:52
 */

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Blog;

class HomeController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $userinfo = Admin::where('admin_name', '=', $request->username)->get();

        if ($userinfo) {
            foreach ($userinfo as $v) {
                if (decrypt($v->admin_pass) == $request->password) {
                    $data = Admin::find($v->_id);
                    $data->login_time = time();
                    $data->save();
                    Session::put('admin', $data);
                    return view('admin.home')->withadmin($data);
                } else {
                    return back()->with('msg', 'Invalid password!!!');
                }

            }
        } else {
            return back()->with('msg', 'Invalid user name!!!');
        }
    }

    public function logout() {
        Session::forget('admin');
        return redirect('jaleelman');
    }

    public function postList()
    {
        $blogs = Blog::orderBy('create_time', 'desc')->paginate(10);
        return view('admin.blog')->withblogs($blogs);
    }
}