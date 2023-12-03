<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Student</title>
</head>
<style type="text/css">

	.table-design{
	margin-left:0px;
	width: auto;
	margin-top:15px;
	background-image: url("images/c25.jpg");
   padding:20px;
  
}
th{
	width: auto;
	color: red;
	font-family: Comic Sans MS;
	font-size:15px;
	padding:20px;
	margin-top: -10px;
width: 400px;
background-color: black;


}
td{
	padding: 20px;
	color: black;
	font-family: Calibri;
	font-size:15px;
		width:500px;
	border: 1px solid black;

}
.profile{
	color: green;
	margin-top:100px;
	text-align: center;
	font-size: 40px;
	font-family: cooper;
	font-weight: bold;

}
.app-trash{
	width: 20px;
	height: 20px;
	margin-left: 70px;
}

</style>
<body>
 <div class="center-div">
          <h1 class="profile">List of all Students </h1>
   </div>
     <div class="table-responsive">
     </div>
      <table class="table-design">
        <thead>
          <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student PhoneNo</th>
            <th>Student Courses</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          
               <?php
                 
                  include 'database_connection.php';



              $selectquery="select * from   add_student";

              $query=mysqli_query($con,$selectquery);

              $nums=mysqli_num_rows($query);

              while ($res=mysqli_fetch_array($query)) {

                ?>
                <tr>
                  <td><?php echo $res['Student_Id'];?></td>
                  <td><?php echo $res['Student_Name'];?></td>
                  <td><?php echo $res['Student_Email'];?></td>
                  <td><?php echo $res['Student_PhoneNo'];?></td>
                  <td><?php echo $res['Student_Course'];?></td>

                    <td><a href="delete.php?course=<?php echo $res['Student_Course'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><img class="app-trash"src="image/trash.png"></a></td>
                </tr>

                <?php

              }

               ?>
                



               
        </tbody>
      </table>
</body>
</html>