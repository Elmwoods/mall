<?php
namespace app\admin\Controller;
use think\Controller;
use think\Db;
use app\admin\model\Index as IndexModel;
class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
    public function product_category(){
        return $this->fetch();
    }

    /**
     * function  mysql CONCAT（）函数用于将多个字符串连接成一个字符串
     *           CONCAT_WS() 代表 CONCAT With Separator ，是CONCAT()的特殊形式。第一个参数是其它参数的分隔符。分隔符的位置放在要连接的两个字符串之间。分隔符可以是一个字符串，也可以是其它参数。如果分隔符为 NULL，则结果为 NULL。函数会忽略任何分隔符参数后的 NULL 值。
     * function str_repeat() 函数把字符串重复指定的次数。
     */
    public function product_category_add(){
        $data = db("goods_type")
            ->field("*,concat_ws(',',path,id) as paths")
            ->order('paths')
            ->select();
//        var_dump($data);

        foreach($data as $k=>$v){
            $data[$k]['name'] = str_repeat("---",$v['level']).$v['name'];
        }

        $this->assign('data',$data);
        return $this->fetch();
    }

    /**
     * 添加分类信息到数据库
     */
    public function goods_type_add(){
//        var_dump($_POST);
        $data['name'] = $_POST['name'];
        $data['pid'] = $_POST['pid'];
        //        $m = db('goods_type');
//        $m = model('Index');
        //$m = new IndexModel();
        //insertGetId
        if ($data['name'] != " "){
            $parentid = Db::name('goods_type')->field('pid')->where('id',$data['pid'])->find();
            $idd=Db::name('goods_type')->insertGetId($data);//插入并返回id
            $path=$parentid['pid'].','.$data['pid'].','.$idd;
            $level=count(explode(',',$path));  //  , ,31
//            $level = substr_count($path,',');
            $res=Db::name('goods_type')->where('id',$idd)->update(['path'=>$path,'level'=>$level]);
            //$path=$parentid.','.$data['pid'].''
            //$data['path'] = $path['path'];
            //var_dump($path);
//            $data['level'] = substr_count($data['path'],',');
            //$re = $m->insert($data);//返回插入id
//            var_dump($re);
//            $path['id'] = $re;
//            $path['path'] = $data['path'].','.$re;
//            $path['level'] = substr_count($path['path'],',');
            //$path['level'] = 1;
//            $res = $m->save($path);
            if ($res){
                echo "<script>alert('添加成功'); parent.location.href ='product_category'</script>";
            }else{
                echo "<script>alert('添加失败'); parent.location.href ='product_category'</script>";
            }
        }
//        elseif ($data['name']!=" " && $data['pid'] ==0 ){
//            $path = $m->field('path')->find($data['pid']);
//            $data['path'] = $data['pid'];
//            $data['level'] = 1;
//            $re = $m->insert($data);//返回插入id
//
//            $path['id'] = $re;
//            $path['path'] = $data['path'].','.$re;
//            $res = $m->save();
//            if ($res){
//                echo "<script>alert('添加成功'); parent.location.href ='product_category'</script>";
//            }else{
//                echo "<script>alert('添加失败'); parent.location.href ='product_category'</script>";
//            }
//
//        }else{
//            echo "<script>alert('添加失败,内容不能为空'); parent.location.href ='product_category'</script>";
//        }
    }
//    public function product_add(){
//        return $this->fetch();
//    }
//    public function product_brand(){
//        return $this->fetch();
//    }
//    public function product_list(){
//        return $this->fetch();
//    }
//    public function admin_add(){
//        return $this->fetch();
//    }
//    public function admin_list(){
//        return $this->fetch();
//    }
//    public function admin_permission(){
//        return $this->fetch();
//    }
//    public function admin_role(){
//        return $this->fetch();
//    }
//    public function admin_role_add(){
//        return $this->fetch();
//    }
//    public function article_add(){
//        return $this->fetch();
//    }
//    public function article_list(){
//        return $this->fetch();
//    }
//    public function change_password(){
//        return $this->fetch();
//    }
//    public function charts_1(){
//        return $this->fetch();
//    }
//
//    public function charts_2(){
//        return $this->fetch();
//    }
//    public function charts_3(){
//        return $this->fetch();
//    }
//    public function charts_4(){
//        return $this->fetch();
//    }
//    public function charts_5(){
//        return $this->fetch();
//    }
//    public function charts_6(){
//        return $this->fetch();
//    }
//    public function charts_7(){
//        return $this->fetch();
//    }
//    public function codeing(){
//        return $this->fetch();
//    }
//    public function feedback_list(){
//        return $this->fetch();
//    }
//    public function login(){
//        return $this->fetch();
//    }
}
