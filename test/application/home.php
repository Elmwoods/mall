<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;


/**
 * 动态路由注册
 * Route::rule(
 * ‘路由规则‘,'路由地址','请求类型','路由参数（数组）','变量规则（数组）');
 *
 */

//静态路由规则
// Route::rule('hello' , 'index/hello' );

// 动态路由规则
/*
Route::rule('hello/:name','Index/hello');
Route::get('hello/:name','index/hello');
Route::rule('hello/:name','index/hello','GET');
*/

/*Route::get('demo1/:age','demo/demo1', [
    'ext'               =>         '',
    'method'        =>         'get',
    ],
    ['age' => '[0-9]+']);


Route::any('hello/:name' , 'index/hello' , [
    'ext'               =>         'html',
    'method'        =>         '*',
    ],
    [   'name'      =>      '[A-Za-z0-9]+'  ]);

Route::rule('hello/:name' , function ($name){
    return '这是动态路由注册定义的闭包
                <p>小问题: 后面加....不会报错或者说不会有任何反应</p>' . $name . '!!!';
});

Route::rules();
Route::rules('GET');
*/

/**
 * 静态路由注册
 */
return [
    //全局变量规则
    '__pattern__' => [
        'name' => '\w+',
        'id'    =>  '\d+',
        'year'  =>  '\d{4}',
        'month' =>  '\d{2}',
    ],

    /*
        '[hello]'     => [
            ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
            ':name' => ['index/hello', ['method' => 'post']],
        ],
    */
    //添加路由规则 路由到 index控制器的hello操作方法
    // 'hello/[:name]' => 'index/hello',


    'hello/[:name]' => ['index/hello',
        ['ext'               =>      'html',                //路由的后缀参数
            'method'        =>      'get'  ],               //
        ['name'         =>     '[A-Za-z0-9]+' ]
    ],

    //定义闭包
    // 'hello/[:name]' =>function ($name){
    //      return '这是静态路由注册定义的闭包
    //                  <p>（可以直接加html 而且后缀无论在多少个‘ . ’ 都不会显示在页面当中）</p>' . $name . '!';
    //  }

    /*
            'blog/:year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'm
    onth' => '\d{2}']],
            'blog/:id' => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
            'blog/:name' => ['blog/read', ['method' => 'get'], ['name' => '\w+']],

            '[blog]' => [
            ':year/:month' => ['blog/archive', ['method' => 'get'], ['year' => '\d{4}', 'mo
            nth' => '\d{2}']],
            ':id' => ['blog/get', ['method' => 'get'], ['id' => '\d+']],
            ':name' => ['blog/read', ['method' => 'get'], ['name' => '\w+']],
            ],
    */

    //路由规则定义
    'blog/:id'              =>     'blog/get',
    'blog/:name'        =>      'blog/read',
    //  定义局部变量规则
    //'blog/:name'        =>      ['blog/read','method'=>'get',['name'=>'\w{5, }']],
    'blog-<year>-<month>'       =>      'blog/archive',

    //'RequestObject'     =>      'RequestObject/hello',


    'rdinfo/:name'  =>  ['RequestObject/getRouteDispatchInfo'  ,  []],


    'user/index'        =>  'index/user/index',
    'user/create'       =>  'index/user/create',
    'user/add'          =>  'index/user/add',
    'user/add_list'     =>  'index/user/addList',
    'user/update/:id'   =>  'index/user/update',
    'user/delete/:id'   =>  'index/user/delete',
    'user/:id'          =>  'index/user/read',
];

