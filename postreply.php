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

/*
IMPORTANT POST VARIBLES 
opnum
Name
Email
Comment
filetoupload



*/

var_dump($_POST);
var_dump($_FILES);
$con = mysqli_connect("ADDRESS","USER","PASS","BBS");
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

$Errmsg = Func_Post($Name,$Email,$Comment,$con,$OPNUM,$_FILES);


}
function Func_Post($name,$email,$comment,$CON,$opnum,$file)
{
 $tgtdir = Upload_Image($file,$CON);
 echo "INSIDE TGTDIR IS<br>";
 echo $tgtdir;
 echo "<br>outside is"; 

 if($comment != "")
  {
  $sql="CREATE TABLE posts(PID INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(PID),isOP INT,Name CHAR(255), Email CHAR(255),OP int,Comment TEXT,ImageLoc CHAR(255))";
  
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
   mysqli_query($CON,"INSERT INTO posts(isOP,Name,Email,OP,Comment,ImageLoc) VALUES ('0','$name','$email','$opnum','$comment','$tgtdir')"); 
  echo "<br> DB says<br>" . mysqli_error($CON);
  
  
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

function Upload_Image($image,$CON)
{

//Check img varible
echo "heck img<br>";
echo $image['fileToUpload']['tmp_name'];
echo "<br>Tmp name is!";

	$filesize = 0;
	$mode =0;
	$target_dir = "uploads/images/";
	$target_file = $target_dir . basename($image["fileToUpload"]["name"]);
	$uploadOk = 1;
	$Filetype = pathinfo($target_file,PATHINFO_EXTENSION);


	if ($Filetype == "jpg" || $Filetype == "jpeg" || $Filetype == "png" || $Filetype == "gif" )
	{
	 	echo"img is valid"; 
	}
	else
	{
	 echo"<br>";
 		echo $Filetype;
 		echo "<br>";
 		echo "not a Image file";
 		$uploadOk = 0;
	}

	if($uploadOk == 0)
	{
		echo "Sorry, your file was not uploaded";

	}
	else
	{
	 	if(move_uploaded_file($image["fileToUpload"]["tmp_name"],$target_file))
		{
			  echo "File Uploaded";
			// $uflag = uload_to_database($conn,$cat,$target_file,$nam,$size);
			return $target_file;
		}
		else
		{
			echo "There was a issue";
		}
	}
}
/*
function uload_to_database($connection,$tgdir,)
{
 $result = mysqli_query($connection,$sql);

$dayte = get_date(); 
$sql = "INSERT into Torrent(catagory,name,date_added,size,download_link)values('$tgdir')";
mysqli_query($connection,$sql);


}
*/
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


