<?php
    session_start();
    require('connection.php');
 $mysqli = new mysqli("localhost", "root", "", "poll");
    if(empty($_SESSION['member_id']) || empty($_SESSION['member_id'])){
    header("location:access-denied.php");
  }
  
    $result= $mysqli->query("SELECT * FROM tbmembers WHERE member_id = '$_SESSION[member_id]'")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
    $row = mysqli_fetch_array($result);
    if($row)
     {
       
         $stdId = $row['member_id'];
         $firstName = $row['first_name'];
         $lastName = $row['last_name'];
         $email = $row['email'];
         $voter_id = $row['voter_id'];
         $is_candidate = $row['is_candidate'];
         $candi_status = $row['candi_status'];
         $party_id = $row['party_id'];
     $result2= $mysqli->query("SELECT * FROM tbcandidates c, tbmembers t WHERE c.member_id = '$_SESSION[member_id]' and c.member_id = t.member_id'");
    
     }
?>


<?php
 
     if (isset($_GET['id']))
     {

    
       $id = $_GET['id'];
  
         $result =  $mysqli->query("UPDATE tbmembers SET is_candidate = '1' WHERE member_id='$id'")
         or die("The candidate does not exist ... \n"); 
       
         header("Location: manage-profile-candidate.php");
     
     }
     else if (isset($_GET['election_id']))
     {

    
       $election_id = $_GET['election_id'];
  
         $result =   $mysqli->query( "INSERT INTO tbcandidates(candidate_id,member_id, election_id,party_id) VALUES ('$_SESSION[member_id]','$_SESSION[member_id]','$election_id', '$party_id')" )
         or die("The candidate does not exist ... \n"); 
    
         header("Location: candidateRegisterElection.php");
     
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
        <li ><a href="candidate.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li><a href="votecandidate.php">Vote</a></li>
            <li><a href="manage-profile-candidate.php">Profile</a></li>
      <li><a href="electionResultsCandidate.php">Election Results</a></li>
      <li class="active"><a href="candidateRegisterElection.php">Register in Election</a></li>
          </ul>
        </li>
        
        <li><a href="candidatelogout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
  <center>  
  <h2 class="font-x3 uppercase btmspace-80 underlined"> Register in <a href="#">Election</a></h2>
  <ul class="nospace group">
      <li class="center">  
      <?php if($candi_status == 1){ ?>
 <table border="0" width="620" align="center" style="margin-left: 100px;margin-top: 50px">
<CAPTION><h3>ELECTIONS YOU CAN REGISTER FOR</h3></CAPTION>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
$result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'P'");
$alreadyreg = $mysqli->query("SELECT * FROM tbcandidates WHERE candidate_id = '$_SESSION[member_id]'");
$arr = [];
$i=0;
while ($row = mysqli_fetch_array($alreadyreg)) {
  $arr[$i++]=$row['election_id'];
}
    while ($row = mysqli_fetch_array($result)){
        if(!in_array($row['election_id'], $arr)){
        echo "<tr>";
        echo "<td style='color:#0000ff'>" . $row['election_id']."</td>";
        echo "<td style='color:#0000ff'>" . $row['election_name']."</td>";
        echo "<td style='color:#0000ff'>" . $row['reg_date']."</td>";
        echo "<td style='color:#0000ff'>" . $row['start_date']."</td>";
        echo "<td style='color:#0000ff'>" . $row['end_date']."</td>";
        echo '<td style="color:#0000ff"><a href="candidateRegisterElection.php?election_id=' . $row['election_id'] . '&to=F">Register</a></td>';
        echo "</tr>";
      }
    }
?>

</table>

<table border="0" width="620" align="center" style="margin-left: 100px;margin-top: 50px">
<CAPTION><h3>ELECTIONS YOU HAVE REGISTERED FOR</h3></CAPTION>
<th>Election ID</th>
<th>Election Name</th>
<th>Election Registration End Date</th>
<th>Election Start Date</th>
<th>Election End Date</th>
</tr>

<?php
$result = $mysqli->query("SELECT * FROM tbelections WHERE status = 'P'");
$alreadyreg = $mysqli->query("SELECT * FROM tbcandidates WHERE candidate_id = '$_SESSION[member_id]'");
$arr = [];
$i=0;
while ($row = mysqli_fetch_array($alreadyreg)) {
  $arr[$i++]=$row['election_id'];
}
    while ($row = mysqli_fetch_array($result)){
      if(in_array($row['election_id'], $arr)){
        echo "<tr>";
        echo "<td style='color:#0000ff'>" . $row['election_id']."</td>";
        echo "<td style='color:#0000ff'>" . $row['election_name']."</td>";
        echo "<td style='color:#0000ff'>" . $row['reg_date']."</td>";
        echo "<td style='color:#0000ff'>" . $row['start_date']."</td>";
        echo "<td style='color:#0000ff'>" . $row['end_date']."</td>";
        echo "</tr>";
      }
    }
?>

</table>
</center>
<?php } ?>
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