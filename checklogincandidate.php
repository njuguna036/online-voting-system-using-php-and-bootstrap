
<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="#">ONLINE VOTING SYSTEM</a></h1>
    </div>
	
	<nav id="mainav" class="fl_right">
      <ul class="clear">
        <li ><a href="index.php">Home</a></li>
        
        <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li><a href="candidatelogin.php">Login</a></li>
            <li><a href="candidateregister.php">Registration</a></li>
           
          </ul>
        </li>
        
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
   <section id="testimonials" class="hoc container clear"> 
    
    <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Candidate <a href="#">Login</a></marquee></h2></center>
    <ul class="nospace group">
      <li class="one_half">
      	<div >
		<h1>Invalid Credentials Provided </h1>

		</div>

		<div>

		<?php
			ini_set ("display_errors", "1");
			error_reporting(E_ALL);
			ob_start();

			session_start();
			require_once('connection.php');
			$mysqli = new mysqli("localhost", "root", "", "poll");
			// Defining your login details into variables
			$myusername=$_POST['myusername'];
			$mypassword=$_POST['mypassword'];

			$encrypted_mypassword=md5($mypassword); //MD5 Hash for security
			// MySQL injection protections
			$myusername = stripslashes($myusername);
			$mypassword = stripslashes($mypassword);
			$myusername = $mysqli->escape_string($_POST['myusername']);
			$mypassword = $mysqli->escape_string($_POST['mypassword']);

			//Error: If documents have been denied
			$sql1="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword' and candi_status = '-1' and is_candidate='1'";
			$result1= $mysqli->query($sql1) or die(mysqli_error());
			$count1=mysqli_num_rows($result1);
			if($count1 > 0)
			{
				echo "Your document has been denied. Please contact the Election Commission for further queries and reapplication.";
				die();
			}
			else
			{
				//Error: Voter trying to login as candidate
				$sql2="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword' and is_candidate='0'";
				$result2= $mysqli->query($sql2) or die(mysqli_error());
				$count2=mysqli_num_rows($result2);
				if($count2 > 0)
				{
					echo "Sorry, you are not registered as a candidate";
					die();
				}
				
				//Error: documents waiting for approval
				$sql2="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword' and candi_status='0'";
				$result2= $mysqli->query($sql2) or die(mysqli_error());
				$count2=mysqli_num_rows($result2);
				if($count2 > 0)
				{
					echo "Sorry, you can't log in. Your documents are yet to be approved.";
					die();
				}
				
				$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword' and candi_status = '1' and is_candidate='1'" or die(mysqli_error());
				$result= $mysqli->query($sql) or die(mysqli_error());

				// Checking table row
				$count=mysqli_num_rows($result);
				// If username and password is a match, the count will be 1

				if($count==1){
					// If everything checks out, you will now be forwarded to candidate.php
					$user = mysqli_fetch_assoc($result);
					$_SESSION['member_id'] = $user['member_id'];
					$curr_member = $user['member_id'];
					
					$sql2="SELECT member_id FROM tbmembers WHERE member_id='$curr_member'";
					$result2= $mysqli->query($sql2) or die(mysqli_error());
					$count2=mysqli_num_rows($result2);
					if($count2 > 0)
					{
						$user2 = mysqli_fetch_assoc($result2);
						$_SESSION['id'] = $user2['id'];
						header("location:candidate.php");
					}
				}
				//If the username or password is wrong, you will receive this message below.
				else {
					echo "Wrong Username or Password.<br><br>Return to <a href=\"candidatelogin.php\">Login</a>";
				}

			}
			
			
			ob_end_flush();

		?> 
</div>
</div>

     
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="title">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          <p>
          Name        : Hariet <br>
          University  : Meru university<br>
       
          </p>
          </address>
        </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-phone"></i> </li>
        <li><i class="fa fa-phone"></i> +25474553836/li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">  
        <li><i class="fa fa-envelope-o"></i> harietsteve1@gmail.com </li>
        <li><i class="fa fa-envelope-o"></i> vmt661@gmail.com </li>
      </ul>
    </div>

  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">#riengsteve</a></p>
    <p class="fl_right">Developed for <a target="_blank" href="http://www.os-templates.com/">Software Engineering Project</a></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script language="JavaScript" src="js/user.js">
</script>
<script src="layout/scripts/jquery.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script type="layout/scripts/bootstrap.js"></script>
</body>
</html>
</body>
</html>