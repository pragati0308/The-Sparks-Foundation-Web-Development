<?php 

$username = "root";
$password = "";
$server = "127.0.0.1:3307";
$database = "bank";

$conn = new mysqli($server, $username, $password, $database); //or die ("Cannot Connect");

if($conn){
	//echo "Connection Successful";
	?>

	<script >//alert('Connection Successful');</script>

	<?php 

}else{
	echo "No Connection";
}

 ?>