<?php

namespace app\api\model;
use think\Db;
use think\Exception;

class Banner {
	public static function getBannerByID($id){
		$result = Db::query("select * from banner_item where banner_id=?",[$id]);
		return $result;
	}

}