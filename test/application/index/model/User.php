<?php
namespace app\index\model;

use think\Model;

class User extends Model{
    //设置完整的数据表（包含前缀）
    protected $table = 'think_user';
    //设置不带前缀的数据表名
    protected $name = 'data';
    //设置单独的数据库连接
    /*protected $connection = [
        // 数据库类型
        'type'            => 'mysql',
        // 服务器地址
        'hostname'        => '127.0.0.1',
        // 数据库名
        'database'        => 'test',
        // 用户名
        'username'        => 'root',
        // 密码
        'password'        => '123123',
        // 端口
        'hostport'        => '3306',
        // 连接dsn
        'dsn'             => '',
        // 数据库连接参数
        'params'          => [
            //使用长连接
            \PDO::ATTR_PERSISTENT => true,
        ],
        // 数据库编码默认采用utf8
        'charset'         => 'utf8',
        // 数据库表前缀
        'prefix'          => 'test_',
        // 数据库调试模式
        'debug'           => true,
    ];*/




















}