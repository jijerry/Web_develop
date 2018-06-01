<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/5/31
 * 使用积累
 */

$prices = array('Tires' => 100, 'Oil' => 10, 'Spark Plugs' => 4);
$prices = array_reverse($prices);
print_r($prices);

////foreach结构
//foreach ($prices as $key => $value){
//    echo $key. '=' .$value. "<br/>";
//}
//
////each结构
//while ($element = each($prices)){
//    echo $element['key'];
//    echo '-';
//    echo $element['value'];
//    echo "<br/>";
//
//}
////list结构
//reset($prices);     //each函数时，两次使用数组，必须使用将当前元素重新设置到数组开始处，才允许再次遍历数组
//while (list($product, $price) = each($prices)){
//    echo "$product - $price <br/>";
//}


