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
    protected $collection = 's_article';
}