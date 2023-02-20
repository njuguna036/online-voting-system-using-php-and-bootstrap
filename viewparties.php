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
        <li ><a href="voter.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Voter Panel</a>
          <ul>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="manage-profile.php">View profile</a></li>
      <li><a href="viewcandidates.php">View Candidates</a></li>
      <li class="active"><a href="viewparties.php">View Parties</a></li>
      <li><a href="electionResults.php">View Election Results</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <center>
  <h2 class="font-x3 uppercase btmspace-80 underlined"> View <a href="#">Parties</a></h2>
    </center>
  <ul class="nospace group">
      <li class="one_half first">
        
      </li>
      
    </ul>
   
  

  <table border="0" width="620" align="center">
  <CAPTION><h3>PARTIES</h3></CAPTION>
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
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="title">Address</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          <p>
          Name        : Hariet <br>
          University  : Meru Univeristy<br>
    
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