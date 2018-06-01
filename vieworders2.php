<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/5/31
 * php分离，格式化显示订单信息
 */
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head><title>Jerry's Auto Parts - Customer Orders</title></head>
<body>
<h1>Jerry's Auto Parts</h1>
<h2>Order Results</h2>
<?php
//Read in the entire file
//Each order become an element in the array
$orders = file("$DOCUMENT_ROOT/Web_develop/order.txt");

//Count the number of orders in the array
$number_of_orders = count($orders);

if ($number_of_orders == 0){
    echo "<p><strong>No order pending, please try again later</strong></p>";
    exit();
}else{
    echo "<table border=1>\n";
    echo "<tr>
            <th bgcolor='#7fffd4'>Order Date</th>
            <th bgcolor='#7fffd4'>Tires</th>
            <th bgcolor='#7fffd4'>Oil</th>
            <th bgcolor='#7fffd4'>Spark Plugs</th>
            <th bgcolor='#7fffd4'>Total</th>
            <th bgcolor='#7fffd4'>Address</th>
        </tr>";
    for ($i = 0; $i < $number_of_orders; $i++){
        $line = explode("\t", $orders[$i]);

        //keep only the number of items ordered
        $line[1] = intval($line[1]);
        $line[2] = intval($line[2]);
        $line[3] = intval($line[3]);

        //outpur all order
        echo "<tr>
            <th align='center'>$line[0]</th>
            <th align='center'>$line[1]</th>
            <th align='center'>$line[2]</th>
            <th align='center'>$line[3]</th>
            <th align='center'>$line[4]</th>
            <th align='center'>$line[5]</th>
        </tr>";

    }

}
echo "</table>";
?>
</body>
</html>
