<?php
namespace app\index\Controller;
use think\Db;

class Databases 
{
	public function index($value='')
	{
		Db::listen(function($sql, $time, $explain){
   			// 记录SQL
    			echo $sql. ' ['.$time.'s]';
    			// 查看性能分析结果
    			dump($explain);
		});

		// CREATE TABLE IF NOT EXISTS `think_data`(
		// 	`id` int(8) unsigned NOT NULL AUTO_INCREMENT,
		// 	`name` varchar(255) NOT NULL COMMENT '名称',
		// 	`status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '状态',
		// 	PRIMARY KEY (`id`)
		// ) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;
		
		/**
		 * 原生查询
		 */

		//创建
		//插入记录
//		 $result = Db::execute('insert into test_data (id,name,status) values(1,"thinkphp",1)');
//		 dump($result);

		//更新
		//更新记录
		//$result = Db::execute('update think_data set name = "framework" where id = 5');
		//dump($result);
		
		//读取
		//查询数据
		//$result = Db::query('select * from think_data where id = 1');
		//dump($result);

		//删除
		//删除数据
		//$result = Db::execute('delete from think_data where  id = 5');
		//dump($result);
		
		//显示数据库列表
		// $result = Db::query('show tables from demo');
		// dump($result);

		//清空数据表
		//$result = Db::execute('TRUNCATE table think_data');
		//dump($result);

		/**
		 * 切换数据库
		 */

		/*
		$result = Db::connect([
		// 数据库类型
		'type' 		=> 	'mysql',
		// 服务器地址
		'hostname' 	=>  	'127.0.0.1',
		// 数据库名
		'database' 	=> 	'thinkphp',
		// 数据库用户名
		'username' 	=> 	'root',
		// 数据库密码
		'password' 	=> 	'123456',
		// 数据库连接端口
		'hostport' 	=> 	'',
		// 数据库连接参数
		'params' 	=> 	[],
		// 数据库编码默认采用utf8
		'charset' 	=> 	'utf8',
		// 数据库表前缀
		'prefix' 		=> 	'think_',
		])->query('select * from think_data');
		dump($result);
		*/

		//字符串方式定义
		//$result = Db::connect('mysql:://root:123123@127.0.0.1:3306/thinkphp#utf8') -> query('select * from think_data where id = 1');
		//dump($result);

		//$result = Db::connect('db1')->query('select * from think_data where id = 1');
		//dump($result);
		//$result = Db::connect('db2')->query('select * from test_data where id = 1');
		//dump($result);
		
		/*
		$db1 = Db::connect('db1');
		$db2 = Db::connect('db2');
		$dbquery1 = $db1->query("select * from think_data where id = 1");
		$dbquery2 = $db2->query('select * from test_data where id = 2');
		dump($dbquery1);		
		dump($dbquery2);
		*/
	
		/**
		 * 参数绑定
		 */

		//Db::execute('insert into think_data (id,name,status)values(?,?,?)',[8,'thinkphp',1]);
		//$result = Db::query('select * from think_data where id=?',[8]);
		//dump($result);

		//命名占位符绑定
		//Db::execute('insert into think_data (id,name,status)values (:id,:name,:status)',['id'=>5,'name'=>'thinkphp','status'=>1]);
		//$result = Db::query('select * from think_data where id = :id',['id'=>5]);
		//dump($result);
		
		/**
		 * 查询构造器
		 */

		//插入记录
		//Db::table('test_data')
		//	->insert(['id'=>13, 'name'=>'thinkphp','status'=>1]);
		//更新记录
		// Db::table('test_data')
		// 	->where('id',13)
		// 	->update(['name'=>'framework']);
		//查询数据
		// $result = Db::table('test_data')
		// 	->where('id',13)
		// 	->select();
		// dump($result);
		//删除数据
		// Db::table('test_data')
		// 	->where('id',10)
		// 	->delete();

		//插入记录
		// Db::name('data')
		// 	->insert(['id'=>14,'name'=>'thinkphp','status'=>1]);
		//更新记录
		// Db::name('data')
		// 	->where('id',14)
		// 	->update(['name'=>'framework']);
		//查询数据
		// $result = Db::name('data')
		// 	->where('id',14)
		// 	->select();
		// dump($result);
		//删除数据
		// Db::name('data')
		// 	->where('id',14)
		// 	->delete();
		
		//-----------------推荐使用------------------
		//插入记录
		//$db = db('data');
		//$db->insert(['id'=>20,'name'=>'thinkphp','status'=>1]);
		//更新记录
		//$db->update(['id'=>20,'name'=>'framework']);
		//查询数据	
		//$list = $db->where('id',20)->select();
		//dump($list);
		//删除数据
		//$db->where('id',20)->delete();


		/**
		 * 链式操作
		 */

		//查询十个满足条件的数据，并按照id倒序排列
		// $list = Db::name('data')
		// 	->where('status',1)
		// 	->field('id,name')
		// 	->order('id','desc')
		// 	->limit(3)
		// 	->page(1)
		// 	->select();
		// dump($list);
		
		// $list = Db::name('data')
		// 	->where('id',1)
		// 	->field('id,name,status')
		// 	->find();
		// dump($list);

		/**
		 * 事物支持
		 */
		
		//自动控制事务处理
		// Db::transaction(function (){
		// 	Db::name('user')
		// 	             ->delete(1);
		// 	Db::name('data')
		// 		->insert(['id' => 24,'name'=>'thinkphp','status'=>1]);	             
		// });

		//手动控制事务处理
		//启动事务
		Db::startTrans();
		try{
			Db::name('user')
				->delete(2);
			Db::name('data')
				->insert(['id'=>25,'name'=>'thinkphp','status'=>1]);	
			//提交事务	
			Db::commit();
		}catch(\Exception $e){
			//回滚事务
			Db::rollback();
		}
	}
}