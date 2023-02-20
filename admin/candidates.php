<?php
    session_start();
    require('../connection.php');
    if(empty($_SESSION['admin_id'])){
      header("location:access-denied.php");
    } 
    $mysqli = new mysqli("localhost", "root", "", "poll");
    $result = $mysqli->query("SELECT * FROM tbmembers WHERE voter_status = '0'"); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>


<?php
if (isset($_POST['Submit']))
{

    $newCandidateName = addslashes( $_POST['name'] ); 
    $newCandidatePosition = addslashes( $_POST['position'] ); 
    

    $sql = $mysqli->query( "INSERT INTO tbcandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" )
            or die("Could not insert candidate at the moment". mysqli_error() );


     header("Location: candidates.php");
    }
?>

<?php

     if (isset($_GET['id']))
     {

     
       $id = $_GET['id'];
       $status =$_GET['status'];
	   $type =$_GET['type'];
	   if($type == 'candi')
	   {
		   $mysqli->query( "UPDATE tbmembers SET candi_status='$status' WHERE member_id='$id'");
	   }
	   else if($type == 'voter')
	   {
		   $mysqli->query( "UPDATE tbmembers SET voter_status='$status' WHERE member_id='$id'");
	   }
	   
       if($status==1)
            header("Location: candidates.php?approval=success");
        else
            header("Location: candidates.php?approval=denied");
     
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
            <li><a href="elections.php">Elections</a></li>
            <li class="active"><a href="candidates.php">Approve Users</a></li>
            <li><a href="results.php">Results</a></li> 
          </ul>
        </li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>

<div >
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE VOTERS FOR APPROVAL</h3></CAPTION>
<tr>
<th>Voter ID</th>
<th>Voter Name</th>
<th>Voter Email</th>
</tr>

<?php
    
    while ($row = mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['voter_id']."</td>";
    echo "<td>" . $row['first_name'].' '.$row['last_name']."</td>";
    echo "<td>" . $row['email']."</td>";
    echo '<td style="color:#000000"><a href="candidates.php?id=' . $row['member_id'] . '&status=1&type=voter">Approve Voter</a></td>';
    echo '<td style="color:#000000"><a href="candidates.php?id=' . $row['member_id'] . '&status=-1&type=voter">Deny Voter</a></td>';
	echo "</tr>";
    }
?>

</table>

<hr>
<table border="1" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES FOR APPROVAL</h3></CAPTION>
<tr>
<th>Candidate Name</th>
<th>Candidate Email</th>
<th>Voter ID</th>
<th>Voter ID Image</th>
</tr>

<?php
	

			$result = $mysqli->query("SELECT * FROM tbmembers WHERE candi_status = '0' AND is_candidate = '1'");
  
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
  
    while ($row= mysqli_fetch_array($result)){
		$curr_member = $row['member_id'];
	$sql2="SELECT * from tbcandidates where member_id='$curr_member'";	
	$result2 = $mysqli->query($sql2);
    $count=mysqli_num_rows($result2);
      
		$fileName = "default";
	    if($count == 1){
          $user = mysqli_fetch_assoc($result2);
		  $fileName = $user['file_name'];
	    }
	
		
	echo "<tr>";
    echo "<td style='color:#000000'>" . $row['first_name'].' '.$row['last_name']."</td>";
    echo "<td style='color:#000000'>" . $row['email']."</td>";
	echo "<td style='color:#000000'>" . $row['voter_id']."</td>";
	echo "<td style='color:#000000'><a href='../" . $fileName  . "'>View</a></td>";
    echo '<td style="color:#000000"><a href="candidates.php?id=' . $row['member_id'] . '&status=1&type=candi">Approve Candidate</a></td>';
    echo '<td style="color:#000000"><a href="candidates.php?id=' . $row['member_id'] . '&status=-1&type=candi">Deny Candidate</a></td>';
	echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);

?>

</table>
	<?php
	if($_GET['approval'] == 'success')
	{
    ?>
		<h4 align="center">Approved</h4>
		<?php
	}
	?>
	<?php
	if($_GET['approval'] == 'denied')
	{?>
		<h4 align="center">Denied</h4>
		<?php
	}?>
<hr>
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