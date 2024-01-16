<?php
  ini_set("error_reporting",E_ALL);
  ini_set("log_errors","1");
  ini_set("error_log","../course.html/php_errors.txt");
?>

<!DOCTYPE html>
<?php
  //Checking for surname and firstname and setting the cookies
  if(isset($_POST["sname"])) {
    setcookie("sname", $_POST["sname"],time()+3600);
  }
  if(isset($_POST["fname"])) {
    setcookie("fname", $_POST["fname"],time()+3600);
  }

  //Start session
  session_start();
  $_SESSION['nhi'] = $_POST["nhi"];
  // Taking current system Time
  $_SESSION['start'] = time(); 
  // Destroying session after 6 minutes
  $_SESSION['expire'] = $_SESSION['start'] + 360;
?>
<html>
  <head>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
		<title>SOFA Page</title>
	</head>

  <!-- page body -->
  <body>
    <div id="patientInfo">
      <p>Patient NHI Number: <?php echo $_POST["nhi"]; ?>
      <p>Patient Surname: <?php echo $_POST["sname"]; ?></p>
      <p>Patient First Name: <?php echo $_POST["fname"]; ?></p>
    </div>
    <h1 id="sofaH1">SOFA Calculator</h1>
    <form name="sofaForm" id="sofaForm" action="result.php" onsubmit="return validateForm()" method="POST">
      <h2>Central nervous system</h2>
      <label for="gcs">Glasgow coma scale: </label>
			<select name="gcsSelect" id="gcsSelect">
				<option value="1" selected>15</option>
				<option value="2">13–14</option>
        <option value="3">10–12</option>
				<option value="4">6–9</option>
        <option value="5">0-5.9</option>
			</select>
      <br>
      <h2>Cardiovascular system</h2>
      <label for="map">Mean arterial pressure: </label>
			<select name="mapSelect" id="mapSelect">
				<option value="1" selected></option>
				<option value="2">70 mmHg and above</option>
        <option value="3">0-69.9 mmHg</option>
			</select>
      <br>
      <label for="dopamine">Dopamine: </label>
			<select name="dopamineSelect" id="dopamineSelect">
				<option value="1" selected></option>
				<option value="2">0-5 μg/kg/min</option>
        <option value="3">6-15 μg/kg/min</option>
				<option value="4">16 μg/kg/min and above</option>
			</select>
      <br>
      <label for="dobutamine">Dobutamine: </label>
      <input type="text" name="dobutamine">
      <br>
      <label for="epinephrine">Epinephrine: </label>
			<select name="epinephrineSelect" id="epinephrineSelect">
				<option value="1" selected></option>
				<option value="2">0-0.1 μg/kg/min</option>
        <option value="3">Above 0.1 μg/kg/min</option>
			</select>
      <br>
      <label for="norepinephrine">Norepinephrine: </label>
			<select name="norepinephrineSelect" id="norepinephrineSelect">
				<option value="1" selected></option>
				<option value="2">0-0.1 μg/kg/min</option>
        <option value="3">Above 0.1 μg/kg/min</option>
			</select>
      <h2>Respiratory system</h2>
      <label for="respiratory">PaO2/FiO2 [mmHg (kPa)]: </label>
			<select name="respiratorySelect" id="respiratorySelect">
				<option value="1" selected>400(53.3) and above</option>
				<option value="2">300(40)-399.9(53.2)</option>
        <option value="3">200(26.7)-299.9(39.9)</option>
				<option value="4">100(13.3)-199.9(26.5)</option>
        <option value="5">0-99.9(13.2)</option>
			</select>
      <br>
      <label for="ventilated">Mechanically ventilated including CPAP: </label>
			<select name="ventilatedSelect" id="ventilatedSelect">
				<option value="1">Yes</option>
				<option value="2" selected>No</option>
			</select>
      <br>
      <h2>Coagulation</h2>
      <label for="cogulation">Platelets×10^3/μl: </label>
			<select name="cogulationSelect" id="cogulationSelect">
				<option value="1" selected>150 and above</option>
				<option value="2">100-149.9</option>
        <option value="3">50-99.9</option>
				<option value="4">20-49.9</option>
        <option value="5">0-19.9</option>
			</select>
      <br>
      <h2>Liver</h2>
      <label for="liver">Bilirubin (mg/dl) [μmol/L]: </label>
			<select name="liverSelect" id="liverSelect">
				<option value="1" selected>0-1.19 [0-19.9]</option>
				<option value="2">1.2–1.9 [20-32]</option>
        <option value="3">2.0–5.9 [33-101]</option>
				<option value="4">6.0–11.9 [102-204]</option>
        <option value="5">12.0 [204] and above</option>
			</select>
      <br>
      <h2>Renal function(Kidney)</h2>
      <label for="kidney">Creatinine (mg/dl) [μmol/L] (or urine output): </label>
			<select name="kidneySelect" id="kidneySelect">
				<option value="1" selected>0-1.19 [0-109.9]</option>
				<option value="2">1.2–1.9 [110-170]</option>
        <option value="3">2.0–3.4 [171-299]</option>
				<option value="4">3.5–4.9 [300-440] (or less than 500 ml/day)</option>
        <option value="5">Above 5.0 [440] (or less than 200 ml/day)</option>
			</select>
      <br>
      <div id="button">
        <button class="submitbutton" type="submit">Submit</button>
      </div>
    </form>
  </body>
  <script type="text/javascript" src="../js/sofa.js"></script>
</html>