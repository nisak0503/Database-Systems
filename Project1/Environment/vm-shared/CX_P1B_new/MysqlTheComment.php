<!DOCTYPE html>
<html>
<?php 
include "AddTheComment.php";

?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "AddTheComment.php">

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

  <div style="position:relative;left:0px;top:150px;">
    <?php
    echo "Thanks for your comment! ";
    ?>
    <a href="./Movie_Info.php?identifier=$_POST[mid]" style="color:#404040; text-decoration:none;font-size:15px">!Please click this to go back to see the movie</a>
    
    <input type = "hidden" name="mid" value = "$mid">
</FORM>
</div>
</body>
</html>