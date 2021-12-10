<?php

require __DIR__ ."/database_credentials_test.php";
//geting team id
$getid = $_GET["id"] ;
$sql = "SELECT * FROM COACHING_STAFF PL JOIN PERSON P ON PL.PERSON_ID=P.PERSON_ID where TEAM_ID = '$getid'";
$results = $conn->query($sql);
//fetching the team id
$coachingstaffs = $results-> fetch_all(MYSQLI_ASSOC);


$sql2 = "SELECT * FROM TEAM where TEAM_ID = '$getid'";
$results = $conn->query($sql2);
//fetching the team id
$team = $results->fetch_assoc()



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
</head>
<body>
<div class="navbar">
<img src="<?php echo '../images/'.$team["TEAM_ID"].'.png' ?>" alt="Team loGO" style="width:60px;height:60px; ">

 <p> <?php echo $team["TEAM_NAME"] ?> Football Club </p>
 <a href="#news"> Add a Coach</a>



  
</div> 
<div class="row">
  <!-- for loop to create coaches card dynamically -->
  <?php foreach($coachingstaffs as $coachingstaff) { ?>
    <div class="col-sm-3">

    <div class="card" style =  "width: 18rem; height: 35rem;">
    <img class="card-img-top" src="../images/coachingbg.png" alt="Card image cap" style="width:286px;height:250px;"> 
      <div class="card-body">
        <h5 class="card-title"><?php echo $coachingstaff["PERSON_NAME"] ?></h5>
        <p class="card-text"> <b>Email:</b> <?php echo $coachingstaff["EMAIL"] ?></p>
        <p class="card-text"> <b>Nationality:</b> <?php echo $coachingstaff["NATIONALITY"] ?></p>
        <p class="card-text"><b>Date of Birth:</b> <?php echo $coachingstaff["DOB"] ?></p>
        <p class="card-text"><b>Player Position:</b> <?php echo $coachingstaff["COACHING_POSITION"] ?></p>
        <a href="#" id = "deletebtn"class="btn btn-primary"> Delete Coach</a> <a href="#"  id = "editbtn"class="btn btn-primary"> Edit Coach</a> 
        
      </div>
    </div>

    </div>
      
     <?php } ?>
    
</div>
</body>
</html>
