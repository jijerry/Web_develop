<!--/**-->
<!-- * 数据库获取并格式化搜索结果，以便显示结果-->
<!-- * Created by PhpStorm.-->
<!-- * User: jerry-->
<!-- * Date: 2018/6/28-->
<!-- * Time: 18:12-->
<!-- */-->

<html>
<head>
  <title>Books Search Results</title>
</head>
<body>
<h1>Books Search Results</h1>
<?php
  // 过滤用户输入
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);  //删除空格

  if (!$searchtype || !$searchterm) {
      echo 'You have not entered search details.  Please go back and try again.';
      exit;  //退出程序
  }

  //将用户数据提交数据库必须转义,检查magic_quotes_gpc配置是否启用（1），没有启用需要加\
  //是否自动完成了引号，如果没有，使用addslashes过滤数据
  if (!get_magic_quotes_gpc()){
      $searchtype = addslashes($searchtype);  //魔术引号特性
      $searchterm = addslashes($searchterm);
  }


  //连接数据库
/*
 * 面向对象连接，使用对象的方法来访问数据库
 * mysqli对象的构造函数创建
 */
  @ $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books'); //mysqli函数库，实例化mysqli类同时创建了到localhost连接，抑制错误,返回一个对象

    $db ->select_db(books);     //选择使用的数据库


/*
 * 面向过程
 */
//@ $db = mysqli_connect('localhost', 'bookorama', 'bookorama123', 'books');  //返回一个资源（资源句柄），表示到数据库的连接，必须将它传递给所有其他函数（mysqli_开始的）
mysqli_select_db($db,books);    //选择使用数据库

//连接结果检查，正常返回0，否则返回错误码
if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
  }

/*
*查询数据库
*/

  $query = "select * from books where ".$searchtype." like '%".$searchterm."%'";
  $result = $db->query($query);     //返回结果对象
//  $result = mysqli_query($db, $query);      //返回结果资源

  $num_results = $result->num_rows; //行数保存在结果对象的num_rows成员变量中
//  $num_results = mysqli_num_rows($result);  //查询返回的行数

  echo "<p>Number of books found: ".$num_results."</p>";

  for ($i=0; $i <$num_results; $i++) {
      $row = $result->fetch_assoc();
      echo "<p><strong>".($i+1).". Title: ";
      echo htmlspecialchars(stripslashes($row['title']));  //对特殊意义字符进行编码    htmlspecialchars：把预定义的字符 "<" （小于）和 ">" （大于）转换为 HTML 实体：
      echo "</strong><br />Author: ";
      echo stripslashes($row['author']);        //魔术引号打开的话，数据库返回数据包含\，需要过滤
      echo "<br />ISBN: ";
      echo stripslashes($row['isbn']);
      echo "<br />Price: ";
      echo stripslashes($row['price']);
      echo "</p>";
  }

  /*
   * fetch_assoc() 接受结果集合中每一行并以一个相关数组返回该行，每个关键字为一个属性名，每个值是相应的值
   * fetch_rows() 结果返回一个列举数组中
   * fetch_object() 将一行取回到第一个对象中，访问对象的属性
   *
   */

  $result->free();  //释放结果集
  $db->close();     //关闭数据库连接

?>
</body>
</html>
