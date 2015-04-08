<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title> ... </title>
</head>

<body>
	<?php
		$username = "root";
		$host     = "localhost";
		$pw       = "b4n4n4ram4";
		$table    = "Days";
		$conn     = mysql_connect($host,$username,$pw) or die ("Unable to Connect.");
		mysql_select_db("Firstrun", $conn);

		$query  = "SELECT * From Days";
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
