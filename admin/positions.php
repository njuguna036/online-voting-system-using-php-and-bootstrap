<?php
	session_start();
	require('connection.php');
	if( empty($_SESSION['admin_id']) ){
	   header("location:access-denied.php");
	} 
	?>
	<?php
	
	if (isset($_POST['Submit']))
	{

	$newParty = addslashes( $_POST['party_name'] ); 
  $newFounder = addslashes( $_POST['founder'] ); 
  $newDateOfFoundation = addslashes( $_POST['date_of_foundation'] ); 

	$sql = $mysqli->query( "INSERT INTO party(party_name, founder, date_of_foundation) VALUES ('$newParty','$newFounder','$newDateOfFoundation ')" )
	        or die("Could not insert party at the moment". mysql_error() );

	   header("Location: positions.php");
	}
?>


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
        <li><a href="admin.php">Home</a></li>
        <li ><a class="drop" href="#">Admin Panel </a>
          <ul>
            <li><a href="manage-admins.php">Manage Admin</a></li>
            <li class="active"><a href="positions.php">Manage Positions</a></li> 
            <li><a href="elections.php">Elections</a></li>
            <li><a href="candidates.php">Approve Users</a></li>
            <li><a href="results.php">Results</a></li> 
          </ul>
        </li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  
    
<div class="container">
   <center><h2 class="font-x3 uppercase btmspace-80 underlined "><marquee>ADD <a href="#">PARTY</a></marquee></h2></center>
        <div class="row" >
             <div class="col-sm-4 col-sm-offset-4 bg-info" style="background-color:#92a8d1;"  ><br>
        <h4 class="text text-center  alert bg-primary">PARTY DETAILS</h4>
    
    
<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="positions.php" onSubmit="return positionValidate(this)">
<td>
<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
<tr>
  <td style="color:#000000"; width="120" >Party Name</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="party_name" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Founder Name</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="founder" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="150" >Date Of Foundation</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="date_of_foundation" type="Date" ></td>
  </tr>
  
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td style="color:#000000";><input type="submit" name="Submit" value="Add Party"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</div>
</div>
<section id="testimonials" class="hoc container clear"> 
    <center>
  <h2 class="font-x3 uppercase btmspace-80 underlined"> View <a href="#">Parties</a></h2>
    </center>
  <ul class="nospace group">
      <li class="one_half first">
        
      </li>
<table border="0" width="620" align="center">
  <tr>
  <th>Party Name</th>
  <th>Party Founder</th>
  <th>Party Date of Foundation</th>
  </tr>

  <?php
    //loop through all table rows
    $sql = "SELECT * FROM party";
    $result = $mysqli->query($sql);
    $count=mysqli_num_rows($result);
    if($count > 0)
    {
      while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td style='color:#000000'>" . $row['party_name']."</td>";
        echo "<td style='color:#000000'>" . $row['founder']."</td>";
        echo "<td style='color:#000000'>" . $row['date_of_foundation']."</td>";
        echo "</tr>";
        
        
      }
      
    }
    
  ?>

  </table>
    </section>

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