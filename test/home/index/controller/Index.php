<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/15
 * Time: 10:12
 */
namespace app\index\controller;

use think\Controller;

class Index  extends Controller
{
    public function index(){
        return $this->fetch();

    }

    public function lists(){

        return $this->fetch();
    }

    public function details(){
        return $this->fetch();

    }

}