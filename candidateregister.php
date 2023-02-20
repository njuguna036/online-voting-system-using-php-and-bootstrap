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
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
            
          </ul>
        </li>
        
    <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li><a href="candidatelogin.php">Login</a></li>
            <li class="active"><a href="candidateregister.php">Registration</a></li>
            
          </ul>
        </li>
    
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  
    
<div class="container">
   <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Candidate <a href="#">Registration</a></marquee></h2></center>
        <div class="row" >
             <div class="col-sm-6 col-sm-offset-3 bg-info" style="background-color:#92a8d1;"  ><br>
        <h4 class="text text-center  alert bg-primary">Candidate Registration</h4>


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
      $myParty = $_POST['party_name'];
     
    
    
      $newpass = md5($myPassword); 

      $sql="SELECT * FROM tbmembers WHERE voter_id='$myVoterid'";
      $result= $mysqli->query($sql) or die(mysqli_error());

     
      $count=mysqli_num_rows($result);
     

      if($count>0){
        die( "This Voter Id is linked to some other account.<br><br>Try again <a href=\"candidateregister.php\">Register</a>" );
      }
      $filename  = basename($_FILES['image']['name']);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $new       = md5($filename).'.'.$extension;
    $insertname = "uploads/".time()."-{$new}";
    move_uploaded_file($_FILES['image']['tmp_name'], $insertname);
    
    $isCandidate = 1;
      $sql="INSERT INTO tbmembers(first_name, last_name, email, voter_id, password, is_candidate,party_id,file_name) VALUES ('$myFirstName','$myLastName', '$myEmail','$myVoterid', '$newpass', '$isCandidate', '$myParty', '$insertname')";
    $result = $mysqli->query($sql)  or die(mysqli_error());
    
    
    
    $result = $mysqli->query("UPDATE `tbmembers` SET `is_candidate` = '1' WHERE `tbmembers`.`voter_id` = '$myVoterid'");
    
    $result = $mysqli->query( "SELECT member_id from tbmembers where voter_id='$myVoterid' and is_candidate='1'" );
        $count=mysqli_num_rows($result);
      
      $curr_member_id = 1;  
    if($count == 1){
          $user = mysqli_fetch_assoc($result);
      $curr_member_id = $user['member_id'];
      }

    die( "You have registered for an account.Please wait for an admin to approve it.<br><br>Return to, <a href=\"candidatelogin.php\">Login Page </a>" );
    }
    
  ?>
</div> 
    <table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" enctype="multipart/form-data" action="candidateregister.php" onSubmit="return registerValidate(this)">
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
    <td style="color:#000000"; width="40%">Party Name</td>
    <td style="color:#000000"; width="6">:</td>
    <td style="color:#000000"; >
      <select name="party_name" style="width: 61%">
        <?php
          $result = $mysqli->query("SELECT * FROM party WHERE 1");
          while ($row = mysqli_fetch_array($result)){
            echo "<option value='".$row['party_id']."'>".$row['party_name']."</option>";
          }
        ?>
      </select>
    </td>
  </tr>


  
  <tr>
  <td style="color:#000000"; width="120" >Voter Id</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="voter_id" type="text" ></td>
  </tr>

  <tr>
    <td style="color:#000000"; >Voter ID Image</td>
    <td style="color:#000000"; >:</td>
    <td style="color:#000000"; ><input type="file" name="image"></td>
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
<br>Already have an account? <a href="candidatelogin.php"><b>Login Here</b></a>
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
          Name        : Hariet <br>
          University  : Meru university <br>
         
          </p>
          </address>
        </li>
      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
       
        <li><i class="fa fa-phone"></i> +254745534836<br>
          +254745534836</li>


      </ul>
    </div>

    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">
        
        <li><i class="fa fa-envelope-o"></i> riengsteve@gmail.com </li>
     <li><i class="fa fa-envelope-o"></i> vstvmwg@gmail.com </li>

      </ul>
    </div>



  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
  
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">Mr. Steve</a></p>
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