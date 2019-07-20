

<?php include 'includes/connection.php';?>

<?php include 'includes/navbar.php';?>

<?php
if (isset($_POST['signup'])) {  


	if ($_POST['password'] !== $_POST['repassword']) 
	{
  	echo  "<center><font color='red'>Passwords do not match </font></center>";
	}
else {
      $username = $_POST['username'];
      $checkusername = "SELECT * FROM users WHERE username = '$username'";
      $run_check = mysqli_query($conn , $checkusername) or die(mysqli_error($conn));
      $countusername = mysqli_num_rows($run_check); 
      if ($countusername > 0 ) {
    echo  "<center><font color='red'>Username is already taken! try a different one</font></center>";
}
     $email = $_POST['email'];
      $checkemail = "SELECT * FROM users WHERE email = '$email'";
      $run_check = mysqli_query($conn , $checkemail) or die(mysqli_error($conn));
      $countemail = mysqli_num_rows($run_check); 
      if ($countemail > 0 ) {
    echo  "<center><font color='red'>Email is already taken! try a different one</font></center>";
}

  else {
      $name=$_POST['name'];
      $pass = $_POST['password'];
      $role = $_POST['role'];
      $course = $_POST['course'];
      $gender = $_POST['gender'];
      $joindate = date("F j, Y");
      $query = "INSERT INTO users(username,name,email,password,role,course,gender,joindate,token) VALUES ('$username' , '$name' , '$email', '$pass' , '$role', '$course', '$gender' , '$joindate' , '' )";
      $result = mysqli_query($conn , $query) or die(mysqli_error($conn));
      if (mysqli_affected_rows($conn) > 0) { 
        echo "<script>alert('SUCCESSFULLY REGISTERED');
        window.location.href='login.php';</script>";
}
else {
  echo "<script>alert('Error Occured');</script>";
}
}
}
}
?>
<br>

<!DOCTYPE html>
<html>
<body>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<style>
.login-card{
	text-align: center;
	background-color: gray;
	margin-top: 50px;
	width:350px;
	height:500px;
	margin-left: 500px;
}
</style>
<div class="container">


      <div  class="login-card">
      <h1>Sign-up</h1>
        <form id="contactform" method="POST"> 
        
          <input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text" value="<?php if(isset($_POST['signup'])) { echo $_POST['name']; } ?>"> </br><br>
       
          <input id="email" name="email" placeholder="Email" required="" type="email" value="<?php if(isset($_POST['signup'])) { echo $_POST['email']; } ?>"> </br><br>
                
              
          <input id="username" name="username" placeholder="username" required="" tabindex="2" type="text" value="<?php if(isset($_POST['signup'])) { echo $_POST['username']; } ?>"> </br><br>
           
               
          <input type="password" id="password" placeholder="Password" name="password" required=""> <br><br>
               
          <input type="password" id="repassword" placeholder="Confirm Password" name="repassword" required=""> </br><br>
        
          <div class="option">
          
            <select class="select-style gender" name="gender" style="width:240px">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            </select><br><br>
          
            <select class="select-style gender" name="role" style="width:240px">
            <option value="teacher">Teacher</option>
            <option value="student">Student</option>
            </select><br><br>
            
          
            <select class="select-style gender" name="course" style="width:240px">
            <option value="Computer Science">Computer Sc Engineering</option>
            <option value="Electrical">Electrical Engineering</option>
            <option value="Mechanical">Mechanical Engineering</option>
            <option value="Civil">Civil Engineering</option>
            <option value="Chemical">chemical Engineering</option>
            <option value="Metallurgy">Metallurgy Engineering</option>
            </select>
            </div>
            <p>
            <input class="buttom" name="signup" id="submit" tabindex="5" value="Sign me up!" type="submit" style="background-color:#fff">    
   </form> 
</div>      
</div>

</body>
</html>
