<?php

namespace App\Http\Models;

use Moloquent;
use DB;

class Admin extends Moloquent
{

    // 指定表名
    protected $collection = 's_admin';

    // 取消设置自动维护时间戳，会帮我们把字段created_at和updated_at的时间取消；
    // 默认开启，设置成false则关闭
//    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
