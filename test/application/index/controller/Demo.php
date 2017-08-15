<?php 
	namespace app\index\Controller;
	use think\Controller;
	class Demo
	{
		public function demo(){
			echo "这是一个demo";
		}
		public function demo1($age = 18){
			return "小芳今年芳龄".$age.' 岁 ';

		}

	}