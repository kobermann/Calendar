<!DOCTYPE html>
<html>
<!--<link type="text/css" rel="stylesheet" href="style.css"/>-->
<head>
  <meta charset="UTF-8">
  <title> Calendar </title>
</head>

<body>
  <?php
    include "zzyzxrd.php";
    //get the date, month numbers and convert to INTs
    $dayNumber = intval(date('d'));
    $monthNum  = intval(date('m'));
    //INT to Month-name conversion
    //$monthName = date("F", mktime(0,0,0, $monthNum, 10));

    //connect to DB
    $conn = mysql_connect($host,$username,$pw) or die ("Unable to Connect.");
    mysql_select_db("Firstrun", $conn);

    $query  = "SELECT * FROM Days";
    $result = mysql_query($query);
    if($result == FALSE){
      echo mysql_error();
    }
    echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    echo '<tr><th>count</th><th>content</th>';
    while($row = mysql_fetch_array($result)){
      echo '<tr><td>';
      echo $row[0];
      echo '</td>';
      echo '<td>';
      echo $row[3];
      echo '</td></tr>';
    }
    echo '</table>';
  ?>
</body>

</html>
