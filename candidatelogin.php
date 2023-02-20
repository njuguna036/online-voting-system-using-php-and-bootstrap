
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
        <li ><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="registeracc.php">Registration</a></li>
            
          </ul>
        </li>
        
    <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li class="active"><a href="candidatelogin.php">Login</a></li>
            <li><a href="candidateregister.php">Registration</a></li>
            
          </ul>
        </li>
    
      </ul>
    </nav>
    
   
  </header>
</div>


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
    
      
  <div class="container">
   <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Candidate <a href="#">Login</a></marquee></h2></center>
        <div class="row" >
             <div class="col-sm-4 col-sm-offset-4 bg-info" style="background-color:#92a8d1;"  ><br>
        <h4 class="text text-center  alert bg-primary">Candidate Login</h4> 

<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="checklogincandidate.php" onSubmit="return loginValidate(this)">
<td>
<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
<tr>
<td style="color:#000000"; width="78" >Email</td>
<td style="color:#000000"; width="6">:</td>
<td style="color:#000000"; width="294"><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
<td style="color:#000000"; >Password</td>
<td style="color:#000000"; >:</td>
<td style="color:#000000"; ><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="color:#000000";><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
</div>
<center>
<br>Not yet registered? <a href="candidateregister.php"><b>Register Here</b></a>
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