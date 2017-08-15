<?php
namespace app\index\controller;

use app\index\model\User;
use think\Controller;
use think\Request;
use think\Session;


class Base extends Controller
{

	/**
	 * 动态绑定属性
	 * @return [type] [description]
	 */
	public function __initialize()
	{
		$user = User::get(Session::get('user_id'));
		Request::instance()->bind('user' , $user);
	}
}