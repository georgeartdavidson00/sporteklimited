<?php
require __DIR__ ."/database_credentials_test.php";

//select info from fincenter and team table
$sql = "SELECT * FROM FINANCIAL_CENTER FC JOIN TEAM TE ON FC.TEAM_ID = TE.TEAM_ID ";
$results = $conn->query($sql);
//fetching all data
$fin_datas = $results->fetch_all(MYSQLI_ASSOC);
session_start();
$user = $_SESSION["user"];

if ($user ==null ){
    header( 'Location: login.php');
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finances</title>
    <link href="../css/finances.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
<button class ="finances"onclick="history.back()">Back</button>
<span id="team-id" hidden data-id="<?php echo $team["TEAM_ID"] ?>"></span>
<!-- Creating table to display items -->
<table>
  <tr>
  <th>TEAMS</th>
    <th>CLUB STATUS</th>
    <th>ANNUAL PROFIT (GHC)</th>
    <th>NET EXPENDITURE (GHC)</th>
  </tr>
  <!-- For loop to showeach row -->
  <?php foreach($fin_datas as $fin_data) { ?>
    <tr>
    <td><?php echo $fin_data["TEAM_NAME"]?></td>
    <td><?php echo $fin_data["CLUB_STATE"]?></td>
    <td><?php echo $fin_data["ANNUAL_PROFIT"]?></td>
    <td><?php echo $fin_data["NET_EXPENDITURE"]?></td>
  </tr>
                         
    <?php } ?>
  
</table>

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
</body>
</html>