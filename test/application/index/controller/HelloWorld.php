<?php 
namespace app\index\Controller;
use think\Controller;

/**
 *	如果使用的是驼峰法 eg:HelloWorld.php
 *	输入http://tp5.com/index.php/index/helloworld/index会找不到控制器所在
 *	正确的url访问地址->  http://tp5.com/index.php/index/hello_world/index
 * 
 */
class HelloWorld
{
	public function index($name = 'World')
	{
		return 'Hello' .$name. '~';
	}
	/**
	 * 
	 * @param  string $name [thinkphp]
	 * @param  string $city [shanghai]
	 * @return [type]       [Hello thinkphp! You come from shanghai]
	 * http://tp5.com/index.php?s=index/hello_world/index1/name/thinkphp/city/shanghai
	 * 不受参数的传入顺序的影响 会自动获取URL地址中的同名参数作为方法的参数值
	 * http://tp5.com/index.php?s=index/hello_world/index1/city/shanghai/name/thinkphp
	 * 
	 */
	public function index1($name = 'World', $city = ' ')
	{
		return 'Hello '. $name.'! You come from '.$city;
	}

}