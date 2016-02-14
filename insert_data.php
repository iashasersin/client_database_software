<?php
$dbc = mysqli_connect('localhost', 'ro_usr', 'mazafaka1983_ro', 'manoperacraft_ro')
   or die('Error connecting to mysql server');

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$company_name = $adress = $city = $country = $state = $zip = $phone = $fax = $comments = $servers_numb = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$company_name = test_input($_POST["company_name"]);
$company_name = mysqli_real_escape_string($dbc,$company_name);
$adress = test_input($_POST["adress"]);
$adress = mysqli_real_escape_string($dbc,$adress);
$city = test_input($_POST["city"]);
$city = mysqli_real_escape_string($dbc,$city);
$country = test_input ($_POST["country"]);
$state = test_input($_POST["state"]);
$zip = test_input($_POST["zip"]);
$phone = test_input($_POST["phone"]);
$fax = test_input($_POST["fax"]);
$comments = test_input($_POST["comments"]);
$comments = mysqli_real_escape_string($dbc,$comments);
$servers_numb = test_input($_POST["num_servers"]);
}


$query = "INSERT INTO company_data (company_name,adress,city,country,state,zip,phone,fax,comments,servers_numb) values ('$company_name','$adress','$city','$country','$state','$zip','$phone','$fax','$comments','$servers_numb')";
$result = mysqli_query($dbc,$query)
   or die('Error');
$num=mysql_numrows($result);
echo "Client added to database";
echo $num;
?>


