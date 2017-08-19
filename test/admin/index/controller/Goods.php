<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

use app\index\Model\Goods as GoodsModel;
use app\index\Model\Goodsadd as g;

class Goods  extends Controller
{

    public function product_category(){
        return  $this->fetch();
    }

    //获取分类数据
    public function product_category_ajax(){
        $m = new GoodsModel;
        $data=$m->field('id,pid,name')->select();
        echo  json_encode($data);

    }

    //删除分类信息
    public function product_category_del(){
        $id=$_GET['id'];
        $m = new GoodsModel;
        $data=$m->where("pid=".$id)->find();

        if($data){
            $str="分类下面还子分类,不允许删除";
            echo json_encode($str);
        }else{
            $re=$m->where('id',$id)->delete();
            if($re){
                echo 1;
            }
        }
    }

    /**
     * function  mysql CONCAT()函数用于将多个字符串连接成一个字符串
     *           CONCAT_WS() 代表 CONCAT With Separator ，是CONCAT()的特殊形式。第一个参数是其它参数的分隔符。分隔符的位置放在要连接的两个字符串之间。分隔符可以是一个字符串，也可以是其它参数。如果分隔符为 NULL，则结果为 NULL。函数会忽略任何分隔符参数后的 NULL 值。
     * function str_repeat() 函数把字符串重复指定的次数。
     * function substr_count 返回子串在字符串中出现的次数
     */
    //商品分类区分等级
    public function product_category_add(){
        $m = new GoodsModel;
        $data=$m->field("*,concat_ws(',',path,id) as paths")->order('paths')->select();

        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
        }

        $this->assign('data',$data);

        return  $this->fetch();
    }

    //添加分类信息到数据库
    public function goods_type_add(){
        $data['name']=$_POST['name'];//获取name值
        $data['pid']=$_POST['pid'];//获取pid值
//        var_dump($data['pid']);
        $m = new GoodsModel();
        if(!empty($data['name'])  && $data['pid'] !=0){

            $path=$m->field("path")->find($data['pid']);//通过pid查询路径
//            var_dump($path['path']);
            $data['path']=$path['path'];//获得路径
            $data['level']=substr_count($data['path'],",");//通过字符串中该子串出现的次数获取等级
            $re = $m->insertGetId($data);//插入信息并返回id
//            var_dump($re);

            $path['id']=$re;
//            var_dump($path['id']);
            $path['path']=$data['path'].','.$re;
//            var_dump($path['path']);
            $path['level']=substr_count($path['path'],",");
//            var_dump($path['level']);
            $res = $m->save([
                'path' => $path['path'],
                'level' => $path['level']
            ],['id' => $path['id']]);
            if( $res ){
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
            ],['id' => $path['id']]);  //修改信息
            if ($res){
                echo '<script>alert("添加成功");parent.location.href="product_category"</script>';
            }else{
                echo '<script>alert("添加失败");parent.location.href="product_category"</script>';
            }
        }else{
            echo '<script>alert("添加失败,内容不能为空");parent.location.href="product_category"</script>';
        }


    }

    //商品列表分类页
    public function product_list(){
        $g = new g;
        $data=$g->select();
        $this->assign('data',$data);
        return $this->fetch();
    }

    //添加商品页
    public function product_add(){
        $m = new GoodsModel;
        $data=$m->field("*,concat_ws(',',path,id) as paths")->order('paths')->select();

        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
        }

        $this->assign('data',$data);
        return $this->fetch();
    }

    //添加商品到数据库
    public function product_add_goods(){
//        var_dump($_POST);
        $data['goodsname']=$_POST['goodsname'];
        $tid=explode(",",$_POST['tid']);

//        var_dump($str);die;
        $data['tid']=$tid[0];
        $data['tpid']=$tid[1];
        $data['unit']=$_POST['unit'];
        $data['attributes']=$_POST['attributes'];
        $data['number']=$_POST['number'];
        $data['barcode']=$_POST['barcode'];
        $data['curprice']=$_POST['curprice'];
        $data['oriprice']=$_POST['oriprice'];
        $data['cosprice']=$_POST['cosprice'];
        $data['inventory']=$_POST['inventory'];
        $data['restrict']=$_POST['restrict'];
        $data['already']=$_POST['already'];
        $data['freight']=$_POST['freight'];
        $data['status']=$_POST['status'];
        $data['reorder']=$_POST['reorder'];
        $data['editorValue']=$_POST['editorValue'];
        $data['imagepath']="";

        $g=new g;
        $res=$g->insert($data);

        if ($res){
            return $this->success('添加成功','product_list','',1);
        }else{
            return $this->error('添加失败','product_list','',1);
        }
    }

    //修改商品
    public function product_edit_goods(){
        $g=new g();
        $id=input('id');
        $goods=$g->where('id',$id)->find();
//        var_dump($goods);die;
        $tid=input('tid');
//        var_dump($id);
//        var_dump($tid);

//        $goods=$g->find(input('get.id'));
        $this->assign('goods',$goods);
        $this->assign('tid',$tid);


        $m = new GoodsModel;
        $data=$m->field("*,concat_ws(',',path,id) as paths")->order('paths')->select();

        foreach($data as $k=>$v){
            $data[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
        }

        $this->assign('data',$data);

        return $this->fetch();
    }

    public function product_edit_goods_new(){
        $data['goodsname']=$_POST['goodsname'];
        $tid=explode(",",$_POST['tid']);
        var_dump($tid);
//        $data['tid']=$tid[0];
//        $data['tpid']=$tid[1];
//        $data['unit']=$_POST['unit'];
//        $data['attributes']=$_POST['attributes'];
//        $data['number']=$_POST['number'];
//        $data['barcode']=$_POST['barcode'];
//        $data['curprice']=$_POST['curprice'];
//        $data['oriprice']=$_POST['oriprice'];
//        $data['cosprice']=$_POST['cosprice'];
//        $data['inventory']=$_POST['inventory'];
//        $data['restrict']=$_POST['restrict'];
//        $data['already']=$_POST['already'];
//        $data['freight']=$_POST['freight'];
//        $data['status']=$_POST['status'];
//        $data['reorder']=$_POST['reorder'];
//        $data['editorValue']=$_POST['editorValue'];
//        $data['imagepath']="";
//        $data['id']=$_POST['id'];
//        var_dump($data);die;
//        $data=[
//            'tid'=>$tid[0],
//            'tpid'=>$tid[1],
//            'unit'=>$_POST['unit'],
//            'attributes'=>$_POST['attributes'],
//            'number'=>$_POST['number'],
//            'barcode'=>$_POST['barcode'],
//            'curprice'=>$_POST['curprice'],
//            'oriprice'=>$_POST['oriprice'],
//            'cosprice'=>$_POST['cosprice'],
//            'inventory'=>$_POST['inventory'],
//            'restrict'=>$_POST['restrict'],
//            'already'=>$_POST['already'],
//            'freight'=>$_POST['freight'],
//            'status'=>$_POST['status'],
//            'reorder'=>$_POST['reorder'],
//            'text'=>$_POST['editorValue'],
//            'imagepath'=>"",
//            'id'=>$_POST['id'],
//        ];


        $g=new g;
        $id=input('id');
        $res=$g->allowField(['goodsname','unit','attributes','number','barcode','curprice','oriprice','cosprice','inventory',
            'restrict','already','freight','status','reorder','editorValue'])->save($_POST, ['id' => $id]);
//        var_dump($res);die;
        if ($res){
            return $this->success('修改商品成功','product_list','',1);
        }else{
            return $this->error('修改商品失败','product_list','',1);
        }
    }
}
