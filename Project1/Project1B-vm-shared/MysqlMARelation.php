<!DOCTYPE html>
<html>
<?php 
include "AddMARelation.php";
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlMARelation.php">

  <div style="position:relative;left:0px;top:110px;">
  <?php
  if(($_POST[Role]=="   Text Input") || ($_POST[Movie]=='0') || ($_POST[Actor]=='0')){
        echo 'please input data';
       exit();
    }
    else{
   $sql="INSERT INTO MovieActor(mid, aid, role) VALUES ('$_POST[Movie]', '$_POST[Actor]', '$_POST[Role]')";
   if (!mysql_query($sql,$db_connection))
   {die('Error: ' . mysql_error());}
   echo "1 record added: '$_POST[Movie]', '$_POST[Actor]', '$_POST[Role]'";
}
  ?>
  </div>

</FORM>
</div>
</body>
</html>