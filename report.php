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

var_dump($_POST);

$thread_num = $_POST['ThreadNum'];
$reason = $_POST['Reason'];

$con = mysqli_connect("ADDRESS","USER","PASS","BBS");


function create_Report_table($Connection)
{
 $sql="CREATE TABLE posts(PID INT NOT NULL AUTO_INCREMENT,PRIMARY KEY(PID),Reported_Post int, Reason text)";
 mysqli_query($Connection,$sql);

}

function send_Report($Connection,$Reason,$Thread_num)
{
 $sql = "INSERT INTO posts(Reported_Post,Reason) VALUES ('$Thread_num','$Reason')";
 mysqli_query($Connection,$sql);

}


?>
