<?php
/**
 * Created by PhpStorm.
 * User: Elmwoods
 * Date: 2017/8/12
 * Time: 15:49
 */
namespace app\index\controller;

use think\Controller;
use app\index\Model\Goods as GoodsModel;

class Goods extends Controller
{
    public function product_category()
    {
        return $this->fetch();
    }
    public function product_category_add(){
        $m=new GoodsModel;
        $data = $m->field("*,concat_ws(',',path,id) as paths")
            ->order('paths')
            ->select();
//var_dump($data);
        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|---",$v['level']).$v['name'];
        }

        $this->assign('data',$data);

        return $this->fetch();
    }

    /**
     *     添加分类信息到数据库
     */
     public function goods_type_add(){
        $data['name']=$_POST['name'];
        $data['pid']=$_POST['pid'];
        $m=new GoodsModel;
        if ($data['name'] !=" " && $data['pid'] !=0){

            $path=$m->field("path")->find($data['pid']);
            $data['path']=$path['path'];
            var_dump($data['path']); //0,4
            $data['level']=substr_count($data['path'],',');
            var_dump($data['level']);//1
            $re=$m->insert($data); //返回插入id
            var_dump($re);
            $path['id'] = $re;
            $path['path'] = $data['path'].','.$re;
            var_dump( $path['path'] );
            $path['level'] = substr_count($path['path'],',');
            var_dump($path['level']);
            $res=$m->save($path);
            var_dump($res);
            if ($res){
                echo "<script>alert('添加成功'); parent.location.href='product_category'</script>";
            }else{
                echo "<script>alert('添加失败'); parent.location.href='product_category'</script>";
            }

        }elseif ($data['name'] !=" " && $data['pid'] ==0){
            $data['path'] = $data['pid'];
            $data['level'] = 1;
            $re = $m->insert($data);//返回插入id

            $path['id'] = $re;
            $path['path'] = $data['path'].','.$re;

            $res=$m->save($path);
            if ($res){
                echo "<script>alert('添加成功'); parent.location.href='product_category'</script>";
            }else{
                echo "<script>alert('添加失败'); parent.location.href='product_category'</script>";
            }
        }else{

            echo "<script>alert('添加失败,内容不能为空！'); parent.location.href='product_category'</script>";
        }
    }
}