<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web Form</title>

<style type="text/css">
	
	.title{
      margin-top:20px;
		text-align: center;
		color:red;
		padding-top:0px;
		font-family:cooper;
		font-size: 40px;
		font-weight: bold;
	}
	body{
	background-color:#white;
	}
	*{
	margin: 0;
	padding: 0;
	list-style: none;
	text-decoration: none;
}

.table-design{
	margin-left:0px;
	width: auto;
	margin-top:15px;
	background-image: url("images/im1.jpg");
   padding:20px;
   margin-top:-400px;
  
}
th{
   
	width: auto;
	color:red;
	font-family: Comic Sans MS;
	font-size:15px;
	padding:5px;
    width: 400px;
 
}
td{
	
	padding: 10px;
	color:black;
	font-family: cooper;
	font-size:15px;
	border: 1px solid blue;
	width:500px;
	text-align: center;
}

.top-bar{
	height: 70px;
	padding: 5px;
    background: black;
    margin-top:20px;
	box-shadow: 0 3px 15px rgba(0, 0, 0, .4);
}
.top-bar a{
	color: white;
	font-size: 22px;
	font-style: normal;
	font-family:Arial Rounded MT;
	font-weight: bold;
	padding: 5px;
	margin-top:20px;
  transition: 5s;
   display: inline-flex;
   margin-left: 60px;
}
.top-bar a:hover{
	color:greenyellow;
}


.search-bar{
	width:350px;
	background-color: black;
	opacity: 0.2px;
	display: flex;
	align-items: center;
	border-radius:10px;
	padding:5px ;
	margin-left:1000px;
	margin-top: -50px;
}
.search{
	width:200px;
	height:45;
	padding:7px;
	color: bl;
	font-size: 20px;
	font-family:sans-serif;
	font-weight: bold;
	margin-left: 30px;
	margin-top: 6px;
	border-radius: 5px;
	

}

.search::placeholder{
	color: gray;
	font-size: 20px;
	font-family: sans-serif;
}
.search-btn{
	width:70px;
	height:40px;
    padding:2px;
    margin-top:4px;
    font-family: sans-serif;
    font-size:20px;
    color:black;
   background-color: red;
   border-radius: 5px;
}

.im{
	
	margin-top:18px;
	width:1360px;
	height:480px;
	background-size: cover;
	background-position: center;
	/*background-attachment: fixed;
}

</style>
</head>
<body>
	<h1 class="title">Web Form</h1>

<nav class="top-bar">

	<div>
	<a href="#">Home</a>
	<a href="addcourse.php">Add Course</a>
	<a href="addstudent.php">Add Student</a>
	<a href="viewstudent.php">View Student</a>
	<a href="viewcourse.php">View Course</a>
	
<form action="" class="search-bar" method="POST">
	<input type="text" class="search" placeholder="Serach a courses" name="q">
	<button type="submit" class="search-btn" name="submit">Search</button> 
</form>

	<img class="im" src="image/c25.jpg">
	

     <div class="main-div">
      <table class="table-design">
        <thead>
          <tr>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student PhoneNo</th>
            <th>Student Courses</th>
          </tr>
        </thead>

        <tbody>
          
               <?php
                 
                 include'database_connection.php';
               if(isset($_POST['submit'])){

                $name=($_POST['q']);
      
     
                   $emailquery = "SELECT * FROM  add_student WHERE Student_Course='$name'";

                     $query=mysqli_query($con,$emailquery);

                       if(mysqli_num_rows($query)>0){
                       	while($res=mysqli_fetch_array($query)){
                       		?>
                       		<tr>
                           <td><?php echo $res['Student_Name'];?></td>
                           <td><?php echo $res['Student_Email'];?></td>
                            <td><?php echo $res['Student_PhoneNo'];?></td>
                            <td><?php echo $res['Student_Course'];?></td>
                        </tr>
                        <?php

                       	}
                       }
                     else{
                     	 ?>
                        <script>
                           alert("Record Not Found");
                        </script>
                        <?php
                     }
              
                }
                    ?>
               
        </tbody>
      </table>
  </div>
<!-- <h1 class="title">Web Form</h1>

<nav class="top-bar">

	<div>
	<a href="addcourse.php">Add Course</a>
	<a href="addstudent.php">Add Student</a>
	<a href="viewstudent.php">View Student</a>
	
<form action="" class="search-bar" method="POST">
	<input type="text" class="search" placeholder="Serach a courses" name="q">
	<button type="submit" class="search-btn" name="submit">Search</button> 
</form>

<div>
	<img class="im" src="image/im1.jpg">
	
</div> -->
</body>
</html>