<?php
  ini_set("error_reporting",E_ALL);
  ini_set("log_errors","1");
  ini_set("error_log","../course.html/php_errors.txt");
?>

<?php
  function getMovieItems() {
    //Read the movie catalog
    $catalogs = simplexml_load_file("../xml/catalog.xml");
    $results=$catalogs->xpath("//catalog");
    foreach($results as $result) {
      echo " \n";
      echo "      <tr class='catalogStyle'>\n";
      echo "        <td id=$result->id>$result->id</td>\n";
      echo "        <td><img class='imageStyle'  src='".$result->screenshot."' alt='".$result->title." picture' ></td>\n";
      //Used when testing the sort functions
      // echo "        <td>Placeholder</td>\n";
      echo "        <td>$result->title</td>\n";
      echo "        <td>$result->length</td>\n";
      echo "        <td>$result->director</td>\n";
      echo "        <td>$result->rating</td>\n";
      echo "      </tr>\n";
    }
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/A4.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Home Page</title>
  </head>
  <body>
  <div class="title">
  <h1><img class="logo" src="../CSS/logo3.png" alt="Website Logo"> Film Guide</h1></div>
    <div class="search-container">
      <!--Send the data to the index javascript file in order to send the user to the next page with the information-->
      <form action="../js/index.js" onsubmit="return validateSearch()">
        <input class="inputStyle" type="text" size="30" onkeyup="showResult(this.value)">
		  <div id="JSsearch"></div>
      </form>
    </div><br>
    <div class="backgroundImage"></div>
    <div class="background">
      <br>
      <div class="tableStyle">
    <table class="myTable" id="myTable">
      <thead>
      <tr class="trStyle">
        <th class="table" id="table1" onclick="sortTableID()">ID</th>
        <th class="table" id="table2">Screenshot</th>
        <th class="table" id="table3" onclick="sortTable(2)">Title</th>
        <th class="table" id="table4" onclick="sortTable(3)">Length</th>
        <th class="table" id="table5" onclick="sortTable(4)">Director</th>
        <th class="table" id="table6" onclick="sortTable(5)">Rating</th>
      </tr>
      </thead>
      <tbody>
        <div id="trHover">
      <?php
        getMovieItems();
      ?></div>
      </tbody>
    </table>
    </div> </div>
    <script>
      var table = document.getElementById("myTable");
      if (table) {
        for (var i = 0; i < table.rows.length; i++) {
          table.rows[i].onclick = function() {
            tableText(this);
          };
        }
      }

      function tableText(tableRow) {
        var id = 0;
        id = id += parseInt(tableRow.childNodes[1].innerHTML) - 1;
        var screenshot = tableRow.childNodes[3].innerHTML;
        var title = tableRow.childNodes[5].innerHTML;
        var length = tableRow.childNodes[7].innerHTML;
        var director = tableRow.childNodes[9].innerHTML;
        var rating = tableRow.childNodes[11].innerHTML;
        var obj = {id, screenshot, title, length, director, rating};
        if(title != "Title") {
          //Testing purposes
          console.log(obj);
          //Cookies
          document.cookie = "id=" + id;
          document.cookie = "screenshot=" + screenshot; 
          document.cookie = "title=" + title;
          document.cookie = "length=" + length; 
          document.cookie = "director=" + director; 
          document.cookie = "rating=" + rating; 
          window.location = "item.php" 
        }
      }
    </script>
  </body>
  <script type="text/javascript" src="../js/index.js"></script>
</html>


