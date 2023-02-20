<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    } 
    $mysqli = new mysqli("localhost", "root", "", "poll");
    $result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'P'");
  
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>


<?php
if (isset($_POST['Submit']))
{

    $name = addslashes( $_POST['name'] ); 
    $regdate = addslashes( $_POST['regdate'] );
    $startdate = addslashes( $_POST['startdate'] );
    $enddate = addslashes( $_POST['enddate'] );
    
    $sql = $mysqli->query( "INSERT INTO tbelections(election_name,reg_date,start_date,end_date,status) VALUES ('$name','$regdate','$startdate','$enddate','P')" )
            or die("Could not insert candidate at the moment". mysqli_error() );

    }
?>

<?php
  
     if (isset($_GET['id']))
     {

 
       $id = $_GET['id'];
       $to =$_GET['to'];
       $result =  $mysqli->query("UPDATE tbelections SET status = '$to' WHERE election_id='$id'")
         or die("The candidate does not exist ... \n"); 
   
         header("Location: elections.php");
     }
     else
     
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
      <h1><a href="#">ONLINE VOTING SYSTEM</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="admin.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Admin Panel </a>
          <ul>
            <li><a href="manage-admins.php">Manage Admin</a></li>
            <li><a href="positions.php">Manage Positions</a></li> 
            <li class="active"><a href="elections.php">Elections</a></li>
            <li><a href="candidates.php">Approve Users</a></li>
            <li><a href="results.php">Results</a></li> 
          </ul>
        </li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>
<div >
<table style="background-color:powderblue;" width="300" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<form name="form1" method="post" action="elections.php">
<td>
<table style="background-color:powderblue;" width="100%" border="0" cellpadding="3" cellspacing="1" >
  <tr>
  <td style="color:#000000"; width="120" >Election Name</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="name" type="text" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Last Date for Registration</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="regdate" type="date" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Election Start Date</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="startdate" type="date" ></td>
  </tr>

  <tr>
  <td style="color:#000000"; width="120" >Election End Date</td>
  <td style="color:#000000"; width="6">:</td>
  <td style="color:#000000"; width="294"><input name="enddate" type="date" ></td>
  </tr>

  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td style="color:#000000";><input type="submit" name="Submit" value="Create Election"></td>
  </tr>
</table>
</td>
</form>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>PAUSED ELECTIONS</h3></CAPTION>
<tr>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
   
$result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'P'");
    while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['election_id']."</td>";
    echo "<td>" . $row['election_name']."</td>";
    echo "<td>" . $row['reg_date']."</td>";
    echo "<td>" . $row['start_date']."</td>";
    echo "<td>" . $row['end_date']."</td>";
    echo '<td><a href="elections.php?id=' . $row['election_id'] . '&to=S">Start Election</a></td>';
    echo '<td><a href="elections.php?id=' . $row['election_id'] . '&to=C">Cancel Election</a></td>';
    echo '<td><a href="elections.php?id=' . $row['election_id'] . '&to=F">Finish Election</a></td>';
    echo "</tr>";
    }
?>

</table>

<hr>

<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>STARTED ELECTIONS</h3></CAPTION>
<tr>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
    
    $result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'S'");
    while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['election_id']."</td>";
    echo "<td>" . $row['election_name']."</td>";
    echo "<td>" . $row['reg_date']."</td>";
    echo "<td>" . $row['start_date']."</td>";
    echo "<td>" . $row['end_date']."</td>";
    echo '<td><a href="elections.php?id=' . $row['election_id'] . '&to=C">Cancel Election</a></td>';
    echo '<td><a href="elections.php?id=' . $row['election_id'] . '&to=F">Finish Election</a></td>';
    echo "</tr>";
    }
?>

</table>

<hr>

<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>FINISHED ELECTIONS</h3></CAPTION>
<tr>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
    
    $result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'F'");
    while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['election_id']."</td>";
    echo "<td>" . $row['election_name']."</td>";
    echo "<td>" . $row['reg_date']."</td>";
    echo "<td>" . $row['start_date']."</td>";
    echo "<td>" . $row['end_date']."</td>";
    echo "</tr>";
    }
?>

</table>

<hr>

<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>CANCELLED ELECTIONS</h3></CAPTION>
<tr>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
  
$result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'C'");
    while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['election_id']."</td>";
    echo "<td>" . $row['election_name']."</td>";
    echo "<td>" . $row['reg_date']."</td>";
    echo "<td>" . $row['start_date']."</td>";
    echo "<td>" . $row['end_date']."</td>";
    echo "</tr>";
    }
?>

</table>
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