<html>
	<body>
		<head> 
			<link rel="stylesheet" href="styles.css">
		</head>
	
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-collapse">
        
                 <ul class="navbar-right ">
                 <li> <a class="navbar-brand" href="index.php">COLLEGE-NOTES-GALLERY</a></li>
           
            <?php if($_SESSION['role'] !== 'admin') { ?> <li><a href="./uploadnote.php">UPLOAD</a></li> <?php } ?>
           
                
                <div style="float:right">
                	<li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Account</a></li>
                        
<li>
                            <li><a href="../logout.php">Log Out</a></li>
                    </ul>
                </li>
                </div>
            </ul>
            </div>
<div class="sidenav">

		

                <ul class="navibar-side">
                    <li>
                        <a href="index.php" class="active">Dashboard</a>
                    </li>
                <?php if($_SESSION['role'] == 'admin') {
                    ?>
                   <li>
                         <a href="#" data-toggle="collapse" data-target="#user">Users </a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="./users.php">View All Users</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-file-text"></i> My Account </a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>"> View Profile</a>
                            </li>
                            <li>
                                <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Edit Profile</a>
                            </li>
                        </ul>
                        </li>
                            
                    <?php } else { ?>

                    <li>
                         <a href="#"> My Notes </a>
                        <ul id="user" class="collapse">
                            <li>
                                <a href="./notes.php">View All Notes</a>
                            </li>
                            <li>
                                <a href="./uploadnote.php">Upload Note</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle"> My Account</a>
                        <ul id="posts" class="collapse">
                            <li>
                                <a href="./viewprofile.php?name=<?php echo $_SESSION['username']; ?>"> View Profile</a>
                            </li>
                            <li>
                                <a href="./userprofile.php?section=<?php echo $_SESSION['username']; ?>">Edit Profile</a>
                            </li>
                        </ul>
                        </li>
</body>
</html>

<?php } ?>
                </ul>
            </div>
        </nav>
