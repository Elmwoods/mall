<?php
namespace  app\index\Controller;

use think\Db;

class Search{
    public function index(){
        $data = Db::name('jingo')->select();
        $this->assign('')

    }
    public function readData(){
        $data = Db::name('data')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }
}