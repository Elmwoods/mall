<?php
namespace app\index\Controller;

use app\index\controller\Base;
use think\Request;

/**
* 
*/
class Call extends Base
{
	/**
	 * 动态绑定属性
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function index(Request $request)
	{
		echo $request->user->id;
		echo $request->user->name;
	}
}

