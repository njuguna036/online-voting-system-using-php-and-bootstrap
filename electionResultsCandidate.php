<?php
    session_start();
 $mysqli = new mysqli("localhost", "root", "", "poll");
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
        <li><a href="candidate.php">Home</a></li>
        <li class="active"><a class="drop" href="#">Candidate Panel</a>
          <ul>
            <li><a href="votecandidate.php">Vote</a></li>
            <li><a href="manage-profile-candidate.php">Profile</a></li>
      <li class="active"><a href="electionResultsCandidate.php">View Election Results</a></li>
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

    <center>
  <h2 class="font-x3 uppercase btmspace-80 underlined"> Election <a href="#">Results</a></h2>
    </center>
  <ul class="nospace group">
        <table border="0" width="100%" align="center">
            <CAPTION><h3>COMPLETED ELECTIONS</h3></CAPTION>
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
                echo "<td style='color:#0000ff'>" . $row['election_id']."</td>";
                echo "<td style='color:#0000ff'>" . $row['election_name']."</td>";
                echo "<td style='color:#0000ff'>" . $row['reg_date']."</td>";
                echo "<td style='color:#0000ff'>" . $row['start_date']."</td>";
                echo "<td style='color:#0000ff'>" . $row['end_date']."</td>";
                echo '<td><a href="electionResultsCandidate.php?election_id=' . $row['election_id'] .'">Show Results</a></td>';
                echo "</tr>";
                }
            ?>

        </table>
      <li class="one_half">
      <?php if (isset($_GET['election_id'])) { 
       $election_id = $_GET['election_id'];
       $result = $mysqli->query("SELECT * FROM tbcandidates WHERE election_id = '$election_id'");
       $count = mysqli_num_rows($result);
       if ($count == 0) {
           echo '<script>alert("No candidates found for the election")</script>';
           die();
       }
       $name = [];
       $votes = [];
     $max_votes=0;
     $max_vote_member_index=-1;
       $i=-1;
       while ($row = mysqli_fetch_array($result)){
            $candidate = $row['candidate_id'];
            $election = $row['election_id'];
            $res = $mysqli->query("SELECT * FROM tbmembers WHERE member_id = '$candidate'");
            while ($r = mysqli_fetch_array($res)){
                $name[++$i] = $r['first_name'].' '.$r['last_name'];
            }

            $res2 = $mysqli->query("SELECT * FROM tbvote WHERE election_id = '$election' AND candidate_id = '$candidate'");
            $votes[$i] = mysqli_num_rows($res2);
      if($votes[$i] > $max_votes)
      {
        $max_votes = $votes[$i];
        $max_vote_member_index = $i;
      }
        }
        
        ?><table border="0" width="100%" align="center" style="margin-left: 120px">
            <CAPTION><h3>ELECTION RESULTS</h3></CAPTION>
            <tr>
            <th>Candidate ID</th>
            <th>Votes Received</th>
            </tr>

            <?php
                for($j=0;$j<=$i;$j++){
                    if($j == $max_vote_member_index)
          {
            echo "<tr>";
            echo "<td style='color:#00ff00'>" . $name[$j]."</td>";
            echo "<td style='color:#00ff00'>" . $votes[$j]."</td>";
            echo "</tr>";
          }
          else
          {
            echo "<tr>";
            echo "<td style='color:#000000'>" . $name[$j]."</td>";
            echo "<td style='color:#000000'>" . $votes[$j]."</td>";
            echo "</tr>";
          }
                }
            ?>

        </table>
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
          University  : Meru univeristy <br>
        
          </p>
          </address>
        </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Phone</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-phone"></i> +2549650469951</li>
        <li><i class="fa fa-phone"></i> +2547065448544</li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="title">Email</h6>
      <ul class="nospace linklist contact">  
        <li><i class="fa fa-envelope-o"></i>riengsteve@gmail.com </li>
        <li><i class="fa fa-envelope-o"></i> stvennjuggunam@yahoo.com </li>
      </ul>
    </div>

  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2019 - All Rights Reserved - <a href="#">Hariet</a></p>
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