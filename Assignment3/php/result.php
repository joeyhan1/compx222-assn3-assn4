<?php
  ini_set("error_reporting",E_ALL);
  ini_set("log_errors","1");
  ini_set("error_log","../course.html/php_errors.txt");
?>
   
<!DOCTYPE html>
<?php
    //Checking and setting the surname and first name
    if(isset($_COOKIE["sname"])) {
        $sname = $_COOKIE["sname"];
    } else {
        $sname = "";
    }
    if(isset($_COOKIE["fname"])) {
        $fname = $_COOKIE["fname"];
    } else {
        $fname = "";
    }
    //Start session
    session_start();
    //Checking and setting the nhi number
    if(isset($_SESSION['nhi'])) {
        $nhi = $_SESSION['nhi'];
    } else {
        $nhi = "";
    }
    //Current time variable
    $now = time();
    //Checking whether the session has expired
    if($now > $_SESSION['expire']) {
        session_destroy();
        echo '<script>alert("Session expired!")</script>';
    }
?>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>Result Page</title>
	</head>
    <!-- PHP code-->
    <?php
        //Final score variable
        $finalScore = 0;
        //Score variables
        $cnsScore = 0;
        $csScore = 0;
        $rsScore = 0;
        $coagulationScore = 0;
        $liverScore = 0;
        $kidneyScore = 0;
        //Selected value variables
        $varGcs = $_POST["gcsSelect"];
        $varMap = $_POST["mapSelect"];
        $varDopamine = $_POST["dopamineSelect"];
        $varDobutamine = $_POST["dobutamine"];
        $varEpinephrine= $_POST["epinephrineSelect"];
        $varNorepinephrine = $_POST["norepinephrineSelect"];
        $varRespiratory= $_POST["respiratorySelect"];
        $varVentilated = $_POST["ventilatedSelect"];
        $varCogulation = $_POST["cogulationSelect"];
        $varLiver = $_POST["liverSelect"];
        $varKidney = $_POST["kidneySelect"];
        //Calculating score function
        function calcScore($selectedValue) {
            for($counter = 1; $counter < 6; $counter++) {
                if($counter == $selectedValue) {
                    return $counter - 1;
                }
            }
        }
        //Calculating cs score
        if($varDopamine == 4 || $varEpinephrine == 3 || $varNorepinephrine == 3) {
            $csScore = 4;
        } else if($varDopamine == 3 || $varEpinephrine == 2 || $varNorepinephrine == 2) {
            $csScore = 3;
        } else if($varDopamine == 2 || $varDobutamine != null) {
            $csScore = 2;
        } else if($varMap == 2) {
            $csScore = 0;
        } else if($varMap == 3) {
            $csScore = 1;
        }
        //Calculating rs score
        if($varRespiratory == 1) {
            $rsScore = 0;
        } else if($varRespiratory == 2) {
            $rsScore = 1;
        } else if($varRespiratory == 4 && $varVentilated == 1) {
            $rsScore = 3;
        } else if($varRespiratory == 5 && $varVentilated == 1) {
            $rsScore = 4;
        } else if($varRespiratory == 3 || $varRespiratory == 4 || $varRespiratory == 5 && $varVentilated == 2) {
            $rsScore = 2;
        }
        //Calculating the other scores
        $cnsScore = calcScore($varGcs);
        $coagulationScore = calcScore($varCogulation);
        $liverScore = calcScore($varLiver);
        $kidneyScore = calcScore($varKidney);
        //Calculating final score
        $finalScore = $cnsScore + $csScore + $rsScore + $coagulationScore + $liverScore + $kidneyScore;
    ?>
    <!-- page body -->
    <body>
        <!--Patient NHI, surname and firstname retrieved from the cookies and displayed at the top of the page -->
        <div id="patientInfo">
            <p>Patient NHI Number: <?php echo $nhi ?></p>
            <p>Patient Surname: <?php echo $sname ?></p>
            <p>Patient First Name: <?php echo $fname ?></p>
        </div>
        <h1 id="resultH1">Score Calculations and Result</h1>
        <form name="resultForm" id="resultForm" action="result.php"  method="GET">
            <label for="cns">Central Nervous System: </label>
            <input type="text" name="cns" value=<?php echo $cnsScore; ?> readonly>
            <br>
            <label for="cs">Cardiovascular System: </label>
            <input type="text" name="cs" value=<?php echo $csScore; ?> readonly>
            <br>
            <label for="rs">Respiratory System: </label>
            <input type="text" name="rs" value=<?php echo $rsScore; ?> readonly>
            <br>
            <label for="coagulation">Coagulation: </label>
            <input type="text" name="coagulation" value=<?php echo $coagulationScore; ?> readonly>
            <br>
            <label for="liver">Liver: </label>
            <input type="text" name="liver" value=<?php echo $liverScore; ?> readonly>
            <br>
            <label for="kidney">Renal Function(Kidney): </label>
            <input type="text" name="rs" value=<?php echo $kidneyScore; ?> readonly>
            <br>
            <label for="fs">Final Score: </label>
            <input type="text" name="fs" value=<?php echo $finalScore; ?> readonly>
            <br>
        </form>
    </body>
</html>
