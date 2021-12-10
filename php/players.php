<?php

require __DIR__ ."/database_credentials_test.php";
//geting team id


$successful = false;
$getid = $_GET["id"]; 



if (isset($_POST["teamID"])){
  $getid = $_POST["teamID"];
}

$sql2 = "SELECT * FROM TEAM where TEAM_ID = '$getid'";
$results = $conn->query($sql2);
//fetching the team id
$team = $results->fetch_assoc();

if (isset($_POST["deletebtn"])){
  $playerID = $_POST["playerID"];
  $personID = $_POST["personID"];
  $ratingID = $_POST["ratingID"];
    //delete players from person , player and rating tables
  $deleteplayers = "DELETE FROM PLAYERS where PLAYER_ID= $playerID";
  $deletepersons = "DELETE FROM PERSON where PERSON_ID = $personID";
  $deleteratings = "DELETE FROM RATING where RATING_ID = $ratingID";

  $results2 = $conn->query($deleteratings);
  echo $conn->error;
  $results = $conn->query($deleteplayers);

  echo $conn->error;
  $results1 = $conn->query($deletepersons);
  echo $conn->error;

  if ($results2 && $results && $results1){
    $successful = true; 
  } 
}

  $sql = "SELECT * FROM PLAYERS PL JOIN PERSON P ON PL.PERSON_ID=P.PERSON_ID JOIN RATING R ON PL.PLAYER_ID=R.PLAYER_ID where TEAM_ID = '$getid'";
  $results = $conn->query($sql);
  //fetching the team id
  $players = $results-> fetch_all(MYSQLI_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link rel="stylesheet" type="text/css" href="../css/players.css">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- <link href="../css/styles.css" rel="stylesheet" /> -->

    

  
</head>
<body>
<div class="navbar">
<img src="<?php echo '../images/'.$team["TEAM_ID"].'.png' ?>" alt="Team loGO" style="width:60px;height:60px; ">

 <p> <?php echo $team["TEAM_NAME"] ?> Football Club </p>
 <a href="../webforms/addplayer.php"> Add a Player</a>
 <button class ="finances"onclick="history.back()">Back</button>



  
</div>
  <?php if($successful) { ?>
    <div class="notification">
      <span>Player deleted sucessfully</span>
      <span id="notification-close">X</span>
    </div>
  <?php } ?>
<div class="row">
  
  <?php foreach($players as $player) { ?>
    <div class="col-sm-3">

    <div class="card" style =  "width: 18rem; height: 35rem;">
    <img class="card-img-top" src="../images/playericon.png" alt="Card image cap" style="width:250px;height:250px;"> 
      <div class="card-body">
        <h5 class="card-title"><?php echo $player["PERSON_NAME"] ?></h5>
        <p class="card-text"> <b>Overall Rating:</b> <?php echo $player["OVERALL_RATING"] ?></p>
        <p class="card-text"> <b>Nationality:</b> <?php echo $player["NATIONALITY"] ?></p>
        <p class="card-text"><b>Date of Birth:</b> <?php echo $player["DOB"] ?></p>
        <p class="card-text"><b>Player Position:</b> <?php echo $player["PLAYER_POSITION"] ?></p>

        <form method="POST" action="players.php">
        <input type="submit"  name = "deletebtn"  id = "deletebtn"class="btn btn-primary" value="Delete Player"  >
        <input type="text" name = "playerID" value="<?php echo $player["PLAYER_ID"] ?>" hidden >
        <input type="text" name = "personID" value="<?php echo $player["PERSON_ID"] ?>"  hidden>
        <input type="text" name = "ratingID" value="<?php echo $player["RATING_ID"] ?>" hidden>
        <input type="text"  name = "teamID"  value = "<?php echo $getid ?>" hidden>

        </form>


        <a href="<?php echo '../webforms/addplayer.php?id='.$player["PLAYER_ID"] ?>"  id = "editbtn"class="btn btn-primary"> Edit Player</a> 
        
      </div>
    </div>

    </div> 
      
     <?php } ?>
    
</div>
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

<script src="../javascript/player.js"></script>
</body>
</html>
