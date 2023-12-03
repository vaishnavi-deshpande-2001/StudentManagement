<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>sign up</title>
</head>
<style type="text/css">
   body{
   font-family: sans-serif;
   overflow: hidden;
   user-select: none;
   background-image: url("image/c32.jpg");
   
}
*{
   margin: 0;
   padding: 0;
   list-style: none;
   text-decoration: none;
}


.rightside-div{
   float: right;
   margin-top: 70px;
   margin-right:430px;
   background-image: url("image/bkg-blu.jpg");
   width: 420px;
   height: 500px;
   padding: 5px;

}

.create-account{
   margin-left: 150px;
   margin-top: 2px;
   font-size:20px;
   color: red;
   font-family: sans-serif;
}

.get{
   margin-left: 100px;
   margin-top: 5px;
   font-size: 18px;
   font-family: cursive;
   color: purple;

}

.app-user{
   margin-top:5px;
   margin-left:110px;
   width: 22px;
   height:22px;
   display: inline-flex;
   
}

.app-name{
   padding: 7px;
    margin-top: 18px;
   background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   color: green;
    
  }
  .app-name::placeholder{
   color: hotpink;

  }
 .app-email{
   width: 20px;
   height: 20px;
 margin-left:110px;
   margin-top:25px;
    display: inline-flex;

 }

 .app-mail{
   padding: 7px;
    margin-top: 18px;
   background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   color: green;
    
   }
   .app-mail::placeholder{
      color: hotpink;
   }

.app-phone{
   width: 20px;
   height: 20px;
   margin-left:110px;
   margin-top:28px;
    display: inline-flex;

}
.app-mobile{
   padding: 7px;
    margin-top:10px;
   background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   color: green;
    
}
.app-mobile::placeholder{
   color: hotpink;
}
.app-pass{
   width: 20px;
   height: 20px;
 margin-left:110px;
   margin-top:33px;
    display: inline-flex;

}
.app-password{
    margin-top:10px;
   background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   color: green;
   width: 170px;
   padding: 7px;
}
.app-password::placeholder{
   color: hotpink;
}

.app-cpass{
   width: 18px;
   height: 18px;
 margin-left:110px;
   margin-top:36px;
    display: inline-flex;
}

.app-cpassword{
    margin-top:10px;
   background: transparent;
   border: 0;
   border-bottom: 2px solid #c5ecfd;
   border-color: blue;
   color: green;
   width: 170px;
   padding: 7px;
}
.app-cpassword::placeholder{
   color: hotpink;
}

.account{
   background: blue;
   color: white;
   width: 200px;
   height: 30px;
margin-left:125px;
   padding: 5px;
   margin-top: 20px;
   font-family: Arial Rounded MT;
   font-size: 15px;
}
.app-login{
   margin-left:120px;
   margin-top: 10px;
   color: green;
}
</style>
<body>

             <?php

                   include 'database_connection.php';

                   if(isset($_POST['submit'])){
                     $username=mysqli_real_escape_string($con,$_POST['Name']);
                     $email=mysqli_real_escape_string($con,$_POST['email']);
                     $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
                     $password=mysqli_real_escape_string($con,$_POST['password']);
                     $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);

                     $pass=password_hash($password, PASSWORD_BCRYPT);
                     $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

                     $emailquery = "SELECT * FROM login WHERE gemail='$email'";

                     $query=mysqli_query($con,$emailquery);

                     $emailcount=mysqli_num_rows($query);

                     if ($emailcount>0) {
                        ?>
                        <script>
                           alert("Email already exist");
                        </script>
                        <?php
                     }else{
                        if($password===$cpassword){

                           $insertquery="INSERT INTO login(Name, gemail, mobile, Password, Cpassword) VALUES ('$username','$email','$mobile','$pass',' $cpass')";

                           $iquery=mysqli_query($con,$insertquery);

                           if($iquery){
                             ?>
                        <script>
                           alert("Your Account Created");
                        </script>
                        <?php
                           }else{
                           ?>
                        <script>
                           alert("Plz!Try Again");
                        </script>
                        <?php
                        }

                     }else{
                        ?>
                        <script>
                           alert("password are not matchig");
                        </script>
                        <?php
                     }
 
                   }
               }

             ?>
   <div class="main-div">
   	<div class="rightside-div">
   	 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
         <h4 class="create-account">Create Account</h4>
         <h4 class="get">Get Started With Your Account</h4>


    <img class="app-user" src="image/persion.png"><input class="app-name" type="name" name="Name" placeholder=" Full Name" required/><br>

        <img class="app-email" src="image/email1.png"><input class="app-mail" type="email" name="email" placeholder="Email Address" required/><br>

        <img class="app-phone" src="image/phone.png"><input class="app-mobile" type="mobile" name="mobile" placeholder="Phone Number" required/><br>

        <img class="app-pass" src="image/password.png"><input class="app-password" type="password" name="password" placeholder="Create Password" required/><br>

        <img class="app-cpass" src="image/confirm.png"><input class="app-cpassword" type="password" name="cpassword" placeholder="Confirm Password" required/><br>

        <input class="account" type="submit" name="submit" value="Create Account">
        <h4 class="app-login">Have an account? <a href="login.php">Login Here</a></h4>
        
   	 </form>
   	</div>
   </div>
</body>
</html>