<?php 

function getAllStaffId() {
	include_once 'constants.php';
	$con=mysqli_connect("localhost", $user, "", $database);
	echo "enter into getAllStaffId";
	$query = "SELECT staff_id from staff;";

	// Check connection
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con, $query);
    return $result;
}