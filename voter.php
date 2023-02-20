<?php
  require('connection.php');

  session_start();
  if(empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
?>


<!DOCTYPE html>

<html>
<head>
<title>online voting </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

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
        <li class="active"><a href="voter.php">Home</a></li>
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">View profile</a></li>
      <li><a href="viewcandidates.php">View Candidates</a></li>
      <li><a href="viewparties.php">View Parties</a></li>
      <li><a href="electionResults.php">View Election Results</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>

  </header>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
 <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Welcome <a href="#">Voter</a></marquee></h2></center>
    
  <ul class="nospace group">
      <li class="one_half first">
        <blockquote> <div id="container">
    <p> Dear Voter,</p>
    <p>Welcome to Online Voting System</p>
    </div> </blockquote>
      
      </li>
      
    </ul>
  </section>
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
        <li><i class="fa fa-phone"></i> +254745534836</li>
        <li><i class="fa fa-phone"></i> +254745534836</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">  
        <li><i class="fa fa-envelope-o"></i> riengsteve@gmail.com </li>
        <li><i class="fa fa-envelope-o"></i> stvmwg661@gmail.com </li>
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