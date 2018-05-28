<?php
/**
 * Author: jerry
 * Last modified: 2018/5/28
 * 用户提交的订单写入文件中
 */

$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address = $_POST['address'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:s jS F Y');
?>
<html>
<head>
    <title>Jerry's Auto Parts - Order Results</title>
</head>
<body>
<h1>Jerry's Auto Parts</h1>
<h2>Order Results</h2>
<?php
echo "<p> Order processed at $date </p>";
echo "<p>your order is follows</p>";
$totalqty = 0;
$totalqty = $tireqty+$oilqty+$sparkqty;
echo "Items order: ".$totalqty."<br/>";

if ($totalqty ==0){
    echo "you did not order anything on the previous page! <br/>";
}else{
    if ($tireqty > 0){
        echo $tireqty. " tires <br/>";
    }
    if ($oilqty > 0){
        echo $oilqty. " bottles of oil <br/>";
    }
    if ($sparkqty > 0){
        echo $sparkqty. " spark plugs <br/>";
    }
}
$totalamount = 0.00;
define('TIREPRICE', 100);
define('OILPRICE', 100);
define('SPARKPRICE', 4);
$totalamount = $tireqty*TIREPRICE + $oilqty*OILPRICE + $sparkqty*SPARKPRICE;
$totalamount = number_format($totalamount, 2, '.', '');
echo "<p> total of order is $ " .$totalamount. "</p>";
echo "<p> address to ship to is" .$address. "<p/>";

$outputsring = $date. "\t" .$tireqty. " tires \t" .$oilqty. " oil \t" .$sparkqty. " spark plugs \t" .$totalamount. "\t" .$address. "\n";

//open file for appending
@ $fp = fopen("$DOCUMENT_ROOT/Web_develop/order.txt", 'ab');
flock($fp, LOCK_EX);
if (!$fp){
    echo "<p><strong>your order could not be processed at this time. please try again later</strong></p></body>
</html>";
    exit();
}
fwrite($fp, $outputsring, strlen($outputsring));
flock($fp, LOCK_UN);
fclose($fp);
echo "<p>order written.</p>";
?>

