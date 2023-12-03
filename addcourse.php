<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Course</title>
</head>
<style type="text/css">
	.title{
		color: orange;
		font-size: 30px;
		font-family: sans-serif;
		font-weight: bold;
		text-align: center;
		margin-top: 100px;
	}.course{
		margin-top:70px;
		margin-left: 100px;
	}
	.name{
		color: purple;
		font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left: 400px;
		margin-top: 50px;

	}
	.name-inp{
		margin-left:35px;
		padding: 5px;
		border-radius:5px;
        width:140px;
	}
	.proname{
		color: purple;
		font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left:400px;
		
	}
	.op1{
		margin-left:10px;
		padding: 5px;
		border-radius: 5px;
		margin-top: 50px;
	}
	.desc{
		color: purple;
	    font-size: 20px;
		font-family: sans-serif;
		font-weight: bold;
		margin-left:400px;
	}
	.desc1{
		margin-left:40px;
		padding: 5px;
		border-radius: 5px;
		margin-top: 50px;
		width:170px;
		height: 60px;
	}
	.add{
		background-color: blue;
		color: white;
		font-size: 25px;
		border-radius: 10px;
		font-weight: bold;
		font-family: sans-serif;
		padding: 5px;
		margin-left:490px;
		width:190px;
		margin-top: 30px;

	}
	.courseimg{
		width: 400px;
		height: 400px;
		margin-left: 50px;
		margin-top: -500px;
		animation-name: img;
		animation-duration: 3s ;
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
      $pname=mysqli_real_escape_string($con,$_POST['pname']);
      $description=mysqli_real_escape_string($con,$_POST['textarea']);

                   $emailquery = "SELECT * FROM  add_course WHERE Course_Name='$name'";

                     $query=mysqli_query($con,$emailquery);

                    
                     $emailcount=mysqli_num_rows($query);
                   

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Your Course already exists");
                        </script>
                        <?php
                     }else{
                     

                           $insertquery ="INSERT INTO add_course(Course_Name , Professor_Name, Course_Description) VALUES ('$name','$pname','$description')";

                           $iquery=mysqli_query($con,$insertquery);


                           if($iquery){
                             ?>
                        <script>
                           alert("Your Course Submitted Successfully");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Try again");
                        </script>
                        <?php
                        }
                    }
                    }

                     
                 

	?>
<h1 class="title"> Enroll Your Favourite Course</h1>
<div>
	<form class="course" action="" method="POST">
		<label class="name">Course Name:</label><input class="name-inp" type="text" name="name" placeholder="Enter Course Name"required /><br>
		<label class="proname">Professor Name:</label>
		<select class="op1" name="pname" required>
			<option>Mr.Padmavat Sir</option>
			<option>Mr. Humbe Sir</option>
			<option>Mr. Magar Sir</option>
			<option>Ms. Deepmala Mam</option>
			<option>Ms. Meghana Mam</option>
			<option>Ms. Dipali Mam</option>
			<option>Other</option>
		</select><br>
		<label class="desc">Description:</label><input class="desc1" type="text" name="textarea" placeholder="Plz Enter Description....." required><br>

		<input class="add" type="submit" name="submit" value="Add">
		

	</form>
	<img class="courseimg" src="image/im10.jpg">
</div>
</body>
</html>