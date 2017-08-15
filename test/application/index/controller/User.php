<?php
namespace app\index\Controller;

use app\index\model\User as UserModel;

class User
{
    /**
     * 新增数据
     */

    //新增用户数据
    public function add(){
        /*$user = new UserModel;      //若不想使用别名定义可以修改Controller后缀
        $user->nickname = '榆木';
        $user->email = '18679261997@qq.com';
        $user->birthday = strtotime('2017-07-21');
        if ($user->save()){
            return '用户[ '. $user->nickname . ': ' .$user->id . ' ]新增成功';
        }else{
            return  $user->getError();
        }*/

        /*$user['nickname'] = 'Elmwoods';
        $user['email'] = '281587864@qq.com';
        $user['birthday'] = strtotime('1996-07-19');
        if ($result = UserModel::create($user)){
            return '用户[ ' . $result->nickname . ': ' . $result->id . ' ]新增成功';
        }else{
            return ‘新增出错’;
        }*/
    }

    //批量新增
/*    public function addList(){
        $user = new UserModel;
        $list = [
            ['nickname' => '张三','email' => 'zhangsan@qq.com','birthday' => strtotime('1993-12-01')],
            ['nickname' =>  '李四','email' => 'lisi@qq.com','birthday' => strtotime('1992-04-15')],
        ];
        if ($user->saveAll($list)){
            return '用户批量新增成功';
        }else{
            return $user->getError();
        }
    }*/

    /**
     * 查询数据
     */

    //读取用户数据
    public function read($id=''){
        //$user = UserModel::get($id);
        $user = UserModel::where('nickname','榆木')->find();
        echo $user->nickname . '<br />';
        echo $user->email . '<br />';
        echo date('Y/m/d',$user->birthday) . '<br />';
    }

    /**
     * 数据列表
     */

    //获取用户数据列表(使用模型的all方法)
    public function index(){
        /*$list = UserModel::all();
        foreach ($list as $user){
            echo $user->nickname . '<br />';
            echo $user->email . '<br />';
            echo date('Y/m/d',$user->birthday) . ' <br />';
            echo '----------------------------<br/>';
        }

        //如果不使用主键查询，可以直接传入数组条件查询
        $list = UserModel::all(['status' => 1]);
        foreach ($list as $user){
            echo $user->nickname . '<br />';
            echo $user->email . '<br />';
            echo date('Y/m/d' , $user->birthday) . '<br />';
            echo '------------------------------<br/>';
        }

        //使用查询构建器完成更多的条件查询
        $list = UserModel::where('id','>',2)->select();
        foreach ($list as $user){
            echo $user->nickname . '<br />';
            echo $user->email . '<br />';
            echo date('Y/m/d',$user->birthday).'<br />';
            echo '------------------------------------------<br />';
        }*/
    }

    /**
     * 更新数据
     */

    //更新用户数据
    public function update($id){
        $user = UserModel::get($id);
        $user->nickname = '阿星';
        $user->email = 'axing123@163.com';
        if (false !== $user->save()){
            return '更新用户成功';
        }else{
            return $user->getError();
        }
        $user = new UserModel;
        $user->save(['name'=>'thinkphp',function($query){
            $query->where('status',1)->where('id',1);
        }
        ]);

    }

}