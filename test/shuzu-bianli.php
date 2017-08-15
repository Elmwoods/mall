<?php

$arr =[
	[35,22,55],
	[12,45,123,1234]
] ;
foreach ($arr as $key => $value) {
	while (list($key,$value) = each($arr)) {
		while(list($name,$info) = each(value))
		{
			echo "$name $info";
		}
	}
}
//  foreach ($arr as $key => $value) {
	
// }