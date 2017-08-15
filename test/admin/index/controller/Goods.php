<?php
namespace app\index\controller;

use think\Controller;

use app\index\Model\Goods as GoodsModel;

class Goods    extends Controller
{


    public function product_category(){
        return  $this->fetch();
    }


//    //获取分类数据
//    public function product_category_ajax(){
//        $m=M('goods_type');
//        $data=$m->field('id,pid,name')->select();
//        echo  json_encode($data);
//
//    }
//
//    //删除分类信息
//    public function product_category_del(){
//        $id=$_GET['id'];
//        $m=M('goods_type');
//        $data=$m->where("pid=".$id)->find();
//
//        if($data){
//            $str="分类下面还子分类,不允许删除";
//            echo json_encode($str);
//        }else{
//            $re=$m->delete($id);
//            if($re){
//                echo 1;
//            }
//        }
//    }


    public function product_category_add(){
        $m = new GoodsModel();
        $data=$m->field("*,concat_ws(',',path,id) as paths")->order('paths')->select();

        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
        }

        $this->assign('data',$data);

        return  $this->fetch();
    }

    //添加分类信息到数据库
    public function goods_type_add(){
        $data['name']=$_POST['name'];
        $data['pid']=$_POST['pid'];
//        var_dump($data['pid']);
        $m = new GoodsModel();
        if(!empty($data['name'])  && $data['pid'] !=0){

            $path=$m->field("path")->find($data['pid']);
//            var_dump($path['path']);
            $data['path']=$path['path'];//0,4
            $data['level']=substr_count($data['path'],",");
            $re=$m->insertGetId($data);//插入并返回id
//            var_dump($re);

            $path['id']=$re;
//            var_dump($path['id']);
            $path['path']=$data['path'].','.$re;
//            var_dump($path['path']);
            $path['level']=substr_count($path['path'],",");var_dump($path['level']);
            $res=$m->save([
                'path' => $path['path'],
                'level' => $path['level']
            ],['id' => $path['id']]);
            if($res){
                echo '<script>alert("添加成功");parent.location.href="product_category"</script>';
            }else{
                echo '<script>alert("添加失败");parent.location.href="product_category"</script>';
            }

        }elseif (!empty($data['name']) && $data['pid'] ==0){
            $data['path']=$data['pid'];
            $data['level']=1;
            $re=$m->insertGetId($data);

            $path['id']=$re;
            $path['path']=$data['path'].','.$re;

            $res=$m->save([
                'path' => $path['path'],
                'level' => $data['level']
            ],['id' => $path['id']]);
            if ($res){
                echo '<script>alert("添加成功");parent.location.href="product_category"</script>';
            }else{
                echo '<script>alert("添加失败");parent.location.href="product_category"</script>';
            }
        }else{
            echo '<script>alert("添加失败,内容不能为空");parent.location.href="product_category"</script>';
        }


    }




}
