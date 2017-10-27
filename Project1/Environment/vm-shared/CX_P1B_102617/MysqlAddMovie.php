<!DOCTYPE html>
<html>
<?php 
include "Add_Movie.php";
?>
<body>

<div style="position:relative;left:400px;top:180px;">
<?php
$db_connection = mysql_connect("localhost", "cs143", "");
if(!$db_connection) 
{
    $errmsg = mysql_error($db_connection);
    print "Connection failed: $errmsg </br>";
    exit(1);
}

mysql_select_db("CS143", $db_connection);

if(($_POST[Title]=="   Text Input") || ($_POST[Company]=='   Text Input') || ($_POST[Year]=='   Text Input')){
        echo 'please input data';
       exit();
    }
if($_POST[Year]<1895)
{
    exit('Year input is invalid!');
}
else 

{   $query = "SELECT MAX(id) FROM Movie";
	if(!$result=@mysql_query($query,$db_connection))
              showerror();
    $row=mysql_fetch_array($result);
    $MaxMovieID=$row[0]+1; 
    $sql="INSERT INTO Movie(id, title, year, rating, company) VALUES ('$MaxMovieID', '$_POST[Title]','$_POST[Year]','$_POST[MPAA_Rating]', '$_POST[Company]')";

if (!mysql_query($sql,$db_connection)){
 die('Error: ' . mysql_error());
}

   $value = $_POST['genre']; 

   foreach($value as $onevalue){  
        $sql="INSERT INTO MovieGenre(mid, genre) VALUES ('$MaxMovieID', '$onevalue')";  
        if (!mysql_query($sql,$db_connection)){
 die('Error: ' . mysql_error());
}
    }

    echo "1 record added: '$MaxMovieID', '$_POST[Title]','$_POST[Company]','$_POST[Year]', '$_POST[MPAA_Rating]'"; 
    echo ', '.implode(', ',$value);  
   
}

mysql_close($db_connection);
?>
</div>
