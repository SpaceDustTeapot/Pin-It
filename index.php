<?php
/*
    This file is part of Pin it!.

    Pin it! is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Pin it! is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Pin it!.  If not, see <http://www.gnu.org/licenses/>

*/


$con = mysqli_connect("Address","Username","Pass","BBS");

if(mysqli_connect_errno())
{
 echo "<br>";
 echo "Couldn't connect to database :^)";
} 
else
{


}

function Load_Posts($CON)
{
$sql = mysqli_query($CON,"SELECT * FROM posts");

while($row = mysqli_fetch_array($sql))
{
 $comm = $row['Comment'];
 if($row['isOP'] == 1)
 {
 echo "#" .$row['PID'];
 $pid = $row['PID'];
 echo " " .$row['Name'];
 echo " " .$row['Email'];
 echo " OP ";
 echo '<a href="Replies.php?OP=' .$row['PID'];
 echo  '">';
 echo ' Reply! </a>';
 echo "<br>";
 echo '<p>';
 echo "$comm"; 
 echo "</p>";
 echo'<hr>';
 }
 else
 {

 }
}

}

?>
<!DOCTYPE html>
<html>
<head>
<!--Pon Pon -->

</head>

<body style="background-color:#6699CC;margin-left:500px;" >
<h1 style="color:#FFFFFF;">
Hello World! <!--BoardTitle-->
</h1>
<br>
<form action="Post.php" method="POST">
<br>
Name   : <input type="text" name="Name" style="margin-left:0.59cm;">
<button type="submit" >Post! </button>
<br>
Email  : <input type="text" name="Email" style="margin-left:0.6cm;"> 
<br>
Comment: <textarea name="Comment" rows="4" cols="50">
</textarea>
</form>
<br>
<hr style="margin-left:-17cm;margin-top:1cm;">
<p style="margin-left:0.5cm;">
</p>
<div id="Post!" style="margin-left:-490px;color:#FFFFFF">
<?php
 Load_Posts($con);

 ?>
<hr style="margin-left:-1cm;">
</div>
</body>
<footer style="margin-left:-2cm">
Pin it! BBS software (c) SpaceDust 2014!
Liscenced under the GPL v3.
</footer>
</html>
