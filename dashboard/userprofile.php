<?php
include ('includes/connection.php');
include ('includes/adminheader.php');


?>
<?php
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$query = "SELECT * FROM users WHERE username = '$username'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['id'];
		$usernm = $row['username'];
		$userpassword = $row['password'];
		$useremail = $row['email'];
		$name = $row['name'];
		$profilepic = $row['image'];
		$bio = $row['about'];

	}

if (isset($_POST['uploadphoto'])) {
$image = $_FILES['image']['name'];
    $ext = $_FILES['image']['type'];
    $validExt = array ("image/gif",  "image/jpeg",  "image/pjpeg", "image/png");
    if (empty($image)) {
    	$picture = $profilepic;
    }
    else if ($_FILES['image']['size'] <= 0 || $_FILES['image']['size'] > 1024000 )
    {
echo "<script>alert('Image size is not proper');
 window.location.href='userprofile.php';</script>";
 }
    else if (!in_array($ext, $validExt)){
        echo "<script>alert('Not a valid image');
        window.location.href='userprofile.php';</script>";
    }
    else {
        $folder  = 'profilepics/';
        $imgext = strtolower(pathinfo($image, PATHINFO_EXTENSION) );
        $picture = rand(1000 , 1000000) .'.'.$imgext;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $folder.$picture)) {
        $queryupdate = "UPDATE users SET image = '$picture' WHERE id= '$userid' " ;
        $result = mysqli_query($conn , $queryupdate) or die(mysqli_error($conn));
        if (mysqli_affected_rows($conn) > 0) {
        	echo "<script>alert('Profile Photo uploaded successfully');
        	window.location.href= 'userprofile.php';</script>";
        }
        else {
        	echo "<script>alert('Error! ..try again');</script>";
}
}
else {
	echo "<script>alert('Error occured while uploading! ..try again');</script>";
}
}
}
else  {
	$picture = $row['image'];
}


if (isset($_POST['update'])) {
	  $username = $_POST['username'];
      $email = $_POST['email'];
      $bio=$_POST['bio'];
      $pass = $_POST['newpassword'];
      $confirmPass=$_POST['confirmnewpassword'];
   
       if($pass!==$confirmPass){
      	 echo  "<center><font color='red'>Passwords didn't match</font></center>";
      }

  else {
      $name=$_POST['name'];
    

      $updatequery = "UPDATE users SET password = '$pass', name='$name', email= '$useremail',about='$bio' WHERE id='$userid'";
$result1 = mysqli_query($conn , $updatequery) or die(mysqli_error($conn));
if (mysqli_affected_rows($conn) > 0) {
	echo "<script>alert('PROFILE UPDATED SUCCESSFULLY');
	window.location.href='userprofile.php';</script>";
}
else {
	echo "<script>alert('An error occured, Try again!');</script>";
}
}
}
}
?>





<div id="wrapper">

        
       <?php include 'includes/adminnav.php';?>
        <div id="page-wrapper">

            <div class="content">

                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to your Profile 
                            <small><?php echo $_SESSION['name']; ?></small>
                        </h1>
<form role="form" action="" method="POST" enctype="multipart/form-data">



<div class="form-group">
        <label for="post_image">Profile Image</label>
		<img class="img-responsive" width="200" src="profilepics/<?php echo $picture; ?>" alt="Photo">
		<input type="file" name="image"> 
		<br>
		<button type="submit" name="uploadphoto" class="btn btn-primary" value="upload photo">upload photo</button>
    </div>
    </form>


    <form role="form" action="" method="POST" enctype="multipart/form-data">
    <hr>


<div class="form-group">
		<label for="user_title">User Name</label>
		<input type="text" name="username" class="form-control" value=" <?php echo $username; ?>" readonly>
	</div>



	<div class="form-group">
		<label for="user_author">Name</label>
		<input type="text" name="name" class="form-control"  value="<?php echo $name; ?>" required>
	</div>

	<div class="form-group">
		<label for="user_tag">Email</label>
		<input type="email" name="email" class="form-control"  value="<?php echo $useremail; ?>" required>
	</div>
	<div class="form-group">
		<label for="post_content">Bio</label>
		<textarea  class="form-control" name="bio" id="" cols="30" rows="10"><?php  echo $bio;  ?>
		</textarea>
	</div>

	
	<div class="form-group">
		<label for="usertag">New Password <font color='brown'> (changing password is optional)</font></label>
		<input type="password" name="newpassword" class="form-control" placeholder="Enter New Password">
	</div>
	<div class="form-group">
		<label for="usertag">Confirm New Password</label>
		<input type="password" name="confirmnewpassword" class="form-control" placeholder="Re-Enter New Password" >
	</div>
<hr>


<button type="submit" name="update" class="btn btn-primary" value="Update User">Update User</button>

                    </div>
                </div>
                

            </div>
            

    </div>
    
    
</body>

</html>
