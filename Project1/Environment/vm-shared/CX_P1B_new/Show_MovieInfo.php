<!DOCTYPE html>
<html>
<?php
include "templet.php";
?>

<body>
<div style="position:relative;left:400px;top:50px;">

<FORM METHOD = "GET" ACTION = "Show_MovieInfo.php">
 
  <h1>
  <?php echo "Movie Information Page:"?>
  </h1>
  <div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  

  <br>
  <b>Search:</b></br>
  <div style="position:relative;left:0px;top:10px;">
    <INPUT style="border-radius:5px; width:900px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Search" VALUE="   Search..." onfocus="if (value =='   Search...'){value =''}" onblur="if (value ==''){value='   Search...'}" SIZE=100 MAXLENGTH=80 /></br>
  </div>

  <div style="position:relative;left:0px;top:30px;">
    <input type="submit" style="border-radius:5px;background:transparent;height:35px;width:80px;" value="Click Me!"; onClick="" id="ClickMe"/>
  </div>
  

</FORM>

</div>


<?php
function queryDB($query)
{
  $db_connection = mysql_connect("localhost", "cs143", "");
  if(!$db_connection) 
  {
    $errmsg = mysql_error($db_connection);
    print "<html><body><div style=\"position:relative;left:300px;top:100px\">Connection failed:<br> $errmsg </br></div></body></html>";
    exit(1);
  }
  mysql_select_db("CS143", $db_connection);
  $rs = mysql_query($query, $db_connection);
  if ($rs == false)  //invalid input
  {
        print "<html><body><div style=\"position:relative;left:300px;top:100px\"> invalid query! </br></div></body></html>";
        $errmsg = mysql_error($db_connection);
        print("<html><body><div style=\"position:relative;left:300px;top:100px\"> $errmsg </br></div></body></html>");
    }
  else //valid input
  {if (mysql_num_fields($rs) != 0) //not update
    {
        print "<html><body><div style=\"position:relative;left:400px;top:100px\">";
        print "<br><style>
        table,table tr th, table tr td { border-radius:5px; border:1px solid #D0D0D0; }
        table {width: 900px; min-height: 25px; line-height: 25px; border-collapse: collapse;}   
        </style><table><tr>";
        $num_fields = mysql_num_fields($rs);
        for ($i=0; $i<$num_fields-1; $i++)
        {
          $schema = mysql_fetch_field($rs);
          print "<td> $schema->name </td>";
        }
        print "</tr>";
        // print every row
        while($row = mysql_fetch_row($rs))
        {
          print "<tr>";
          $cnt = -1;
          foreach($row as $unit)
          {
            $cnt++;
            if($cnt == $num_fields-1) break;
            print "<td>";
            if (!$unit)
              {print "NULL";}
            else
              {
                print "<a href=\"";
                print "Movie_Info.php?identifier=";
                print $row[$num_fields-1];
                print "\">";
                print "$unit";
                print "</a>";

              }
            print "</td>";
          }
          print "</tr>";
        }
        print "</table></div></body></html>";
      }
  }

  mysql_close($db_connection);

}
?>


<?php
$query = $_REQUEST["Search"];


$query = strtoupper($query);
echo "$query";

if ($query == null) // Nothing input
{
  //print "Please input a query!<br>";
}

else //something input
{   
  $names = split(" ", $query);
  $actorFirstQuery = "select concat(first, ' ',last) as name, dob as \"date-of-birth\", id from Actor where upper(first) like '%$names[0]%' and upper(last) like '%$names[1]%'";
  $actorLastQuery = "select concat(first, ' ', last) as name, dob as \"date-of-birth\", id from Actor where upper(first) like '%$names[1]%' and upper(last) like '%$names[0]%'";
  $unionQuery = "($actorFirstQuery) UNION ($actorLastQuery);";
  
  //queryDB($unionQuery, "Actors");

  $movieQuery = "select title, year, id from Movie where upper(title) like '%$names[0]%_%$names[1]%' or upper(title) like '%$names[1]%_%$names[0]%';";
  
  queryDB($movieQuery, "Movies");
 } 
  
?>



</body>
</html>