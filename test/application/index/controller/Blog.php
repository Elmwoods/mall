<?php
namespace app\index\Controller;
use think\Controller;
/**
* 
*/
class Blog
{	
	public function index()
	{
		echo 'blog主页';
	}
	public function get($id='')
	{
		return '查看id= ' . $id . '的内容';
	}

	public function read($name='')
	{
		return '查看name=' . $name . ' 的内容';
	}
	public function archive($year , $month)
	{
		return '查看' . $year . ' / ' .$month . '的归档内容';
	}
	public function star($s)
	{
		echo "star";
	}
}