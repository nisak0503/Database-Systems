<!DOCTYPE html>
<html>
<head>
	<?php $title = "CS143 Project1A" ?>
	<title> <?php echo "$title"; ?> </title>
<head>

<body>

<h1><?php echo "$title"?></h1>

<?php
echo "Type an SQL query in the following box:<br>";
echo "Example: SELECT * FROM Actor WHERE id=10;<br>";
?>
<br>


<FORM METHOD = "POST" ACTION = "<?php echo $_SERVER['./query.php']; ?>">
    

<TEXTAREA NAME="query" ROWS=10 COLS=100>
</TEXTAREA>
<br>
<INPUT TYPE="submit" VALUE="submit">
</FORM>

<br>

<?php
$note = "Note: tables and fields are case sensitive."?>
<?php echo "$note<br>"; ?>
<h1><?php echo "Results from MySQL:";?></h1>


<?php
$query = $_REQUEST["query"];
$db_connection = mysql_connect("localhost", "cs143", "");
if(!$db_connection) 
{
    $errmsg = mysql_error($db_connection);
    print "Connection failed: $errmsg <br />";
    exit(1);
}

mysql_select_db("TEST", $db_connection);
$rs = mysql_query($query, $db_connection);

if ($query == null) // Nothing input
{
	print "Please input a query!<br>";
}
else //something input
{ 	if ($rs == false)  //invalid input
	{
        print "invalid query!<br>";
        $errmsg = mysql_error($db_connection);
        print("$errmsg<br>");
    }
	else //valid input
	{if (mysql_num_fields($rs) != 0) //not update
		{
			$affected = mysql_affected_rows($db_connection);
    		print "Total affected rows: $affected<br>";
    		// print columns' name
    		print "<br><html><body><table border = 2><tr>";
    		for ($i=0; $i<mysql_num_fields($rs); $i++)
    		{
    			$schema = mysql_fetch_field($rs);
    			print "<td> $schema->name </td>";
    		}
    		print "</tr>";
    		// print every row
    		while($row = mysql_fetch_row($rs))
    		{
    			print "<tr>";
    			foreach($row as $unit)
    			{
    				print "<td>";
    				if (!$unit)
    					{print "NULL";}
    				else
    					{print "$unit";}
    				print "</td>";
    			}
    			print "</tr>";
    		}
    		print "</table></body></html>";
    	}
	else //update
		{
			$affected = mysql_affected_rows($db_connection);
    		print "Total affected rows: $affected<br>";
		}
	}
}

mysql_close($db_connection);
?>
</body>
</html>









