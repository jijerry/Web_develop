<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/5/28
 * 读入文件查看用户订单
 */
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
    <title>Jerry's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Jerry's Auto Parts</h1>
<h2>Order Results</h2>
<?php
@ $fp = fopen("$DOCUMENT_ROOT/Web_develop/order.txt", 'rb');

if (!$fp){
    echo "<p><strong>No order pending, please try again later</strong></p>";
    exit();
}
while (!feof($fp)){     //文件指针指向文件末尾，将返回true
    $order = fgets($fp, 999);
    echo $order. "<br/>";
}
?>
</body>
</html>
