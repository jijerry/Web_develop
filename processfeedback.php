<?php
/**
 * Created by PhpStorm.
 * Author: jerry
 * Last modified: 2018/6/1
 * 邮件表单
 */
$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

//set up the static information
$toaddress = "jipengbo@xunlei.com";
$subject = 'Feedback from the web site';
$mailcontent =  "Customer name: " .$name. "Customer email: " .$email. "Customer comments: " .$feedback;

$fromaddress = "From: webserver@example.com";

//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $fromaddress);
?>
<html>
<head>
    <title>Jerry's Auto Parts - Feedback Submitted</title>
</head>
<body>
<h1>Feedback submitted</h1>
<p>Your feedback has been sent</p>
</body>
</html>
