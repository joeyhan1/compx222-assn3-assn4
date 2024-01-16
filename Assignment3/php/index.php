<?php
  ini_set("error_reporting",E_ALL);
  ini_set("log_errors","1");
  ini_set("error_log","../course.html/php_errors.txt");
?>

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
   
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
		<title>Home Page</title>
    <div id="divTop">
		  <h1 id="indexH1">Overview of SOFA</h1>
		  <p id="indexPara">SOFA score is called sequential organ failure assessment score and is used to track patient status in the ICU and determine the extent of their organ function or rate of failure. It is also based on 6 different scores.</p>
    </div>
  </head>

  <!-- page body -->
  <body>
    <form name="indexForm" id="indexForm" action="sofa.php" onsubmit="return validateForm()" method="POST">
      <label for="nhi">NHI Number:</label>
      <input type="text" name="nhi" value=<?php echo $nhi?>>
      <br>
      <label for="fname">First Name:</label>
      <input type="text" name="fname" value=<?php echo $fname?>>
      <br>
      <label for="sname">Surname:</label>
      <input type="text" name="sname" value=<?php echo $sname ?>>
      <br>
      <div id="button">
        <button class="submitbutton" type="submit">Submit</button>
      </div>
    </form>
  </body>
  <script type="text/javascript" src="../js/index.js"></script>
</html>
