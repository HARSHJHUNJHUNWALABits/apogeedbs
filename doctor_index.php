<html>
<head>
	<link rel="stylesheet" href="styling.css">
</head>
<body>
	<!-- <h1>DOCTOR DETAILS DASHBOARD</h1> -->
	<div align = "right">
    <a href="login.php">Logout</a>
  </div>

<?php

error_reporting(E_ERROR | E_PARSE);
//$sqlSelect = "SELECT * FROM patient";
//$result = $db->select($sqlSelect);
session_start();
if($_SESSION['auth'] == true){

}
else {
	session_die();
	header('location:login.php');
}
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
$user=$_SESSION['doctor_user'];
//echo $user;
$query= "SELECT * from doctor where login_id='$user'";
$result = $db->select($query);
//echo "WORKING";

foreach ($result as $row) {
	// echo $row['setup'];
	// echo "<br>";
	// echo $row['name'];
	// echo "<br>";
	// echo $row['specialization'];
	// echo "<br>";
	// echo $row['email_id'];
	// echo "<br>";
	// echo $row['phone'];
	// echo "<br>";
	// echo $row['date_of_birth'];
	// echo "<br>";
	// echo $row['age'];
	// echo "<br>";
	// echo $row['address'];
	// echo "<br>";
	}

	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";
	// echo "<br>";

$query1= "SELECT patient.* from patient join treatment where patient.treatment_id = treatment.treatment_id and treatment.setup = (select setup from doctor where login_id = '$user')";
$result1 = $db->select($query1);

foreach ($result1 as $row1) {
	//echo $row1['name'];
	// echo "<br>";
	// echo $row1['email_id'];
	// echo "<br>";
	// echo "<br>";
}
if($_POST['comm']){
	header('location:community.php');
}

//echo "ON PATIENT'S MAIN PAGE";
?>
<h1 class="main_heading">WELCOME DR. <?php echo $row['name']?></h1>
<table>
	<tr>
		<th>SET UP NUMBER</th>
		<td><?php echo $row['setup']?></td>
	</tr>
	<tr>
		<th>NAME</th>
		<td><?php echo $row['name']?></td>
	</tr>
	<tr>
		<th>SPECIALIZATION</th>
		<td><?php echo $row['specialization']?></td>
	</tr>
	<tr>
		<th>EMAIL-ID</th>
		<td><?php echo $row['email_id']?></td>
	</tr>
	<tr>
		<th>CONTACT NUMBER</th>
		<td><?php echo $row['phone']?></td>
	</tr>
	<tr>
		<th>DATE OF BIRTH</th>
		<td><?php echo $row['date_of_birth']?></td>
	</tr>
	<tr>
		<th>ADDRESS</th>
		<td><?php echo $row['address']?></td>
	</tr>

</table>
<br>
<H1 class="main_heading">CURRENT PATIENTS UNDER YOU</H1>
<?php foreach($result1 as $row1): ?>
	<table>
		<tr>
			<th>TREATMENT ID</th>
			<td><?php echo $row1['treatment_id']?></td>
		</tr>
	<tr>
		<th>NAME</th>
		<td><?php echo $row1['name']?></td>
	</tr>
	<tr>
		<th>EMAIL-ID</th>
		<td><?php echo $row1['email_id']?></td>
	</tr>
	<tr>
		<th>PHONE NUMBER</th>
		<td><?php echo $row1['phone']?></td>
	</tr>
	<tr>
		<th>DATE OF BIRTH</th>
		<td><?php echo $row1['date_of_birth']?></td>
	</tr>
	<tr>
		<th>AGE</th>
		<td><?php echo $row1['age']?></td>
	</tr>
	<tr>
		<th>WEIGHT</th>
		<td><?php echo $row1['weight']?></td>
	</tr>
	<tr>
		<th>REFERRAL</th>
		<td><?php echo $row1['referral']?></td>
	</tr>
	<tr>
		<th>RABIES VACCINATED?</th>
		<td><?php echo $row1['rabies_vac']?></td>
	</tr>
	<tr>
		<th>RABIES IMMUNOGLOBULIN?</th>
		<td><?php echo $row1['rab_imm_yes']?></td>
	</tr>
	<tr>
		<th>IMMUNOGLOBULIN TYPE</th>
		<td><?php echo $row1['rab_imm_type']?></td>
	</tr>
	<tr>
		<th>REMARKS</th>
		<td><?php echo $row1['remarks']?></td>
	</tr>
</table>
<br>
<?php endforeach ?>
<form method="POST" action="doctor_index.php">
	<div align = "center">
	<button class="button hover"type="submit" name="comm" value="true">Community page</button>
</div>
</form>
</body>
</html>
<!-- <html>
<body>

</body>
</html> -->
