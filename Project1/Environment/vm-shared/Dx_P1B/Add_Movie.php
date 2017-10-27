<!DOCTYPE html>
<html>
<?php 
include "templet.php";
?>
<body>
<div style="position:absolute;left:400px;top:100px;">
<FORM METHOD = "POST" ACTION = "<?php echo $_SERVER['./Add_Movie.php']; ?>">
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
   	i.e.1994-09-14
   </div>
</div>

<div style="position:relative;left:0px;top:100px;">
<INPUT TYPE="submit" VALUE="submit">
</div>

</FORM>
</div>
</body>
</html>




