<!DOCTYPE html>
<html>
<?php 
include "templet.php";
?>
<body>

<div style="position:relative;left:400px;top:50px;">

<FORM METHOD = "POST" ACTION = "MysqlAddA_D.php">
 
 <h1>
 <?php echo "Add new Actor/Director"?>
 </h1>
 
 <input checked="true" type="radio" name="status" value="Actor" />Actor
 <input type="radio" name="status" value="Director"/>Director

<div style="position:relative;left:0px;top:10px;">
 <b>First Name</b></br>
  <div style="position:relative;left:0px;top:10px;">
   <INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="FirstName" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
  </div>
</div>

<div style="position:relative;left:0px;top:30px;">
 <b>Last Name</b></br>
   <div style="position:relative;left:0px;top:10px;">
   	<INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="LastName" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
   </div>
</div>


<div style="position:relative;left:0px;top:50px;">
    <input checked="true" type="radio" name="sex" value="Male" />Male
    <input type="radio" name="sex" value="Female" />Female
    <input type="radio" name="sex" value="Not Applicable" />Not Applicable
</div>


<div style="position:relative;left:0px;top:60px;">
 <b>Date of Birth</b></br>
   <div style="position:relative;left:0px;top:10px;">
   	<INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="DateOfBirth" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
   	i.e.1994-09-14
   </div>
</div>

<div style="position:relative;left:0px;top:80px;">
 <b>Date of Die</b></br>
   <div style="position:relative;left:0px;top:10px;">
   	<INPUT style="border-radius:5px; height:30px; color:grey; font-size:15px"  TYPE="text" NAME="DateOfDie" VALUE="   Text Input" onfocus="if (value =='   Text Input'){value =''}" onblur="if (value ==''){value='   Text Input'}" SIZE=100 MAXLENGTH=80 /></br>
   	(leave blank if alive now)
   </div>
</div>
<div style="position:relative;left:0px;top:100px;">
<INPUT TYPE="submit" VALUE="submit">
</div>

</FORM>
</div>
</body>
</html>






