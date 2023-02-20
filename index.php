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
      <h1><a href="#">Meru University Voting System</a></h1>
    </div>
   
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="admin/index.php">Admin</a></li>
        <li><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
            
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


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/youth.jpg');">
  <section id="testimonials" class="hoc container clear"> 
   
    <h2 class="font-x3 uppercase btmspace-80 "<a href="#"> YOUR VOTE IS YOUR VOICE</a></h2>
  <div class="container">
  <div class="col-sm-8 col-sm-offset-2" >
    <div class="news"><h2><marquee scrolldelay="200">Welcome to Meru Online Voting system vote before the time is over    <br> Register for voting and wait for the admin to approve your account <br> vote your favourite candiadte with the favourite party </marquee></h2></div>
  </div>
  </div>
    <blockquote>
  <ul class="nospace group">
      <li class="one_half"><marquee behavior="scroll" direction="left" scrolldelay="200">
        Hope you will enjoy coz we trust and we care at hariet online votes
    </marquee></li> 
    <br>
    
    </ul>

        
  </section>

                              
</div>
 <div class="wrapper row4">
 <?php
    include 'includes/footer.php';
 ?>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_right">Developed for <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">Software Engineering Project</a></p>
   
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