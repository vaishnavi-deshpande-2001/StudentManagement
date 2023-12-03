<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Student</title>
	<script type="text/javascript" src="multiselect_dropdown.js"></script>
</head>

<style type="text/css">
	
	.title{
		color: #578458;
		font-size: 30px;
		font-family: sans-serif;
		font-weight: bold;
		text-align: center;
		margin-top: 100px;
	}.student{
		margin-top:70px;
		margin-left: 100px;
	}
	.name{
		color: blue;
		font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left: 400px;
		margin-top: 50px;

	}
	.name-inp{
		margin-left:10px;
		padding: 5px;
		border-radius:5px;
        width:170px;
	}
	.email{
		color: blue;
		font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left:400px;
		
	}
	.email-inp{
		margin-left:10px;
		padding: 5px;
		border-radius: 5px;
		margin-top: 50px;
	}
	.phone{
		color: blue;
	    font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left:400px;
	}
	.phone1{
		margin-left:50px;
		padding: 5px;
		border-radius: 5px;
		margin-top: 50px;
		
	}
	.add{
		background-color:green;
		color: white;
		font-size: 20px;
		border-radius: 10px;
		font-weight: bold;
		font-family: sans-serif;
		padding: 5px;
		margin-left:500px;
		width:155px;
		margin-top: 30px;
	}
	
	.select{
		width:160px;
		height:30px;
		padding: 5px;
		margin-top: 50px;

	}
	.scourse{
	   color: blue;
		font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left: 400px;
        margin-top:40px;
       display:inline-block;
	}
	.sideimg{
		width: 400px;
		height: 400px;
		margin-top: -400px;
		margin-left: 10px;
		border-radius: 60px;
		animation-name: img;
		animation-duration: 2s;
		animation-iteration-count: infinite;
	}
	@keyframes img{
		from{
			width: 300px;
			height: 400px;
		}
		to{
			width: 400px;
			height: 450px;
		}
	}

</style>
<body>
	<?php
     
      include'database_connection.php';
    if(isset($_POST['submit'])){

      $name=mysqli_real_escape_string($con,$_POST['name']);
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $phone=mysqli_real_escape_string($con,$_POST['phone']);
      $course=($_POST['course']);
    
       $allcourses=implode("," ,$course);
       //echo $allcourses;

                   $emailquery = "SELECT * FROM  add_student WHERE Student_Email='$email'";

                     $query=mysqli_query($con,$emailquery);

                    
                     $emailcount=mysqli_num_rows($query);
                   

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("You are already enrolled in course");
                        </script>
                        <?php
                     }else{
                     

                           $insertquery ="INSERT INTO add_student(Student_Name, Student_Email, Student_PhoneNo, Student_Course) VALUES ('$name','$email','$phone','$allcourses')";

                           $iquery=mysqli_query($con,$insertquery);


                           if($iquery){
                             ?>
                        <script>
                           alert("Your Course will be Enrolled");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Your Course Limit is Over!! ");
                        </script>
                        <?php
                        }
                    }
                    }

                     
                 

	?>
<h1 class="title">Students are Brighter future..</h1>
<div>
	<form class="student" action="" method="POST">
		<label class="name">Student Name:</label><input class="name-inp" type="text" name="name" placeholder="Enter Student Name"required /><br>
		<label class="email">Student Email:</label><input class="email-inp" type="text" name="email" placeholder="Enter Email" required><br>
		<label class="phone">Phone No:</label><input class="phone1"  type="text" name="phone" placeholder="Enter only Digits" required><br>

		<label class="scourse">Select Courses:</label>
		 <select name="course[]" class="select" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="10" required>
		 <option value="C">C</option>
		 <option value="C++">C++</option>
		 <option value="Java">Java</option>
		 <option value="Advance Java">Advance Java</option>
		 <option value="C#">C#</option>
		 <option value="HTML">HTML</option>
		 <option value="CSS">CSS</option>
		 <option value="Bootstrap">Bootstrap</option>
		 <option value="javascript">Javascript</option>
		 <option value="Jquery">Jquery</option>
		 <option value="React Js">React Js</option>
		 <option value="Angular Query">Angular Query</option>
		 <option value="Php">Php</option>
		 <option value="Python">Python</option>
		 <option value="Android Development">Android Development</option>
		</select>
		


		<input class="add" type="submit" name="submit" value="Add Student">
		

	</form>
	<img class="sideimg" src="image/im9.jpg">
</div>

</body>
</html>