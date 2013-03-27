<?php
	// check if you reach here via form submission
	if (!isset($_POST)) {
		header('Location: /q1.php');	
	}

	$staffId	= $_POST['staff_id'];
	//$startDate	= $_POST['start_date'];
	//$endDate	= $_POST['end_date'];



	include_once 'constants.php';

	$con=mysqli_connect("localhost", $user, "", $database);

	$query = "SELECT allStaff.*, driver.license_number, driver.date_certified
FROM
(SELECT staff_id, nric, NAME, date_of_birth, 'Admin' AS 'Staff Type'
FROM staff
WHERE staff_type='A'
UNION
SELECT staff_id, nric, NAME, date_of_birth, 'Driver' AS 'Staff Type'
FROM staff
WHERE staff_type='D'
UNION
SELECT staff_id, nric, NAME, date_of_birth, 'Other' AS 'Staff Type'
FROM staff
WHERE staff_type<>'D' && staff_type<>'A') AS allStaff

LEFT JOIN

driver
ON allStaff.staff_id = driver.staff_id
WHERE allStaff.staff_id = $staffId";


	// Check connection
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con, $query);
	// for 1 particular staff
    $staff = mysqli_fetch_array($result)
?>

<html>
<head>
	<title></title>
	<style type="text/css">
		div.table {border: 0px solid black; display: table; }
		div.tr {border: 0px solid black; display: table-row; }
		div.td {border: 0px solid black; display: table-cell; padding: 2px;}
	</style>	
</head>
<body>

	<div class="table">
		
		<div class="tr">
			<div class="td">
			Staff Id
			</div>
			<div class="td">
				<?php echo $staff['staff_id'];?>
			</div>
		</div>

		<div class="tr">
			<div class="td">
			Staff Type
			</div>
			<div class="td">
			<?php echo $staff['Staff Type']; ?>
			</div>
		</div>

		<?php 
		// we only display license number if it is a driver
		if (!empty($staff['license_number'])) :
		?>

		<div class="tr">
			<div class="td">
			Driver License
			</div>
			<div class="td">
			<?php echo $staff['license_number']; ?>
			</div>
		</div>

		<?php endif; ?>
	</div>
		
	</div>
	<div>
		
	</div>

	<a href="q1.php">Select another staff</a>
</body>
</html>