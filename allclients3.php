<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<?php
$servername = "localhost";
$username = "ro_usr";
$password = "mazafaka1983_ro";
$dbname = "manoperacraft_ro";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id , company_name  FROM company_data";
$result = mysqli_query($conn, $sql);
include("includes/navigation.php");?>

	<div class="container">
		<table class="table">

			<caption class="caption">Customer information</caption>

			<thead>

				<tr class="success">
        			<th class="success">ID</th>
        			<th class="success">Company name</th>      
				</tr>
			</thead>

			<tbody>

				<?php
				if (mysqli_num_rows($result) > 0) {
     // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr onclick="document.location.href=\'viewcustomer.php?ID=' . $row["id"] . '\'">';
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["company_name"] . "</td>" ;


        echo "</tr>";
        }
        } else {
    echo "<tr>" . "<td>" . "0 results" . "</td>" . "</tr>" ;
}

mysqli_close($conn);
?>
                        </tbody>

                </table>
        </div>


</body>
</html>

