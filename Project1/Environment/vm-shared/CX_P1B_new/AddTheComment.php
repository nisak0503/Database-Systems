<!DOCTYPE html>
<html>
<?php 
include "templet.php";
$mid = $_GET[identifier];
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlTheComment.php">
 <h1>
 <?php echo "Add Comments to Movies"?>
 </h1>

<?php
$db_connection = mysql_connect("localhost","cs143","");
if(!$db_connection) 
{
    $errmsg = mysql_error($db_connection);
    print "Connection failed: $errmsg <br />";
    exit(1);
}
mysql_select_db("CS143", $db_connection);
?>


  <b>Movie Title</b></br>
   <div style="position:relative;left:0px;top:10px;">
    <select style="border-radius:5px; height:35px; width: 810px; background:white; font-size:15px"; NAME="Movie">
      <?php 
      $sql= "select id, title, year from Movie where id=$mid;";
      $result = mysql_query($sql, $db_connection);
      if ($result == false)  //invalid input
      {
        print "invalid query!<br>";
        $errmsg = mysql_error($db_connection);
        print("$errmsg<br>");
      }
      $row = mysql_fetch_array($result);
        echo "<option value='$row[id]'>$row[title] ($row[year] ) </option>";
      ?>
      </select>
  </div>

  <div style="position:relative;left:0px;top:30px;">
  <b>Your Name</b></br>
  <div style="position:relative;left:0px;top:10px;">
    <INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Reviewer" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
  </div>
  </div>


  <div style="position:relative;left:0px;top:50px;">
  <b>Review Rating</b></br>
   <div style="position:relative;left:0px;top:10px;">
    <SELECT style="border-radius:5px; height:35px; width: 810px; background:white; font-size:15px";  NAME="Rating">
      <OPTION SELECTED>5
      <OPTION>4
      <OPTION>3
      <OPTION>2
      <OPTION>1
      </SELECT>
  </div>
  </div>


  <div style="position:relative;left:0px;top:70px;">
  <b>Comments</b></br>
  <div style="position:relative;left:0px;top:10px;">
    <TEXTAREA style="border-radius:5px; color:grey;" NAME="Comment" ROWS=10 COLS=132>
  </TEXTAREA>
  </div>
  </div>


  <div style="position:relative;left:0px;top:90px;">
  <INPUT TYPE="submit" VALUE="submit">
  </div>
  <input type = "hidden" name="mid" value = "$mid">
  <input type="hidden" Time=date("Y-m-d H:i:s",time())> 

</FORM>
</div>
</body>
</html>