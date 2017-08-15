<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Index  extends Controller
{
    // public function index($name = "World")
    // {
    //     return 'Hello '. $name .'!';
    // }
 


	// public function hello(){
	// 	return 'hello,thinkphp!';
	// }

	// protected function hello2(){
	// 	return '这是protected方法';
	// }

	// private function hello3(){
	// 	return '  这是private方法 ';
	// }

	/**
	 *	 http://tp5.com/index/index/hello/name/任意字符
	 *	 http://tp5.com/index/index/hello?name=任意字符  (普通get方法)
	 *  	由于 name 参数为可选参数，因此也可以使用
	 *  	 http://tp5.com/index/index/hello
	 */
	public function index(){
		return  ' Welcome Back TP5' ;
			
	}



	public function hello ($name = ' .'){
		$this ->assign('name', $name);
		return $this->fetch();
	}

	/**
	 *  数据库数据读取
	 * 
	 * @return [array] [通过find返回的是单条数据的一维数组]
	 */
	public function readData(){
		$data = Db::name('data')->find();
		$this->assign('result', $data);
		return $this->fetch();
	}	

}
