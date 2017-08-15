<?php
namespace app\index\Controller;

use think\Db;
class QueryLanguage
{
	public function index()
	{
		/**
		 * 查询表达式
		 */
		//$result = \think\Db::name('data') 	//<-----没有引用Db类的情况下使用
		/*$result = Db::name('data')
			->where('id',5)		//where 条件(字段名，条件表达式，查询值)
			->find();       //select *  from `think_data` where `id`=1;
        dump($result);*/

        /*$result1 = Db::name('data')
            ->where('id','EGT',1)		//where 条件(字段名，条件表达式，查询值)
            ->limit(2,5)
        ->select();*/
        //dump($result1);

        /*$result = Db::name('data')
            ->where('id','exp','>=3')
            ->limit(2,3)
            ->select();
        dump($result);*/

        /*$result2 = Db::name('data')
            ->where('id','between',[2,5])
            ->select();
        dump($result2);*/

        /*$result = Db::name('data')
            ->where('id','in',[5,2,3])      //插入可以不按照顺序但是输出会依次输出
            ->select();
        dump($result);*/

        /*$result = Db::name('data')
            ->where('id','between',[1,3])
            ->where('name','like','%think%')
            ->select();
        dump($result);*/

        //批量查询
        /*$result = Db::name('data')
            ->where([
                'id'    =>  ['between','1,3'],
                'name'  =>  ['like','%think%'],
            ])->select();
        dump($result);*/

        /*$result = Db::name('data')
            ->where([
                'id'    =>  [['in',[1,2,3]],['between','5,8'],'or'],
                'name'  =>  ['like','%think%'],
            ])->limit(10)->select();
        dump($result);*/

        //快捷查询
        /*
         * $result = Db::name('data')
            ->where('id&status','>',0)
            ->limit(10)
            ->select();
        dump($result);*/

        /*$result = Db::name('data')
            ->where('id|status','>',0)
            ->limit(5)
            ->select();
        dump($result);*/

        //视图查询 （查询多表）
        /*$result = Db::view('data','id,name,status')
            ->view('user',['name' ,
                'phone','email'],'user
                .id=data.id')
            ->where('id','between',[0,20])
            ->order('id desc')
            ->select();
        dump($result);*/

        //闭包查询
        /*$result = Db::name('data')->select(function ($query){
           $query->where('name','like','%think%')
               ->where('id','in',[1,2,3])
               ->limit(10);
        });
        dump($result);*/

        //使用query对象
        /*$query = new \think\db\Query;
        $query->name('user')->where('name','like','%think%')
            ->where('id','in','1,2,3')
            ->limit(10);
        $result = Db::select($query);
        dump($result);*/

        /**
         * 获取数值
        */

        //获取某行表的某个值，可以使用value方法：
        /*$name = Db::name('data')
            ->where('id',8)
            ->value('name');
        dump($name);*/

        //获取列数据
        /*$list = Db::name('data')
            ->where('status',1)
            //->column('name');
            ->column('name','id');
        dump($list);*/

        //获取data表的name列，并且以id为索引
        /*$list = Db::name('data')
            ->where('status',1)
            ->column('*','id');
        dump($list);*/

        /**
         * 聚合查询
         */
        /*$count = Db::name('data')
            ->where('status',1)
            ->count();
        dump($count);*/

        //统计表中的最高分
        /*$max = Db::name('data')
            ->where('status',1)
            ->max('score');
        dump($max);*/

        /*
         * 字符串查询
         */
        /*$result = Db::name('data')
            ->where('id> :id AND name IS NOT NULL',['id' => 10])
            ->select();
        dump($result);*/

        /**
         * 时间（日期）查询
         */
        //查询创建时间大于2017-7-19的数据
        /*$result = Db::name('data')
            ->whereTime('create_time','>','2017-7-19')
            ->select();
        dump($result);*/
        //查询本周添加的数据
        /*$result = Db::name('data')
            ->wheretime('create_time','>','this week')
            ->order('id desc')
            ->select();
        dump($result);*/
        //查询最近两天添加的数据
        /*$result = Db::name('data')
            ->whereTime('create_time','>','-2 days')
            ->order('id desc')
            ->select();
        dump($result);*/
        //查询创建时间在2017-7-19~2017-7-31的数据
        /*$result = Db::name('data')
            ->where('create_time','between',['2017-07-19','2017-07-31'])
            ->select();
        dump($result);*/
        //获取今天的数据
        /*$result =Db::name('data')
            ->whereTime('create_time','today')
            ->select();
        dump($result);*/
        //获取昨天的数据
        /*$result = Db::name('data')
            ->whereTime('create_time','yesterday')
            ->select();
        dump($result);*/
        //获取本周的数据
        /*$result = Db::name('data')
            ->whereTime('create_time','week')
            ->select();
        dump($result);*/
        //获取上周的数据
        /*$result = Db::name('data')
            ->whereTime('create_time','last week')
            ->select();
        dump($result);*/

        /**
         * 分块查询
         */
        /*Db::name('data')
            ->where('status','>',0)
            ->chunk(100,function($list){
                //处理100条记录
                foreach ($list as $data){
                     dump($data);
                }
            });*/
        /*Db::name('data')
            ->where(['status'   => ['>',0],
                'name'  =>  ['like','%think%']
            ])
            ->chunk(100,function($list){
                foreach ($list as $data){
                    dump($data);
                }
            },'id');*/
        /*Db::name('data')
            ->whereTime('status','>',0)
            ->chunk(10,function($list){
                //返回false则中断后续查询
                return false;
        });*/









































	}
}