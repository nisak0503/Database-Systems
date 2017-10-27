<!DOCTYPE html>
<html>
<?php 
include "AddMDRelation.php";
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlMDRelation.php">

  <div style="position:relative;left:0px;top:80px;">
  <?php
  if(($_POST[Movie]=='0') || ($_POST[Director]=='0')){
        echo 'please input data';
       exit();
    }
    else{
   $sql="INSERT INTO MovieDirector(mid, did) VALUES ('$_POST[Movie]', '$_POST[Director]')";
   if (!mysql_query($sql,$db_connection))
   {die('Error: ' . mysql_error());}
   echo "1 record added: '$_POST[Movie]', '$_POST[Director]";
}
  ?>
  </div>

</FORM>
</div>
</body>
</html>