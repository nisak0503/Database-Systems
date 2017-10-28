<!DOCTYPE html>
<html>
<head>
	<?php $title = "CS143 Query System" ?>
	<title> <?php echo "$title"; ?> </title>
<head>
<body>
<h1 align="center" style="background:black; font-size:35px">
<a href="./home.php" 
style="color:grey; text-decoration:none">
<?php echo "$title"?> 
</a>
</h1>

<div style="position:absolute;left:8px;top:72px;">
<form style = "background: #F0F0F0; width:250px; height:750px;line-height :30px  ">
        </br>
        <h2> Add new content </h2>
        <ul>
         <li><a href="./Add_ActorOrDirector.php" style="color:#404040; text-decoration:none;font-size:15px">Add Actor/Director</a></li>
         <li><a href="./Add_Movie.php" style="color:#404040; text-decoration:none;font-size:15px">Add Movie Information</a></li>
         <li><a href="./AddComment.php" style="color:#404040; text-decoration:none;font-size:15px">Add Comments to movies</a></li>
         <li><a href="./AddMARelation.php" style="color:#404040; text-decoration:none;font-size:15px">Add Movie/Actor Relation</a></li>
         <li><a href="./AddMDRelation.php" style="color:#404040; text-decoration:none;font-size:15px">Add Movie/Director Relation</a></li>
        </ul>
         <h2> Browsering Content </h2>
        <ul>
            <li><a href="./Show_ActorInfo.php" style="color:#404040; text-decoration:none;font-size:15px" >Show Actor Information</a></li>
            <li><a href="./Show_MovieInfo.php" style="color:#404040; text-decoration:none;font-size:15px">Show Movie Information</a></li>
        </ul>
        <h2> Search Interface </h2>
        <ul>
            <li><a href="./Searching.php" style="color:#404040; text-decoration:none;font-size:15px">Search Actor/ Actress/ Movie</a></li>
        </ul>
</form>
</div>

</body>
</html>









