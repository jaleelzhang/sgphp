<?php
/**
 * Created by PhpStorm.
 * User: jaleel
 * Date: 2017/3/2
 * Time: 下午6:04
 */

namespace App\Http\Controllers;


use App\Http\Models\Blog;

class BlogController extends Controller
{
    public function blogList($page) {
        $data =  Blog::getPageList($page);
        $total_page = Blog::getPageNum();
        return view('blog/bloglist', ['blogs' => $data, 'page' => $page, 'total_page' => $total_page]);
    }

    public function blogDetails($id) {
        $data = Blog::getById($id);
        $data['content'] = html_entity_decode($data['content']);
        return view('blog/details', ['details' => $data]);
    }

    public function blogListByType($type, $page) {
        $data = Blog::getListByType($type, $page);
        $total_page = Blog::getPageNum($type);
        return view('blog/bloglist', ['blogs' => $data, 'page' => $page, 'total_page' => $total_page]);
    }
}