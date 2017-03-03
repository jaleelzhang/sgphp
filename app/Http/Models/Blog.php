<?php
/**
 * Created by PhpStorm.
 * User: jaleel
 * Date: 2017/3/2
 * Time: 下午5:58
 */

namespace App\Http\Models;

use Moloquent;
use DB;

class Blog extends Moloquent
{
    public static function getPageList($page) {
        $start = ($page-1) * 10;
        return DB::collection('s_article')->skip($start)->take(10)->orderBy('create_time', 'desc')->get();
    }

    public static function getPageNum($type = '') {

        if (empty($type)) {
            $total_data =  DB::collection('s_article')->count();
        } else {
            $total_data =  DB::collection('s_article')->where('type', '=', $type)->count();
        }

        return ceil($total_data/10);
    }

    public static function getById($id) {
        return DB::collection('s_article')->find($id);
    }

    public static function getListByType($type, $page) {
        $start = ($page-1) * 10;
        return DB::collection('s_article')->where('type', '=', $type)->skip($start)->take(10)->orderBy('create_time', 'desc')->get();
    }
}