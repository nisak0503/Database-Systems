<!DOCTYPE html>
<html>
<?php
include "templet.php";
$id = $_GET['identifier'];
?>

<body>
<div style="position:relative;left:400px;top:50px;">

<FORM METHOD = "GET" ACTION = "Show_MovieInfo.php">
 
  <h1>
  <?php echo "Movie Information Page:"?>
  </h1>
  <div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div><b><font size = "5">
  <?php echo "Movie Information is:"?>
  </font>
  </b>
  </div>
  


<?php
function queryDBMovie($query)
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
        print "<html><body><div style=\"position:relative;left:0px;top:0px\">";
        // print columns' name and set up table styles
        //print "<b>Matching $table are:</b>";
        
        //print "<br><style>
        //table,table tr th, table tr td { border-radius:5px; border:1px solid #D0D0D0; }
        //table {width: 900px; min-height: 25px; line-height: 25px; border-collapse: collapse;}   
        //</style><table>";
        $num_fields = mysql_num_fields($rs);
        $schema = mysql_fetch_field($rs);
        $row = mysql_fetch_row($rs);
        $num_rows = mysql_num_rows($rs);
        print "$schema->name: $row[0]";
        if($row[0] && $num_fields>1) print " ($row[1])";
        if($num_fields==1 && $num_rows>1)
        {
          for($i = 1; $i < $num_rows; ++$i)
          {
            $row = mysql_fetch_row($rs);
            foreach ($row as $unit)
            {
              print " $unit";
            }

          }
          
        }
        print "<br>";
        //print "Producer: $row[2]<br>";
        //print "MPAA Rating: $row[3]<br>";
        //print "Director: $row[4]";
        //if($row[4]) print " ($row[5])";
        //print "<br>";
        //print "Genre: $row[6]<br>";
      
        
        print "</div></body></html>";
      }
  }
  mysql_close($db_connection);

}
?>

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
        print "<html><body><div style=\"position:relative;left:0px;top:0px\">";
        // print columns' name and set up table styles
        //print "<b>Matching $table are:</b>";
        print "<br><style>
        table,table tr th, table tr td { border-radius:5px; border:1px solid #D0D0D0; }
        table {width: 900px; min-height: 25px; line-height: 25px; border-collapse: collapse;}   
        </style><table><tr>";
        $num_fields = mysql_num_fields($rs);
        for ($i=0; $i<$num_fields-1; $i++)  //do not count actor id
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
            if (!$unit && $cnt == $num_fields-1)
              {//print "Still Alive";
              }
            else
              {
                //$var = getID();
                /* <a href="<?php echo "page02.php?new=".$var ?>">get</a> */
                if($cnt == 0)
                {
                  print "<a href=\"";
                  print "Actor_Info.php?identifier=";
                  print $row[$num_fields-1];
                  print "\">";  
                }
                
                print "$unit";
                if($cnt == 0) print "</a>";
                //print " $test";
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
function queryReview($query)
{
  $db_connection = mysql_connect("localhost", "cs143", "");
  if(!$db_connection) 
  {
    $errmsg = mysql_error($db_connection);
   // print "<html><body><div style=\"position:relative;left:300px;top:100px\">Connection failed:<br> $errmsg </br></div></body></html>";
    exit(1);
  }
  mysql_select_db("CS143", $db_connection);
  $rs = mysql_query($query, $db_connection);

  if ($rs == false)  //invalid input
  {
    //    print "<html><body><div style=\"position:relative;left:300px;top:100px\"> invalid query! </br></div></body></html>";
        $errmsg = mysql_error($db_connection);
    //    print("<html><body><div style=\"position:relative;left:300px;top:100px\"> $errmsg </br></div></body></html>");
    }
  else //valid input
  {
    $row = mysql_fetch_row($rs);
    mysql_close($db_connection);
    return $row[0];

  }
  

}
?>

<?php
function queryComment($query)
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
        //print "<html><body><div style=\"position:relative;left:300px;top:100px\"> invalid query! </br></div></body></html>";
        //$errmsg = mysql_error($db_connection);
        //print("<html><body><div style=\"position:relative;left:300px;top:100px\"> $errmsg </br></div></body></html>");
    }
  else //valid input
  {if (mysql_num_fields($rs) != 0) //not update
    {
        print "<html><body><div style=\"position:relative;left:0px;top:0px\">";
        // print columns' name and set up table styles
        //print "<b>Matching $table are:</b>";
        //print "<br><style>
        //table,table tr th, table tr td { border-radius:5px; border:1px solid #D0D0D0; }
        //table {width: 900px; min-height: 25px; line-height: 25px; border-collapse: collapse;}   
        //</style><table>";
        $num_fields = mysql_num_fields($rs);
        
        // print every row
        while($row = mysql_fetch_row($rs))
        {
          print "<br>";
          print "<font color = red> $row[0] </font>";
          print "rates this movie with score $row[1] and left a review at $row[2]<br>";
          print "comment:<br>";
          print "$row[3]<br>";

        }
        print "</table></div></body></html>";
      }
  }
  mysql_close($db_connection);

}
?>


