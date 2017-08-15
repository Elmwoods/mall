<?php
namespace app\index\Controller;
use think\Controller;

class ResponseObject
{
	/**
	 * 自动输出
	 * @return [type] [description]
	 */
	public function autoOutput()
	{

		$data = [ 'name' => 'thinkphp' , 'status' => '1'];
		//return json($data,201,['Cache-control' => 'no-cache,must-revalidate']);
		return json($data) -> code(201) -> header(['Cache-control ' => 'no-cache,must-revalidate']);
		
	}


	//use \traits\controller\Jump;
	/**
	 * 页面跳转
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	public function jump($name=' ')
	{
		if ('thinkphp' == $name) {
			$this->success('欢迎使用thinkphp 5.0' , 'hello');
		}else{
			 $this->error('错误的name' , 'guest' );
		}
	}

	public function hello()
	{
		return 'Hello,ThinkPHP! ';
	}
	public function guest()
	{
		return ' Hello,Guest! ';
	}


	use \traits\controller\Jump;
	/**
	 * 页面重定向
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	public function redirects($name ='')
	{
		if ('think' == $name) {
			$this->redirect('http://thinkphp.cn');
			//return redirect('http://thinkphp.cn');
		}else{
			//return '请继续前往输入正确的name';
			$this->error('你输入的name不是think ', 'errors');
		}		

	}

	public function errors()
	{
		return '请继续前往输入正确的name';
	}

}