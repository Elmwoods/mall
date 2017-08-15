<?php
namespace app\index\Controller;

use think\Request;
use think\Controller;

Class RequestObject extends Controller
{
	/**
	 * 传统方式调用
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	public function hello($name=' VV ')
	{
		$request =	Request::instance();
		//获取当前URL地址 不含域名
		echo 'url:  ' . $request->url() .'<br />';
		return 	'Hello ,' .$name .'!';
	}
	/**
	 * 自动注入请求对象(常用)
	 * @param  Request $request [description]
	 * @param  string  $name    [description]
	 * @return [type]           [description]
	 */
	public function hello1(Request $request ,$name=' VV社交 ')
	{
		echo 'url:   	' . $request->url()  . ' <br/>';
	}

	 /**
	 * 继承think\Controller
 	 * 如果控制器类继承了 think\Controller 的话，可以做如下简化调用：
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	public function hello2($name = 'World')
	{
		// 获取当前URL地址 不含域名
		echo 'url: ' . $this->request->url() . '<br/>';
		return 'Hello,' . $name . ' ！';
	}

	/**
	 * 使用助手函数
	 * @param  string $name [description]
	 * @return [type]       [description]
	 */
	public function hello3($name=' shijie ')
	{
		echo 'url:	' .request()->url() .'<br>';
		return ' hello , ' . $name .' ! ';
	}

	/**
	 * 请求参数默认值和过滤（param方法）
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function requestVariable(Request $request)
	{
		echo '请求参数: ' . '<br>';
		//dump($request->param());
		//echo ' name: '. $request->param('name'). '<br>';

		echo 'test: '. $request->param('test','hao','strtolower') . '<br>';
		echo 'name: '.$request->param('name','think','strtoupper');
	}

	/**
	 * input助手函数简化request对象的param方法
	 * @return [type] [description]
	 */
	public function requestVariable1()
	{
		echo  '请求参数';
		dump(input());
		echo 'name: '. input('name');
	}
	
	/**
	 * 获取请求变量
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function requestVariable2(Request $request)
	{
		echo 'GET 参数 : ';
		dump($request -> get());
		echo 'GET 参数 : name';
		dump($request -> get('name'));
		echo "POST 参数 : name";
		dump($request -> post('name'));
		echo 'COOKIE 参数: name';
		dump($request -> cookie('name'));
		echo "上传文件信息: image";
		dump($request -> file('image'));
	}
	/**
	 * input 助手函数获取请求变量
	 * @return [type] [description]
	 */
	public function requestVariable3()
	{
		echo "GET参数 : ";
		dump(input('get.'));
		echo 'GET 参数 : name';
		dump(input('get.name'));
		echo "POST 参数 : name";
		dump(input('post.name'));
		echo 'COOKIE 参数: name';
		dump(input('cookie.name'));
		echo "上传文件信息: image";
		dump(input('file.image'));		
	}

	/**
	 * 获取请求参数
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function getRequestParams(Request $request)
	{
		echo ' 请求方法 : ' . $request -> method() . '<br>';
		echo ' 资源类型 : ' . $request -> type() . '<br>';
		echo ' 访问IP : ' . $request -> ip() . '<br>';
		echo ' 是否Ajax请求 : ' . var_export($request -> isAjax() , true ) . '<br>';
		echo ' 请求参数 : ' ;
		dump($request -> param());
		echo ' 请求参数 : 仅包含name ' ;
		dump($request -> only(['name']));
		echo ' 请求参数 : 排除name ' ;
		dump($request -> except(['name']));
	}

	/**
	 * 获取URL信息
	 * @param  Request $request [description]
	 * @param  string  $name    [description]
	 * @return [type]           [description]
	 */
	public function getUrl(Request $request , $name = 'World')
	{
		//获取当前域名
		echo " domain : " . $request -> domain() . ' <br> ';
		//获取入口文件
		echo ' file :  ' ,$request -> baseFile() .'<br>' ;
		//获取当前URL 不含域名
		echo ' url :   ' . $request -> url() . '<br>';
		//获取包含域名的完整URL地址
		echo ' url with domain : ' . $request -> url(true) . '<br>';
		//获取当前URL地址 不含QUERY_STRING
		echo 'url without query : ' . $request -> baseUrl() . '<br>'; 
		//获取URL访问的root地址
		echo ' root: ' . $request -> root() . '<br>';
		//获取URL访问的root地址
		echo ' root with domain : ' . $request -> root(true) . '<br>';
		//获取URL地址中的path_info信息
		echo ' pathinfo : ' . $request -> pathinfo() . '<br>';
		//获取URL地址中path_info信息 不含后缀
		echo " pathinfo : " . $request -> path() . '<br>'; 
		//获取URL地址中的后缀信息
		echo " ext : " . $request -> ext() . '<br>';

		return 'Hello ' . $name . ' ! ';
	}

	/**
	 * 获取当前模块、控制器、操作信息
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function getMCA(Request $request)
	{
		echo " 模块: " . $request -> module();
		echo "<hr/> 控制器 : " . $request -> controller();
		echo " <hr/> 操作方法 : " . $request -> action();
	}

	/**
	 * 获取路由和调度信息
	 * @param  Request $request [description]
	 * @param  string  $name    [description]
	 * @return [type]           [description]
	 */
	public function getRouteDispatchInfo(Request $request , $name = 'World')
	{
		echo " 路由信息 : ";
		dump($request -> routeinfo());
		echo " 调度信息 : ";
		dump($request -> dispatch());
		return ' Hello ' . $name . ' ! ' ;
	}


}	

