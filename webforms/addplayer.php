<?php 
 require "../php/database_credentials_test.php";
//require "./database_credentials_test.php";
session_start();
$user = $_SESSION["user"];

if ($user ==null ){
    header( 'Location: login.php');
}
$personID= "";
$playerID = "";
$editID= "";
$playerdata = "";
$ratingID= "";
//edit
if (isset($_GET["id"])){
    $editID = $_GET["id"];
    $sql = "SELECT * FROM PLAYERS PL JOIN PERSON P ON PL.PERSON_ID=P.PERSON_ID JOIN RATING R ON PL.PLAYER_ID=R.PLAYER_ID where PL.PLAYER_ID = '$editID'";
    $results = $conn -> query($sql);

    $playerdata =  $results ->fetch_assoc();
}


if (isset($_POST["SubmitButton"])){
    $playername= $_POST['pname'];
    $DOB= $_POST['DOB'];
    $nationality= $_POST['nationality'];
    $telephone= $_POST['telephone'];
    $email= $_POST['email'];
    $weight= $_POST['weight'];
    $height= $_POST['height'];
    $playerposition= $_POST['playerposition'];
    $weeklywage= $_POST['weeklywage'];
    $marketvalue= $_POST['marketvalue'];
    $shirtnumber= $_POST['shirtnumber'];
    $boottype= $_POST['boottype'];
    $contractterm= $_POST['contractterm'];
    $fitness= $_POST['fitness'];
    $playeragent= $_POST['playeragent'];
    $teamname= $_POST['teamname'];
    $careergoals= $_POST['careergoals'];
    $careerassists= $_POST['careerassists'];
    $personalawards= $_POST['personalawards'];
    $overallratings= $_POST['overallratings'];

    if (!($_POST["editID"])) {
        //insert into person table
    $insertperson ="INSERT INTO `PERSON` (`PERSON_NAME`,`DOB`, `NATIONALITY`, `TELEPHONE`, `EMAIL`, `WEIGHT`, `HEIGHT`) VALUES (";
    $insertpersoncont=" '$playername', '$DOB', '$nationality', '$telephone', '$email', '$weight', '$height')";
    $insertperson = $insertperson.$insertpersoncont;
    $results =$conn->query($insertperson);
    if ($results){
        $personID = $conn->insert_id;
    }
    else{
        echo $conn->error;
    }

    //insert into player table 
    $insertplayer = "INSERT INTO `PLAYERS` (`PLAYER_POSITION`,`TEAM_ID`, `PERSON_ID`, `WEEKLY_WAGE`, `MARKET_VALUE`, `SHIRT_NUMBER`, `BOOT_TYPE`,`CONTRACT_TERM`,`FITNESS`,`PLAYER_AGENT`) VALUES (";
    $insertplayercont=" '$playerposition', '$teamname', '$personID', '$weeklywage', '$marketvalue', '$shirtnumber', '$boottype' ,'$contractterm','$fitness','$playeragent')";
    $insertplayer = $insertplayer.$insertplayercont;
    $results =$conn->query($insertplayer);
    if ($results){
        $playerID = $conn->insert_id;
    }
    else{
        echo $conn->error;
    }
    //insert into rating table
    $insertrating = "INSERT INTO `RATING` (`PLAYER_ID`,`CAREER_GOALS`, `CAREER_ASSISTS`, `PERSONAL_AWARDS`, `OVERALL_RATING`) VALUES (";
    $insertratingcont=" '$playerID', '$careergoals', '$careerassists', '$personalawards', '$overallratings')";
    $insertrating = $insertrating.$insertratingcont;
    $results =$conn->query($insertrating);
    if ($results){
        header("Location:../php/players.php?id=$teamname");
    }

    else{
        echo $conn->error;
    } 

    }

    else {
        $personID = $_POST["personID"];
        $playerID = $_POST["playerID"];
        $ratingID = $_POST["ratingID"];
       
        //check id when u resume to check the error 
        $updateperson = "UPDATE PERSON SET PERSON_NAME = '$playername', DOB = '$DOB', NATIONALITY = '$nationality' , TELEPHONE = '$telephone',EMAIL = '$email',";
        $updatepersoncont = "WEIGHT = '$weight', HEIGHT = '$height' WHERE PERSON_ID='$personID'";
        $updateperson = $updateperson.$updatepersoncont;

        $results = $conn->query($updateperson);
        if ($results){
            $updateplayer = "UPDATE PLAYERS SET PLAYER_POSITION = '$playerposition', TEAM_ID = '$teamname' , WEEKLY_WAGE = '$weeklywage',MARKET_VALUE = '$marketvalue', ";
            $updateplayercont = "SHIRT_NUMBER = '$shirtnumber', BOOT_TYPE = '$boottype' , CONTRACT_TERM = '$contractterm' , FITNESS = '$fitness' , PLAYER_AGENT = '$playeragent' WHERE PLAYER_ID='$playerID'";
            $updateplayer = $updateplayer.$updateplayercont;
            $results = $conn->query($updateplayer);
            if ($results){
                $updaterating = "UPDATE RATING SET  CAREER_GOALS = '$careergoals', CAREER_ASSISTS = '$careerassists' , PERSONAL_AWARDS= '$personalawards',OVERALL_RATING = '$overallratings' WHERE RATING_ID ='$ratingID' ";
                $results = $conn->query($updaterating);
                if($results){
                    header("Location:../php/players.php?id=$teamname");
                }
                else {
                    echo $conn->error;
                }

            }
            else {
                echo $conn->error;
            }

        }
        else {
            echo $conn->error;
        }




       


    
    }

   

    

  







}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Add Player</title>
</head>
<body>
<form class="row container m-auto"  action="addplayer.php" method="post" enctype="multipart/form-data">


