<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>  

<style type="text/css">
   
   body{
   font-family: sans-serif;
   overflow: hidden;
   user-select: none;
   

}
*{
   margin: 0;
   padding: 0;
   list-style: none;
   text-decoration: none;
}
.title{
   text-align: center;
   margin-top: 50px;
   color: red;
   font-family:monospace;
   font-size: 50px;
   font-weight: bold;
   animation: login 5s infinite;
}
@keyframes login{
   0%{color: blue;}

   100%{color: red;}
}
.lock{
   margin-left: 200px;
   margin-top: 20px;
   width: 450px;
   height: 450px;

}
.main{
   margin-left:650px;
   margin-top:-400px;
   height:350px;
   width: 300px;
   padding: 20px;
   background-image: url("images/b9.jpg");
}
.log-account{
   margin-top: 2px;
   font-size:23px;
   margin-left: 50px;
   color:darkviolet;
   font-family: Elephant;
   
}

.get{
   margin-left:5px;
   margin-top: 20px;
   font-size: 18px;
   font-family: cursive;
   color:darkorange;

}

.log-email{
   width: 20px;
   height: 20px;
   display: inline-flex;
   margin-top: 5px;
   margin-left:20px;
}
.emails{
   margin-top:25px;
   padding: 8px;
   color: brown;
background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   border-radius: 10px;
   width: 200px;
   margin-left:5px;

}
.emails::placeholder{
   color: green;
   font-size: 15px;
   font-family: sans-serif;
}
.log-pass{
     margin-left:20px;
    width: 20px;
   height: 20px;
   display: inline-flex;
   margin-top: 5px;
}

.pass{
    margin-top:33px;
   padding: 8px;
   color: brown;
background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   border-radius: 10px;
width: 200px;
   margin-left:5px;
}
.pass::placeholder{
color: green;
   font-size: 15px;
   font-family: sans-serif;
}
.checkbox{
   color: red;
   margin-left: 50px;
   margin-top: 20px;
}

.login{
   background-color: blue;
   color: white;
   font-size: 20px;
   font-family:sans-serif;
   width: 250px;
   padding: 7px;
   margin-top:30px;
   border: 0;
   margin-left:25px;
}

.app-login{
   margin-left:25px;
   margin-top: 15px;
   color: red;
   font-size: 15px;
}
.sign{
   color:darkblue;

}
</style>

<body>
  
 
  <?php
      include 'database_connection.php';

      if(isset($_POST['submit'])){
      	$email=$_POST['email'];
      	$password=$_POST['password'];

      	$email_search = "SELECT * FROM login WHERE gemail='$email'";

      	$query=mysqli_query($con,$email_search);

      	$email_count=mysqli_num_rows($query);

      	if($email_count){
      		$email_pass=mysqli_fetch_assoc($query);

      		$db_pass=$email_pass['Password'];

      		$_SESSION['Name']=$email_pass['Name'];

      		$pass_decode=password_verify($password, $db_pass);

      		if($pass_decode){
                  
                  if(isset($_POST['rememberme'])){
                   setcookie('emailcookie',$email,time()+86400);
                   setcookie('passwordcookie',$password,time()+86400);

                  }
      			    ?>
                        <script>
                           alert("Login Successful");
                           location.replace("Mainpage.php");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Password Incorrect");
                        </script>
                        <?php
                        }

                     }else{
                        ?>
                        <script>
                           alert("Invalid Email, Plz SignUp");
                        </script>
                        <?php
                     }
 
                   }
               	
      
     
  ?>
   <script>
     function myfun(){
       var userconfirmation = confirm("Do you Want to visit website");
       if(userconfirmation==true){
          window.open("D:\JavaScript Practice\SwitchEx.html");
          return true;
       } else{
          document.write("user doesn't want to be visit the page");
          return false;
       }
    }


 </script>
<div>
   <h1 class="title">Login Here</h1>
</div>
  <div class="lock-img">
     <img class="lock" src="image/login.jpg">
  </div>
<div class="main">
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
		
       <h4 class="log-account">Create Account</h4>
         <h4 class="get">Get Started With Your Account</h4>


	<img class="log-email" src="image/email1.png"><input class="emails" type="email" name="email" placeholder="Enter Email" value="<?php if(isset($_COOKIE['emailcookie'])){ echo $_COOKIE['emailcookie'];}?>" required/><br>

   <img class="log-pass" src="image/password.png"><input class="pass" type="password" name="password" placeholder="Enter password" value="<?php if(isset($_COOKIE['passwordcookie'])){ echo $_COOKIE['passwordcookie'];}?>" required/><br>



  <input class="login" type="submit" name="submit" value="Login Now" onclick="myfun()">

   <h4 class="app-login"> Not have an account? <a class="sign" href="signup.php">Signup Here</a></h4>
        
	</form>
	 
</div>

</body>
</html>