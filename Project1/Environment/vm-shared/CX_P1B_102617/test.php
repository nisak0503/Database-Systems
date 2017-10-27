<html>  
<head>   
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />   
<title>phpmethod</title>   
</head>   
<body>   
<form name="form1" method="post" action="testmultiform.php">   
<label>   
<input type="checkbox" name="checkbox[]" value="cb1">   
1 
</label>   
<label>   
<input type="checkbox" name="checkbox[]" value="cb2">   
</label>   
2
<label>   
<input type="checkbox" name="checkbox[]" value="cb3">   
</label>   
3   
<label>   
<input type="checkbox" name="checkbox[]" value="cb4">   
</label>   
4   
<label>   
<input type="submit" name="Submit" value="submit">   
</label>   
</form>   
</body>   
</html>   
  
<?php  
if( $_POST )   
{   
    $value = $_POST['checkbox'];   
    foreach($value as $onevalue){  
        echo $onevalue;  
    }  
    echo 'you choosed:'.implode(',',$value);   
    //由于checkbox属性，我们必须把checkbox复选择框的名字设置为一个如果checkbox[]，这样php才能读取，以数据形式,否则不能正确的读取checkbox复选框的值哦。  
}   
?>   