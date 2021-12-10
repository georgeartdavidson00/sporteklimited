<?php
require __DIR__ ."/database_credentials_test.php";
//geting team id
$getid = $_GET["id"] ;
$sql = "SELECT * FROM TEAM where TEAM_ID = '$getid'";
$results = $conn->query($sql);
//fetching the team id
$team = $results->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
   <link href="../css/styles.css" rel="stylesheet" />
   <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
   <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
   <link href="../css/styles.css" rel="stylesheet" />

<style>
body {
  
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  background-image:url("../images/teamimg.jpeg") no-repeat center center fixed;
  background-size: cover;
  background-position: center;
}

.navbar {
  overflow: hidden;
  background-color: white;
}

.navbar a {
  float: inline-end;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: inline-end;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {

  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
.teamtext{
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  font-size: 30px;
  color: white;
  margin-top: 350px;
  
}
.footer {
  text-align: center;
  font-size: 0.9rem;
  font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  background-color: white;
  margin-top: 1000px;
}


</style>
</head>
<body>
  <span id="team-id" hidden data-id="<?php echo $team["TEAM_ID"] ?>"></span>
  

<div class="navbar">
<img src="<?php echo '../images/'.$team["TEAM_ID"].'.png' ?>" alt="Team loGO" style="width:60px;height:60px; ">


 <a href="#news"> Team Stadium</a>
  <a href="<?php echo 'players.php?id='.$team["TEAM_ID"] ?>">Players</a>
  <a href="#news">Team Rank</a>
  <a href="#news">Team Sponsor</a>
  <a href="<?php echo 'coachingstaff.php?id='.$team["TEAM_ID"] ?>"> Coaching Staff</a>
  <button class ="finances"onclick="history.back()">Back</button>


  
</div> 
 
<center>
<div class="teamtext">
<h1>Welcome to <?php echo $team["TEAM_NAME"] ?> Football Club !!</h1>
<h4>One Team-One Dream-One Town </h4>


</div>

</center>

 
<footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2021</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
<script src="../javascript/teams.js"></script>
</body>

</html>