<div class="col-6 d-flex flex-column">
         <input value="<?php echo $editID ? $editID : '' ?>" type="text" id="editID" name="editID"   hidden>
         <input value="<?php echo $playerdata ? $playerdata["PERSON_ID"] : '' ?>" type="text"  name="personID"   hidden>
         <input value="<?php echo $playerdata ? $playerdata["PLAYER_ID"] : '' ?>" type="text"  name="playerID"   hidden>
         <input value="<?php echo $playerdata ? $playerdata["RATING_ID"] : '' ?>" type="text"  name="ratingID"   hidden>

         
     </div>
     
     <h6> Player Information </h6>
     <div class="col-6 d-flex flex-column">
         <label for="pname">Player name:</label>
         <input  value = "<?php echo $playerdata ? $playerdata["PERSON_NAME"] : '' ?>" type="text" id="pname" name="pname" onInput="validatePname()">
         <span id="perror"></span>
     </div>
     
 
     <div class="col-6 d-flex flex-column">
         <label for="DOB">Date of Birth:</label>
         <input value = "<?php echo $playerdata ? $playerdata["DOB"] : '' ?>" type="date" id="DOB" name="DOB" onInput="validateDate()" ><br>
         <span id="derror"></span>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="nationality">Nationality</label>
         <input  value = "<?php echo $playerdata ? $playerdata["NATIONALITY"] : '' ?>"   type="text" id="nationality" name="nationality" onInput="validateN()" >
         <span id="nerror"></span>
     </div>

     <div class="col-6 d-flex flex-column">
         <label for="telephone">Telephone</label>
         <input  value = "<?php echo $playerdata ? $playerdata["TELEPHONE"] : '' ?>"  type="tel" id="telephone" name="telephone" onInput="validateT()"  >
         <span id="terror"></span>
     </div>


 
     <div class="col-6 d-flex flex-column">
             <label for="email">Email:</label>
             <input  value = "<?php echo $playerdata ? $playerdata["EMAIL"] : '' ?>"  type="email" id="email" name="email" onInput="validateE()" ><br>
             <span id="emailerror"></span>
     </div>   
 
     <div class="col-6 d-flex flex-column">
         <label for="weight">Weight:</label>
         <input value = "<?php echo $playerdata ? $playerdata["WEIGHT"] : '' ?>"  type="number" id="weight" name="weight" onInput="validateW()" step="0.01"><br>
         <span id="werror"></span>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="height">Height:</label>
         <input value = "<?php echo $playerdata ? $playerdata["HEIGHT"] : '' ?>" type="number" id="height" name="height" onInput="validateH()" step="0.01"><br>
         <span id="herror"></span>
     </div>
 
     
 
     <div class="col-6 d-flex flex-column">
         <label for="playerposition">Player Position:</label>
         <input  value = "<?php echo $playerdata ? $playerdata["PLAYER_POSITION"] : '' ?>" type="text" id="playerposition" name="playerposition" onInput="validatePOS()"><br>
         <span id="poerror"></span>
 
     </div>
 
     
 
      
 
     
    <div class="col-6 d-flex flex-column">
             <label for="weeklywage"> Weekly Wage</label>
             <input value = "<?php echo $playerdata ? $playerdata["WEEKLY_WAGE"] : '' ?>" type="number" id="weeklywage" name="weeklywage"  onInput="validateWW()" step="0.01"><br>
             <span id="wwerror"></span>
 
 
     </div>
     
     <div class="col-6 d-flex flex-column">
         <label for="marketvalue">Market Value:</label>
         <input value = "<?php echo $playerdata ? $playerdata["MARKET_VALUE"] : '' ?>" type="number" id="marketvalue" name="marketvalue" onInput="validateM()" step="0.01"><br>
         <span id="merror"></span>
     </div>
 
 
     <div class="col-6 d-flex flex-column">
         <label for="shirtnumber">Shirt Number :</label>
         <input value = "<?php echo $playerdata ? $playerdata["SHIRT_NUMBER"] : '' ?>" type="number" id="shirtnumber" name="shirtnumber" onInput="validateS()" ><br>
         <span id="clerror"></span>
     </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="boottype">Boot Type:</label>
         <input  value = "<?php echo $playerdata ? $playerdata["BOOT_TYPE"] : '' ?>" type="text" id="boottype" name="boottype" onInput="validateBT()">
         <span id="bterror"></span>
     </div>
     
 
 
     <div class="col-6 d-flex flex-column">
         <label for="contractterm">Contract Term:</label>
        <input value = "<?php echo $playerdata ? $playerdata["CONTRACT_TERM"] : '' ?>" type="text" id="contractterm" name="contractterm" onInput="validateCT()"><br>
       <span id="cterror"></span>
     </div>
 
 
     <div class="col-6 d-flex flex-column">
        <label for="fitness"> Fitness:</label>
        <select data-value = "<?php echo $playerdata ? $playerdata["FITNESS"] : '' ?>" name = "fitness" id="fitness"><br>
        <option value = "choose"></option>
        <option value = "INJURY-PRONE" name="INJURY-PRONE">INJURY-PRONE</option>
        <option value = "FULLYFIT" name="FULLYFIT">FULLYFIT</option>
        </select>
    </div>
 
     <div class="col-6 d-flex flex-column">
         <label for="playeragent">Player Agent:</label>
         <input value = "<?php echo $playerdata ? $playerdata["PLAYER_AGENT"] : '' ?>" type="text" id="playeragent" name="playeragent" onInput="validatePA()" ><br>
         <span id="paerror"></span>
     </div>

     <div class="col-6 d-flex flex-column">
        <label for="teamname"> Team Name:</label>
        <select data-value = "<?php echo $playerdata ? $playerdata["TEAM_ID"] : '' ?>" name = "teamname" id="teamname"><br>
        <option value = "choose" selected>    </option>
        <option value = "100" name="Heart of Oak">Heart of Oak</option>
        <option value = "101" name="Asante Kotoko">Asante Kotoko</option>
        <option value = "102" name="Aduana Stars">Aduana Stars</option>
        <option value = "103" name="Karela United">Karela United</option>
        <option value = "104" name="Great Olympics">Great Olympics</option>
        <option value = "105" name="Medeama fc">Medeama fc</option>
        <option value = "106" name="Legon cities">Legon cities</option>
        <option value = "107" name="Ashanti Gold">Ashanti Gold</option>
        <option value = "108" name="Elmina sharks fc">Elmina sharks fc</option>
        <option value = "109" name="King faisal fc">King faisal fc</option>

    
        
        

        </select>
    </div>
    <div class="col-6 d-flex flex-column">
         <label for="careergoals">Career Goals :</label>
         <input value = "<?php echo $playerdata ? $playerdata["CAREER_GOALS"] : '' ?>" type="number" id="careergoals" name="careergoals" onInput="validateCG()" ><br>
         <span id="clerror"></span>
     </div>

     <div class="col-6 d-flex flex-column">
         <label for="careerassits">Career Assists:</label>
         <input value = "<?php echo $playerdata ? $playerdata["CAREER_ASSISTS"] : '' ?>" type="number" id="careerassists" name="careerassists" onInput="validateCA()" ><br>
         <span id="clerror"></span>
     </div>

     <div class="col-6 d-flex flex-column">
         <label for="personalawards">Personal Awards:</label>
         <input value = "<?php echo $playerdata ? $playerdata["PERSONAL_AWARDS"] : '' ?>" type="number" id="personalawards" name="personalawards" onInput="validatePAS()" ><br>
         <span id="clerror"></span>
     </div>

     <div class="col-6 d-flex flex-column">
         <label for="overallratings">Overall Ratings:</label>
         <input value = "<?php echo $playerdata ? $playerdata["OVERALL_RATING"] : '' ?>" type="number" id="overallratings" name="overallratings" onInput="validateOR()" ><br>
         <span id="clerror"></span>
     </div>

     <!-- <div class="col-6 d-flex flex-column">
         <label for="uploadimage">Upload Image :</label>
         <input type="file" id="uploadimage" name="uploadimage" onInput="validateIM()" ><br>
         <span id="clerror"></span>
     </div> -->


 
     
 
 
     <center>
     <div class="col-4 d-flex flex-column">
         <input type="submit"  name="SubmitButton" value="Submit">
     </div>
     </center>
 
     
     <script src="../javascript/formvalidation.js"></script>
     <script src="../javascript/addplayer.js"></script>
     </form>
</body>
</html>