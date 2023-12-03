<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Course</title>
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
	font-family:cooper;
	font-size:20px;
	padding:20px;
	margin-top: -10px;
width: 400px;
background-color:darkgray;
text-align: center;

}
td{
	padding: 20px;
	color: blue;
	font-family: cooper;
	font-size:20px;
	width:500px;
	border: 1px solid black;
	text-align: center;

}
.profile{
	color: purple;
	margin-top:100px;
	text-align: center;
	font-size: 40px;
	font-family: cooper;
	font-weight: bold;

}
.app-trash{
	width: 20px;
	height: 20px;
	margin-left:-10px;
	text-align: center;
}
</style>
<body>
    <div class="center-div">
          <h1 class="profile">List of all Courses </h1>
   </div>
     <div class="table-responsive">
     </div>
      <table class="table-design">
        <thead>
          <tr>
            <th>Id</th>
            <th>Course Name</th>
            <th>Professor Name</th>
            <th>Course Description</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>
          
               <?php
                 
                  include 'database_connection.php';



              $selectquery="select * from   add_course";

              $query=mysqli_query($con,$selectquery);

              $nums=mysqli_num_rows($query);

              while ($res=mysqli_fetch_array($query)) {

                ?>
                <tr>
                  <td><?php echo $res['Course_Id'];?></td>
                  <td><?php echo $res['Course_Name'];?></td>
                  <td><?php echo $res['Professor_Name'];?></td>
                  <td><?php echo $res['Course_Description'];?></td>

                    <td><a href="coursedelete.php?course=<?php echo $res['Course_Name'];?>" data-toggle="tooltip" data-placement="bottom" title="Delete"><img class="app-trash"src="image/trash.png"></a></td>
                </tr>

                <?php

              }

               ?>
                



               
        </tbody>
      </table>
</body>
</html>