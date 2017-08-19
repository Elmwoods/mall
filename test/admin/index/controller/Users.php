<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/18
 * Time: 15:11
 */
namespace app\index\controller;

use think\Controller;
use \org\auth;

class Users extends Controller{

    //规则列表
    public function admin_role(){
        $m = \think\Db::table('auth_group');
        $data=$m->where('status',1)->select();
        $this->assign('data',$data);

        return $this->fetch();
    }

    //权限列表页面
    public function admin_permission(){
        $m = \think\Db::table('auth_rule');
        $data=$m->where('status',1)->select();
        $this->assign('data',$data);

        return $this->fetch();

    }

    //添加权限页面
    public function admin_permission_add(){
        return $this->fetch();
    }

    //添加权限到数据库
    public function admin_permission_add_data(){
        $data['name']=$_POST['name'];
        $data['title']=$_POST['title'];
        $data['type']=1;
        $data['status']=1;
        $m=\think\Db::table('auth_rule');
        $res=$m->insertGetId($data);
        if ($res)
            return $this->success('成功','admin/permission',1);
        else
            return $this->error('失败');

        return $this->fetch();
    }

    //管理员列表界面
    public function admin_list(){
        $m=\think\Db::table('admin_user');
        $data=$m->select();

        $this->assign('data',$data);

        return $this->fetch();

    }
    //添加管理员界面
    public function admin_add(){
        $m=\think\Db::table('auth_group');
        $data=$m->where('status',1)->select();

        $this->assign('data',$data);

        return $this->fetch();
    }

    //添加管理员到数据库
    public function admin_add_user(){
        if ($_POST){
            $data['admin_name']=$_POST['admin_name'];
            $data['admin_password']=$_POST['admin_password'];

            $m=\think\Db::table('admin_user');//用户数据库
            $name=$m->where("admin_name='".$data['admin_name']."'")->find();

            if (!$name){
                $g=\think\Db::table('auth_group_access');//分组数据库

                $res1=$m->insertGetId($data);//用户数据库
                $group['group_id']=$_POST['group_id'];
                $group['uid']=$res1;
                $res2=$g->insertGetId($group);//分组数据库

                if($res1 && $res2){
                    return $this->success('成功','admin_list',2);
                }else{
                    return $this->error('失败');
                }
            }else{
                return $this->error('当前用户名已存在');
            }

        }
    }

    //添加角色页面
    public function admin_role_add(){
        $m=\think\Db::table('auth_rule');
        $data=$m->where('status',1)->select();
        $this->assign('data',$data);

        return $this->fetch();

    }

    //添加角色到数据库
    public function admin_role_add_user(){
        $datap['title']=$_POST['roleName'];
        $data['rules']=implode(',',$_POST['check']);
        $data['status']=1;
        $m=\think\Db::table('auth_group');
        $res=$m->insertGetId($data);

        if ($res){
            return $this->success('成功','admin_role',1);
        }else{
            return $this->error('失败');
        }
    }
}