<?php
//Set variabloes and locations for the connection.
$hostname = "localhost";
$user = "bentouss_testing";
$pass = "b3ntoussi";
$database = "bentouss_testing";
//connection string and die if fails
mysql_connect("$hostname", "$user", "$pass") or die(mysql_error());
mysql_select_db("$database") or die(mysql_error());


switch($_GET["action"]){
	case "list":
		$sql = "SELECT * FROM teamList";
		$result = mysql_query($sql);
		if (mysql_num_rows ($result)) {
		while ($row = mysql_fetch_assoc($result)) {
			$json[] = array('id' => $row['id'], 'name' => $row['name'], 'founded' => $row['founded'], 'city' => $row['city'], 'stadium' => $row['stadium'], 'capacity' => $row['capacity'], 'manager' => $row['manager'], 'websiteLink' => $row['websiteLink'], 'image' => $row['image'], 'details' => $row['details']);
			}
		}	
		echo json_encode($json);
	break;

	case "detail":
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			}
			$sql = "SELECT * FROM teamList WHERE id = '$id'";
			$result = mysql_query($sql);
			if (mysql_num_rows ($result)) {
				if ($row = mysql_fetch_assoc($result)) {
					$json = array('id' => $row['id'], 'name' => $row['name'], 'founded' => $row['founded'], 'city' => $row['city'], 'stadium' => $row['stadium'], 'capacity' => $row['capacity'], 'manager' => $row['manager'], 'websiteLink' => $row['websiteLink'], 'image' => $row['image'], 'details' => $row['details']);
					}
			}	
			echo json_encode($json);
	break;

	case "add":

	//	$uploadFolder = "/badges/";
	//	$uploadFile = basename($_FILES['image']['image']); 
	//	$uploadPath = $uploadFolder . $uploadFile;

	//	move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath);


		$name = $_POST['name'];
		$founded = $_POST['founded'];
		$city = $_POST['city'];
		$stadium = $_POST['stadium'];
		$capacity = $_POST['capacity'];
		$manager = $_POST['manager'];
		$websiteLink = $_POST['websiteLink'];
		$image = $_POST['image'];
		$details = $_POST['details'];
		//$json = file_get_contents("php://input");
		//$result = json_decode($json, true);
		

		

		
		$sql = "INSERT INTO teamList (name, founded, city, stadium, capacity, manager, websiteLink, image, details) VALUES ('$name', '$founded', '$city', '$stadium', '$capacity', '$manager', '$websiteLink', '$image', '$details')";
		mysql_query($sql) or die(mysql_error());
	break;

}
