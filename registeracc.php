
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
        <li><a href="index.php">Home</a></li>
        <li><a href="admin/index.php">Admin</a></li>
        <li class="active"><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="registeracc.php">Registration</a></li>
            
          </ul>
        </li>
        
    <li><a class="drop" href="#">Candidate Panel</a>
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
  
    
<div class="container">
   <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Voter <a href="#">Registration</a></marquee></h2></center>
        <div class="row" >
             <div class="col-sm-4 col-sm-offset-4 bg-info" style="background-color:#92a8d1;"  ><br>
        <h4 class="text text-center  alert bg-primary">Voter Registration</h4>


<div  >
  <?php
    require('connection.php');
    $mysqli = new mysqli("localhost", "root", "", "poll");

    if (isset($_POST['submit']))
    {

      $myFirstName = addslashes( $_POST['firstname'] ); 
      $myLastName = addslashes( $_POST['lastname'] ); 
      $myEmail = $_POST['email'];
      $myPassword = $_POST['password'];
      $myVoterid = $_POST['voter_id'];

      $newpass = md5($myPassword); 


      $sql="SELECT * FROM tbmembers WHERE voter_id='$myVoterid'" or die(mysqli_error());
      $result= $mysqli->query($sql) or die(mysqli_error());

      $count=mysqli_num_rows($result);
    

      if($count>0){
        die( "This Voter Id is linked to some other account.<br><br>Try again <a href=\"registeracc.php\">Register</a>" );
      }
    else
    {
    $sql = "INSERT INTO tbMembers(first_name, last_name, email, voter_id, password) VALUES ('$myFirstName','$myLastName', '$myEmail','$myVoterid', '$newpass')";
    $result= $mysqli->query($sql) or die(mysqli_error());
    die("You have registered for an account.Please wait for an admin to approve it. <a href='registeracc.php'>Register</a> or <a href='login.php'>Login</a>");
  
    }
    }
  
  ?>
</div> 
    <table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="registeracc.php" onSubmit="return registerValidate(this)">
<td>
<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
  <tr>
  <td style="color:#000000"; width="120" >First Name</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="firstname" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Last Name</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="lastname" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="150" >Email</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="email" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Voter Id</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="voter_id" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; >Password</td>
  <td style="color:#000000"; >:</td>
  <td style="color:#000000"; ><input name="password" type="password" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; >Confirm Password</td>
  <td style="color:#000000"; >:</td>
  <td style="color:#000000"; ><input name="ConfirmPassword" type="password" ></td>
  </tr>

  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td style="color:#000000";><input type="submit" name="submit" value="Register Account"></td>
  </tr>

</table>
</td>
</form>
</tr>
</table>
</div>
</div>
<center>
<br>Already have an account? <a href="login.php"><b>Login Here</b></a>
</center>
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
          Name        : Hariet<br>
          University  : Meru university <br>
          
          </p>
          </address>
        </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-phone"></i> 0745534836</li>
        <li><i class="fa fa-phone"></i> 0745534836</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">  
        <li><i class="fa fa-envelope-o"></i> riengsteve@gmail.com </li>
        <li><i class="fa fa-envelope-o"></i> stvmwg1@gmail.com </li>
      </ul>
    </div>

  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_right">Developed for <a target="_blank" href="http://www.os-templates.com/">Software Engineering Project</a></p>
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script language="JavaScript" src="js/user.js">
</script>
<script type="layout/scripts/bootstrap.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.placeholder.min.js"></script>
</body>
</html>