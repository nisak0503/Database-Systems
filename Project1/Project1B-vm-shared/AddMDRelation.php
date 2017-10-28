<!DOCTYPE html>
<html>
<?php 
include "templet.php";
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlMDRelation.php">
 <h1>
 <?php echo "Add Movie Director Relation"?>
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
      <option value=0>--please select an actor/ actress--</option>
      <?php 
      $sql= "select id, title, year from Movie";
      $result = mysql_query($sql, $db_connection);
      if ($result == false)  //invalid input
      {
        print "invalid query!<br>";
        $errmsg = mysql_error($db_connection);
        print("$errmsg<br>");
      }
      while($row = mysql_fetch_array($result))
      {
        echo "<option value='$row[id]'>$row[title] ($row[year] ) </option>";
      }
      ?>
      </select>
  </div>

  <div style="position:relative;left:0px;top:30px;">
  <b>Director</b></br>
  <div style="position:relative;left:0px;top:10px;">
    <select style="border-radius:5px; height:35px; width: 810px; background:white; font-size:15px"; NAME="Director">
      <option value=0>--please select an actor/ actress--</option>
      <?php 
      $sql= "select id, first, last, dob from Director";
      $result = mysql_query($sql, $db_connection);
      if ($result == false)  //invalid input
      {
        print "invalid query!<br>";
        $errmsg = mysql_error($db_connection);
        print("$errmsg<br>");
      }
      while($row = mysql_fetch_array($result))
      {
        echo "<option value='$row[id]'>$row[first] $row[last] ($row[dob] ) </option>";
      }
      ?>
      </select>
  </div>
  </div>

  <div style="position:relative;left:0px;top:60px;">
  <INPUT TYPE="submit" VALUE="submit">
  </div>

</FORM>
</div>
</body>
</html>