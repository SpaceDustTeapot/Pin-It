<?php
/*
    This file is part of Pin it!.

    Pin it is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Pin it is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Pin it!.  If not, see <http://www.gnu.org/licenses/>
*/

var_dump($_POST);
$con = mysqli_connect("Address","User","Pass","BBS");
if(mysqli_connect_errno())
{
 echo "<br>";
 echo "Couldn't connect to database :^)";
} 
else
{
$Name ="Anonymous";
$Email = "";
$Comment= "";
$Errmsg;
$OPNUM = $_POST['opnum'];

echo "$Name";
if($_POST['Name'] != "")
{
 $Name = $_POST['Name'];
 echo "<br>";
 echo "$Name";
}
else
{

}

if($_POST['Email'] != "")
{
 $Email = $_POST['Email'];
 echo "<br>";
 echo "$Email";

}
else
{

}

if($_POST['Comment'] != "")
{
$Comment = $_POST['Comment'];
 echo "<br>";
 echo "$Comment";

}
else
{
 
}

$Errmsg = Func_Post($Name,$Email,$Comment,$con,$OPNUM);


}
function Func_Post($name,$email,$comment,$CON,$opnum)
{
 if($comment != "")
  {
  $sql="CREATE TABLE posts(PID INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(PID),isOP INT,Name CHAR(255), Email CHAR(255),OP int,Comment TEXT)";
  
  	//Execute Query; 
  	if(mysqli_query($CON,$sql))
  	{
  	echo "<br>";
  	echo "TABLE SUCESSFULL :D";
 	
	
  	}
  	else
  	{
  	 echo"ERROR Creating Table" . mysqli_error($CON);  


  	}

  //Insert information into Table :^)
   mysqli_query($CON,"INSERT INTO posts(isOP,Name,Email,OP,Comment) VALUES ('0','$name','$email',$opnum,'$comment')"); 
  
  $error = "POST SUCESSFULL!";
  return $error;
  }
  else
  {
   $error = "Nothing to Post";
   return $error;
  }
}
function ret()
{
 header("Location: index.html");
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<!-- Don't worry Be happy -->
<body style="margin-left:500px;background-color:#6699CC;color:#D00000;font-family:'Lucida Sans Unicode','Lucida Grande',sans-serif;">
<?php
echo "<h1>$Errmsg</h1>";

?>
<br>
<a href="index.php" style=> return:</a>
</body>
<footer style="margin-left:-2cm;margin-top:12cm;color:#FFFFFF">
Pin it! BBS software (c) SpaceDust 2014!
Liscenced under the GPL v3.
</footer>
</html>


