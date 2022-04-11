<?php
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
$user=$_SESSION['patient_user'];
//echo $user;
$query= "SELECT * from patient where login_id='$user'";
$result1 = $db->select($query);
//echo "WORKING";
//
// foreach ($result as $row) {
// 	echo $row['treatment_id'];
// 	echo "<br>";
// 	echo $row['name'];
// 	echo "<br>";
// 	echo $row['email_id'];
// 	echo "<br>";
// 	echo $row['phone'];
// 	echo "<br>";
// 	echo $row['date_of_birth'];
// 	echo "<br>";
// 	echo $row['age'];
// 	echo "<br>";
// 	echo $row['weight'];
// 	echo "<br>";
// 	if($row['referral']==NULL)
// 	{
// 		echo "N.A";
// 	}
// 	echo $row['referral'];
// 	echo "<br>";
// 	echo $row['rabies_vac'];
// 	echo "<br>";
// 	echo $row['rab_imm_yes'];
// 	echo "<br>";
// 	echo $row['rab_imm_type'];
// 	echo "<br>";
// 	echo $row['doctor'];
// 	echo "<br>";
// 	if($row['remarks']==NULL)
// 	{
// 		echo "N.A";
// 	}
// 	echo $row['remarks'];
// 	echo "<br>";
// 	}
//echo "ON PATIENT'S MAIN PAGE";
?>

<html>
<head>
	<link rel="stylesheet" href="styling.css">
</head>
<body>
	<div align = "right">
    <a href="login.php">Logout</a>
  </div>
	<H1 class="main_heading">YOUR DETAILS</H1>
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
			<th>DOCTOR'S NAME</th>
			<td><?php echo $row1['doctor']?></td>
		</tr>
		<tr>
			<th>REMARKS</th>
			<td><?php echo $row1['remarks']?></td>
		</tr>
	</table>
	<?php endforeach ?>
</body>
</html>
