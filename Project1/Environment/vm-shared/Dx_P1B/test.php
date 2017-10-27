<?php
// 连接数据库  
$conn=@mysql_connect("localhost", "cs143", "")  or die(mysql_error());  
@mysql_select_db('TEST',$conn) or die(mysql_error());  
 
$action = isset($_REQUEST['action'])? $_REQUEST['action'] : '';
 
if($action=='add'){
	echo "1111111111111111111111111111111111111111111111111";
    $xid = isset($_POST['xid'])? mysql_escape_string($_POST['xid']) : '';
    $name = isset($_POST['name'])? mysql_escape_string($_POST['name']) : '';
    $email = isset($_POST['email'])? mysql_escape_string($_POST['email']) : '';
    $address = isset($_POST['address'])? mysql_escape_string($_POST['address']) : '';
 
    if($xid=='' || $name=='' || $email=='' || $address==''){
        echo 'please input data';
        exit();
    }
 
    $sqlstr = "insert into Actor(xid,name,email,address) values('".$xid."','".$name."','".$email."','".$address."')";
    mysql_query($sqlstr) or die(mysql_error());
 
    header('location:postdemo.php');
 
}else{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>demo</title>
 </head>
 
 <body>
  <form name="form1" method="post" action="test.php">
  <p>学生id:<input type="text" name="xid"></p>
  <p>学生名字:<input type="text" name="name"></p>
  <p>学生邮箱:<input type="text" name="email"></p>
  <p>学生地址:<input type="text" name="address"></p>
  <p><input type="hidden" name="action" value="add"><input type="submit" name="b1" value="提交"></p>
  </form>
 
   
 </body>
</html>
<?php
}
?>