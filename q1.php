<?php
	include_once 'constants.php';

	$con=mysqli_connect("localhost", $user, "", $database);

	$query = "SELECT staff_id from staff;";

	// Check connection
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con, $query);
    
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
<form id="q1" name="" action="q1action.php" method="post">
	<div class="table">
		
		<div class="tr">
			<div class="td">
			Select Staff ID
			</div>
			<div class="td">
				<select name="staff_id" id="staff_id">
					<option value="">-- Select --</option>
					<?php

					while ($row = mysqli_fetch_array($result)) {
						echo '<option value="' . $row['staff_id'] . '">' . $row['staff_id']. '</option>';
					}
					?>
				</select>
			</div>
		</div>
		<div class="tr">
			<div class="td">
			Start Date (yyyy-mm-dd):&nbsp;&nbsp;&nbsp;
			</div>
			<div class="td">
			<input type="text" name="start_date" id="start_date" value="" />
			</div>
		</div>
		<div class="tr">
			<div class="td">
			End Date
			</div>
			<div class="td">
			<input type="text" name="end_date" id="end_date" value="" />
			</div>
		</div>
		<div class="tr">
			<div class="td">
			
			</div>
			<div class="td">
			<input id="submit_button" name="submit_button" type="submit" value="Get Staff Info" />
			</div>
		</div>
	</div>
		
	</div>
	<div>
		
	</div>
</form>
	
</body>
</html>