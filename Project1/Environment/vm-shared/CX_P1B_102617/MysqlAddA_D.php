<!DOCTYPE html>
<html>
<?php 
include "Add_ActorOrDirector.php";
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


if(($_POST[FirstName]=="   Text Input") || ($_POST[LastName]=='   Text Input') || ($_POST[DateOfBirth]=='   Text Input')){
        echo 'please input data';
       exit();
    }

$is_date=strtotime($_POST[DateOfBirth])?strtotime($_POST[DateOfBirth]):false;
if ($_POST[DateOfDie]!="   Text Input") {$is_date=strtotime($_POST[DateOfDie])?strtotime($_POST[DateOfDie]):false;}
if($is_date===false){
    exit('Date input is invalid!');
}else
{
if ($_POST[status]== "Actor") {
	$query = "SELECT MAX(id) FROM Actor";
	if(!$result=@mysql_query($query,$db_connection))
              showerror();
    $row=mysql_fetch_array($result);
    $MaxPersonID=$row[0]+1; 
    
    if ($_POST[DateOfDie]=="   Text Input") {	$sql="INSERT INTO Actor(id, last, first, sex, dob, dod)
    VALUES ('$MaxPersonID', '$_POST[LastName]','$_POST[FirstName]','$_POST[sex]', '$_POST[DateOfBirth]',NULL)";} else {   $sql="INSERT INTO Actor(id, last, first, sex, dob, dod)
    VALUES ('$MaxPersonID', '$_POST[LastName]','$_POST[FirstName]','$_POST[sex]', '$_POST[DateOfBirth]','$_POST[DateOfDie]')";}
}
else{$query = "SELECT MAX(id) FROM Director";
    if(!$result=@mysql_query($query,$db_connection)) showerror();
    $row=mysql_fetch_array($result);
    $MaxPersonID=$row[0]+1; 
    if ($_POST[DateOfDie]=="   Text Input") {
    $sql="INSERT INTO Director(id, last, first, dob, dod)
    VALUES ('$MaxPersonID', '$_POST[LastName]','$_POST[FirstName]','$_POST[DateOfBirth]',NULL)";} else {$sql="INSERT INTO Director(id, last, first, dob, dod)
    VALUES ('$MaxPersonID', '$_POST[LastName]','$_POST[FirstName]','$_POST[DateOfBirth]','$DOD')";}
}

if (!mysql_query($sql,$db_connection))
{
 die('Error: ' . mysql_error());
}

if ($_POST[DateOfDie]=="   Text Input") {$DOD="still alive";} else {$DOD=$_POST[DateOfDie];}
echo "1 record added: '$MaxPersonID', '$_POST[FirstName]','$_POST[LastName]','$_POST[sex]', '$_POST[DateOfBirth]','$DOD'";
}
mysql_close($db_connection);
?>
</div>
