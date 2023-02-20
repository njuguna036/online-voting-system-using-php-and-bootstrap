<?php
      
    session_start();

   $myusername = isset($_SESSION['nam'])?$_SESSION['nam']:"" ;
    $mypassword = isset($_SESSION['pas'])?$_SESSION['pas']:"" ;
?>
<?php
      if(isset($_COOKIE['$email']) && $_COOKIE['$pass']){
          header("Location:admin.php");
          exit;
      }
?>

<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="#">MERU UNIVERSITY VOTING SYSTEM</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Admin</a></li>
    <li ><a href="../index.php">Welcome Page</a></li>
      </ul>
    </nav>
  </header>
</div>


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
  <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>Admin <a href="#">Login</a></marquee></h2></center>
    <ul class="nospace group">
      <li class="one_half">
        <blockquote>

<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)">
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
<center>
</blockquote>

</form>
</tr>
</table>

<center>      
Want to go back?  <a href="../index.php"><b>Click Here</b></a> to return to Welcome Page
<br>
</center>
        
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
          Name        : hariet  <br>
          University  : Meru university<br>
          
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
        <li><i class="fa fa-envelope-o"></i> wert@gmail.com </li>
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