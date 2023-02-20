<?php
    session_start();
    require('connection.php');
 $mysqli = new mysqli("localhost", "root", "", "poll");
    if(empty($_SESSION['member_id'])){
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
         $milestones = $row['milestones'];
     $sql = "SELECT c.milestones FROM tbcandidates c, tbmembers t WHERE c.member_id = '$_SESSION[member_id]' AND t.member_id = c.member_id";
    
     }
?>

<?php

     if (isset($_GET['milestones']))
     {

       $milestones = $_GET['milestones'];
  
         $result =  $mysqli->query("UPDATE tbmembers SET milestones='$milestones' WHERE member_id = '$_SESSION[member_id]'")
         or die("The candidate does not exist ... \n"); 
         header("Location: manage-profile-candidate.php");
     
     }
   else if (isset($_GET['id']))
     {


       $id = $_GET['id'];
  
         $result =  $mysqli->query("UPDATE tbmembers SET is_candidate = '1' WHERE member_id='$id'")
         or die("The candidate does not exist ... \n"); 

         header("Location: manage-profile-candidate.php");
     
     }
     
     else if (isset($_GET['election_id']))
     {


       $election_id = $_GET['election_id'];
  
         $result =   $mysqli->query( "INSERT INTO tbcandidates(candidate_id, election_id) VALUES ('$_SESSION[member_id]','$election_id')" )
         or die("The candidate does not exist ... \n"); 
    
         header("Location: manage-profile-candidate.php");
     
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
        <li><a href="candidate.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li><a href="votecandidate.php">Vote</a></li>
            <li class="active"><a href="manage-profile-candidate.php">Profile</a></li>
      <li><a href="electionResultsCandidate.php">Election Results</a></li>
      <li><a href="candidateRegisterElection.php">Register in Election</a></li>
          </ul>
        </li>
        
        <li><a href="candidatelogout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>


<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
   <center> <h2 class="font-x3 uppercase btmspace-80 underlined"> Candidate <a href="#">Profile</a></h2></center>
  <ul class="nospace group">
        <blockquote>
            <table border="0" width="620" align="center">
            <CAPTION><h3>MY PROFILE</h3></CAPTION>
            <form>
            <br>
            <tr><td></td><td></td></tr>
            <tr>
                <td style="color:#000000" width="100%"; >Id:</td>
                <td style="color:#000000"; ><?php echo $stdId; ?></td>
            </tr>
            <tr>

                <td style="color:#000000"; >First Name:</td>
                <td style="color:#000000"; ><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Last Name:</td>
                <td style="color:#000000"; ><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Email:</td>
                <td style="color:#000000"; ><?php echo $email; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Voter Id:</td>
                <td style="color:#000000"; ><?php echo $voter_id; ?></td>
            </tr>
             <tr>
                <td style="color:#000000"; >Milestones:</td>
                <td style="color:#000000"; ><?php echo $milestones; ?></td>
            </tr>
            <tr>
                <td style="color:#000000"; >Password:</td>
                <td style="color:#000000"; >Encrypted</td>
            </tr>
            <tr>
                <td style="color:#000000"; >Candidate Status:</td>
                <?php
                  if($is_candidate == 0){
  echo '<td style="color:#000000";><a href="manage-profile-candidate.php?id=' . $row['member_id'].'">Register as Candidate</a></td>';
                  }
                  else if($candi_status == 1){
                    echo '<td style="color:#000000";>You are a candidate</td>';

                  }
                  else if($candi_status == 0){
                    echo '<td style="color:#000000";>Approval pending from admin</td>';
                  }
                ?>
            </tr>
             <?php if($candi_status == 1){ ?>
            <tr>
                <td style="color:#000000"; >Milestones:</td>
                <td style="color:#000000"; >
                   <form action="manage-profile-candidate.php" method="GET">
                   <textarea style="color:#000000"; font-weight:bold;" name="milestones" maxlength="5000" rows="4" cols="50" minlength="1"><?php echo $milestones;?></textarea>
                   <input type="submit" value="Submit your milestones" >
                   </form>
                </td>
            </tr>
          <?php } ?>
            </table>
                  <hr>

            </form>
             <center>
      <br> <a href="changePasswordCandidate.php"><b>Change Password</b></a>
      </center>

        </blockquote>
   
      
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
          University  : Meru University<br>
          
          </p>
          </address>
        </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-phone"></i> +254745534836</li>
        <li><i class="fa fa-phone"></i> +254 7065448544</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">  
        <li><i class="fa fa-envelope-o"></i> riengsteve@gmail.com </li>
        <li><i class="fa fa-envelope-o"></i> stvmwg@gmail.com </li>
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