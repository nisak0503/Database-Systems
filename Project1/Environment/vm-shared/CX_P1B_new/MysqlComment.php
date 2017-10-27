<!DOCTYPE html>
<html>
<?php 
include "AddComment.php";
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlComment.php">

  <div style="position:relative;left:0px;top:110px;">
  <?php
  if(($_POST[Reviewer]=="   Text Input") || ($_POST[Movie]=='0')){
        echo 'please input data';
       exit();
    }
    else{ $Time= date("Y-m-d H:i:s",time());
   $sql="INSERT INTO Review(name, time, mid, rating, comment) VALUES ('$_POST[Reviewer]', '$Time', '$_POST[Movie]', '$_POST[Rating]','$_POST[Comment]')";
   if (!mysql_query($sql,$db_connection))
   {die('Error: ' . mysql_error());}
   echo "1 record added: '$_POST[Reviewer]', '$_POST[Movie]','$Time', '$_POST[Rating]','$_POST[Comment]'";
}

  ?>
  </div>

</FORM>
</div>
</body>
</html>