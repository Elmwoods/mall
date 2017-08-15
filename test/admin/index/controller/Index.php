<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/14
 * Time: 15:24
 */
namespace app\index\Controller;

use think\Controller;

use app\index\model\Index as IndexModel;

//use think\Db;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
//    public function product_category(){
//        return $this->fetch();
//    }
//
//    /**
//     * function  mysql CONCAT（）函数用于将多个字符串连接成一个字符串
//     *           CONCAT_WS() 代表 CONCAT With Separator ，是CONCAT()的特殊形式。第一个参数是其它参数的分隔符。分隔符的位置放在要连接的两个字符串之间。分隔符可以是一个字符串，也可以是其它参数。如果分隔符为 NULL，则结果为 NULL。函数会忽略任何分隔符参数后的 NULL 值。
//     * function str_repeat() 函数把字符串重复指定的次数。
//     */
//    public function product_category_add(){
//        $db = new IndexModel;
//        $data = $db->field("*,concat_ws(',',path,id) as paths")
//            ->order('paths')
//            ->select();
////        var_dump($data);
//
////        $data = db("goods_type")
////            ->field("*,concat_ws(',',path,id) as paths")
////            ->order('paths')
////            ->select();
////        var_dump($data);
//
//        foreach($data as $k=>$v){
//            $data[$k]['name'] = str_repeat("---",$v['level']).$v['name'];
//        }
//
//        $this->assign('data',$data);
//        return $this->fetch();
//    }
//
//    /**
//     * 添加分类信息到数据库
//     */
//    public function goods_type_add(){
////        var_dump($_POST);
//        $data['name'] = $_POST['name'];
//        $data['pid'] = $_POST['pid'];
////        var_dump($data);die();
////        $db = db('goods_type');
//
//        if ($data['name'] != " "){
////            $path = $db->field('path')->where('pid',$data['pid'])->find();
//            $db = new IndexModel;
//            $path = $db->field('path')->find($data['pid']);  //返回为null、
////            var_dump($path); die;
//            $data['path'] = $path['path'];  //将返回的路径传入data数据
////            var_dump($data); die;
//            $data['level'] = substr_count($data['path'],','); //子串在字符串中出现的次数
//            $re = $db->insert($data);  //插入-> 父类路径 父类路径  0
//            var_dump($re);    //$re 返回的pid
//
//            $path['id'] = $re;
////            var_dump($path); die;  //返回的数据库连接信息
//            $path['path'] = $data['path'].','.$re;
//            $path['level'] = substr_count($data['path'],',');
//            $res = $db->save($path);
////            var_dump($res); die;
////            $level=count(explode(',',$path));
//            if ($res){
//                echo "<script>alert('添加成功'); parent.location.href ='product_category'</script>";
//            }else{
//                echo "<script>alert('添加失败'); parent.location.href ='product_category'</script>";
//            }
////        }
////        elseif ($data['name']!=" " && $data['pid'] ==0 ){
////            $path = $m->field('path')->find($data['pid']);
////            $data['path'] = $data['pid'];
////            $data['level'] = 1;
////            $re = $m->insert($data);//返回插入id
////
////            $path['id'] = $re;
////            $path['path'] = $data['path'].','.$re;
////            $res = $m->save();
////            if ($res){
////                echo "<script>alert('添加成功'); parent.location.href ='product_category'</script>";
////            }else{
////                echo "<script>alert('添加失败'); parent.location.href ='product_category'</script>";
////            }
////
//        }else{
//            echo "<script>alert('添加失败,内容不能为空'); parent.location.href ='product_category'</script>";
//        }
//    }

}
