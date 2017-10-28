<!DOCTYPE html>
<html>
<?php 
include "templet.php";
?>
<body>
<div style="position:relative;left:400px;top:50px;">
<FORM METHOD = "POST" ACTION = "MysqlAddMovie.php">
 <h1>
 <?php echo "Add new Movie"?>
 </h1>

 <b>Title</b></br>
  <div style="position:relative;left:0px;top:10px;">
   <INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Title" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
  </div>

<div style="position:relative;left:0px;top:30px;">
 <b>Company</b></br>
   <div style="position:relative;left:0px;top:10px;">
   	<INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Company" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
   </div>
</div>

<div style="position:relative;left:0px;top:50px;">
 <b>Year</b></br>
   <div style="position:relative;left:0px;top:10px;">
   	<INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="Year" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
   	Year>=1895, i.e.1994
   </div>
</div>


<div style="position:relative;left:0px;top:70px;">
  <b>MPAA Rating</b></br>
   <div style="position:relative;left:0px;top:10px;">
    <SELECT style="border-radius:5px; height:35px; width: 810px; background:white; font-size:15px";  NAME="MPAA_Rating">
      <OPTION SELECTED>G
      <OPTION>NC-17
      <OPTION>PG
      <OPTION>PG-13
      <OPTION>R
      <OPTION>surrendere
      </SELECT>
  </div>
</div>


<div style="position:relative;left:0px;top:90px;">
 <b>Genre</b></br>
 <div style="position:relative;left:0px;top:5px; width:840px">
<input type="checkbox" name="genre[]" value="Action" />Action
<input type="checkbox" name="genre[]"  value="Adult" />Adult
<input type="checkbox" name="genre[]" value="Adventure" />Adventure
<input type="checkbox" name="genre[]" value="Animation" />Animation
<input type="checkbox" name="genre[]" value="Comedy" />Comedy
<input type="checkbox" name="genre[]" value="Crime" />Crime
<input type="checkbox" name="genre[]" value="Documentary" />Documentary
<input type="checkbox" name="genre[]" value="Drama" />Drama
<input type="checkbox" name="genre[]" value="Family" />Family
<input type="checkbox" name="genre[]" value="Fantasy" />Fantasy
<input type="checkbox" name="genre[]" value="Horror" />Horror
<input type="checkbox" name="genre[]" value="Musical" />Musical
<input type="checkbox" name="genre[]" value="Mystery" />Mystery
<input type="checkbox" name="genre[]" value="Romance" />Romance
<input type="checkbox" name="genre[]" value="Sci-Fi" />Sci-Fi
<input type="checkbox" name="genre[]" value="Short" />Short
<input type="checkbox" name="genre[]" value="Thriller" />Thriller
<input type="checkbox" name="genre[]" value="War" />War
<input type="checkbox" name="genre[]" value="Western" />Western
</div>
</div>

<div style="position:relative;left:0px;top:100px;">
<INPUT TYPE="submit" VALUE="submit">
</div>

</FORM>
</div>
</body>
</html>




