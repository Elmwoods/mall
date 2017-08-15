<?php
namespace app\app_extends\controller\weixin;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
         return $this->fetch();
    }
}
