<!DOCTYPE html>
<html>
<link type="text/css" rel="stylesheet" href="style.css"/>
<head>
  <meta charset="UTF-8">
  <title> Calendar </title>
</head>

<body bgcolor="fff">

  <!--
  <a href="#img1"> lightbox </a>
  <div class="lightbox" id="img1">
    <div class="box">
      <a class="close" href="#">X</a>
      <p class="title">Hello there :)</p>
      <div class="content">
        <img src="http://mostfamousperson.net/NicolasCage.png"/>
     </div>
    </div>
  </div>
  -->

  <?php
    include "zzyzxrd.php";
    //get the date, month numbers and convert to INTs
    $dayNum    = intval(date('d'));
    $monthNum  = intval(date('m'));
    //INT to Month-name conversion
    //$monthName = date("F", mktime(0,0,0, $monthNum, 10));

    //connect to DB
    $conn = mysql_connect($host,$username,$pw) or die ("Unable to Connect.");
    mysql_select_db("Firstrun", $conn);
    //enable current day
    $queryUpdate = "UPDATE Days SET enabled=1 WHERE count<=" . $dayNum;
    mysql_query($queryUpdate);
    //select DB content
    $queryIterate  = "SELECT * FROM Days";
    $result = mysql_query($queryIterate);

    if($result == FALSE){
      echo mysql_error();
    }

    //create table
    echo '<table style="width:100%" cellpadding="0" cellspacing="0" class="db-table">';
    $counter = 1;
    while($row = mysql_fetch_array($result)){
      //Set the first table row
      if($counter==1){
        echo '<tr>';
      }
      if($row[1]!=1){
        echo '<td> <div class="dayView">' . $counter . '</div></td>';
      }
      else{
        //link to actual day content (TODO)
        echo '<td> <a href="days_content/day' . $counter . '.php">' . $row[0] . '</a></td>';
        //content of the DB[day]
        //echo '<td>' . $row[3] . '</td>';
        //set a new row after 5 entries
      }
      if($counter%5==0){
        echo '</tr><tr>';
      }
      $counter++;
    }
    echo '</tr></table>';
  ?>
</body>

</html>
