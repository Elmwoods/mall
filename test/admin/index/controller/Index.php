<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/14
 * Time: 15:24
 */
namespace app\index\Controller;

use think\Controller;

use app\index\model\Index as IndexModel;

//use think\Db;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome(){

        return $this->fetch();
    }


}
