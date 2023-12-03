<?php

include 'database_connection.php';


$course  =$_GET['course'];

$deletequery="delete from  add_course WHERE Course_Name='$course'";

$query=mysqli_query($con,$deletequery);
if($query){
	echo "data deleted";
}
else {
	echo"failed";
}
header('location:viewstudent.php');
?>