<?php
    $query = "SELECT title as Title, year as Year from Movie where id = $id;";
    queryDBMovie($query);
    $query = "SELECT company as Producer from Movie where id = $id;";
    queryDBMovie($query);
    $query = "SELECT rating as \"MPAA Rating\" from Movie where id = $id;";
    queryDBMovie($query);
    $query = "SELECT concat(d.first, ' ', d.last) as \"Director\", d.dob as \"Date of Birth\" from MovieDirector md, Director d where md.mid = $id and md.did = d.id;";
    queryDBMovie($query);
    $query = "SELECT mg.genre as \"Genre\" from MovieGenre mg where mg.mid = $id;";
    queryDBMovie($query);
    print "<br>";
?>
<br>
<div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div><b><font size = "5">
  <?php echo "Actors in this Movie:"?>
  </font>
  </b>
  </div>




<?php

    $query = "SELECT concat(a.first, ' ', a.last) as Name, ma.role as Role, a.id as id from Actor a, MovieActor ma where ma.mid = $id and ma.aid = a.id;";
    queryDB($query);
    print "<br>";
?>


<br>
<div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div><b><font size = "5">
  <?php echo "User Review:"?>
  </font>
  </b>
  </div>




<?php
  //Review
    
    $query1 = "SELECT avg(rating) from Review where mid = $id group by mid;";
    $score = queryReview($query1);
    $query2 = "SELECT count(time) from Review where mid = $id group by mid;";
    $num = queryReview($query2);

    print "<html><body><div style=\"position:relative;left:0px;top:0px\">";
    print "Average score for this movie is $score/5 based on $num people's reviews.";
    print "<br/>";
    print "<a href=\"";
    print "AddTheComment.php?identifier=$id";
    print "\">";
    print "Leave your review as well!";
    print "</a>";
    print "</div></body></html>";

    /* <a href="<?php echo "page02.php?new=".$var ?>">get</a> */
    //$people = ;
    //print "<br>";
?>

<br>
<div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div><b><font size = "5">
  <?php echo "Comment Details Shown Below:"?>
  </font>
  </b>
  </div>

<?php
  //Comment Details
    
    $query = "SELECT name, rating, time, comment from Review where mid = $id;";
    queryComment($query);
    print "<br";
?>


<br>
<div style="margin:0;padding:0; width:900px;height:1px;background-color:#D0D0D0;overflow:hidden;"> </div>
  <br>
  <div><b><font size = "5">
  <?php echo "Search:"?>
  </font>
  </b>
  </div>

  <div style="position:relative;left:0px;top:10px;">
    <INPUT style="border-radius:5px; width:900px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Search" VALUE="   Search..." onfocus="if (value =='   Search...'){value =''}" onblur="if (value ==''){value='   Search...'}" SIZE=100 MAXLENGTH=80 /></br>
  </div>

  <div style="position:relative;left:0px;top:30px;">
    <input type="submit" style="border-radius:5px;background:transparent;height:35px;width:80px;" value="Click Me!"; onClick="" id="ClickMe"/>
  </div>

</div>
 </FORM> 
</body>
</html>