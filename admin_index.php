<?php

session_start();
if($_SESSION['auth'] == true){

}
else {
	session_die();
	header('location:login.php');
}
$name = $_SESSION['user'];
// $MyConst = $_SESSION['check'];
//
// if(!defined('MyConst')) {
//    die('Direct access not permitted');
// }

use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

$query1 = "SELECT * from doctor";
$result1 = $db->select($query1);

$query2 = "SELECT * from patient";
$result2 = $db->select($query2);

$query3= "SELECT name from admin where login_id='$name'";
$result3 = $db->select($query3);

foreach ($result3 as $row3){
  $user = $row3['name'];
}

?>

<html>
<head>
<!-- <style>
/* a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
} */
table, th, td {
  border: 3px solid black;
  padding: 5px;
  border-collapse: collapse;
}
</style> -->

	<link rel="stylesheet" href="styling.css">
</head>

<body>
  <section id = "top">
    <h2>Welcome, <?php echo $user ?>! </h2>
  </section>
  <br><br>
  <div align = "right">
    <a href="login.php" class="button">Return to Login</a>
    <button onclick="window.print();return false;">Print this page</button>
  </div>
  <br><br><br>
  <a href="#patient">Go to Patient details</a>
  <div align = "center">
    <section id="doctor">
    <h1 class = "main_heading">Doctor details</h1><br>
    <table>
      <tr>
        <th>Setup Number</th>
        <th>Name</th>
        <th>Specialization</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Address</th>
        <th>Email ID</th>
        <th>Phone number</th>
      </tr>
      <?php foreach ($result1 as $row1): ?>
        <tr>
          <td><?= $row1['setup']; ?></td>
          <td><?= $row1['name']; ?></td>
          <td><?= $row1['specialization']; ?></td>
          <td><?= $row1['date_of_birth']; ?></td>
          <td><?= $row1['age']; ?></td>
          <td><?= $row1['address']; ?></td>
          <td><?= $row1['email_id']; ?></td>
          <td><?= $row1['phone']; ?></td>
        </tr>
     <?php endforeach; ?>
    </table>
  </section>
    <br><br><br>
  </div>
    <a href="#doctor">Go to Doctor details</a>
    <div align = "center">
    <section id = "patient">
    <h1 class = "main_heading">Patient details</h1><br>
    <table>
      <tr>
        <th>Treatment ID</th>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Age</th>
        <th>Weight (kg)</th>
        <th>Email ID</th>
        <th>Phone number</th>
        <th>Referral</th>
        <th>Rabies Vaccinated</th>
        <th>Rabies immunoglobulin</th>
        <th>Type of rabies immunoglobulin</th>
        <th>Doctor</th>
        <th>Remarks</th>
      </tr>
      <?php foreach ($result2 as $row2): ?>
        <tr>
          <td><?= $row2['treatment_id']; ?></td>
          <td><?= $row2['name']; ?></td>
          <td><?= $row2['date_of_birth']; ?></td>
          <td><?= $row2['age']; ?></td>
          <td><?= $row2['weight']; ?></td>
          <td><?= $row2['email_id']; ?></td>
          <td><?= $row2['phone']; ?></td>
          <td><?= $row2['referral']; ?></td>
          <td><?= $row2['rabies_vac']; ?></td>
          <td><?= $row2['rab_imm_yes']; ?></td>
          <td><?= $row2['rab_imm_type']; ?></td>
          <td><?= $row2['doctor']; ?></td>
          <td><?= $row2['remarks']; ?></td>
        </tr>
     <?php endforeach; ?>
    </table>
</section>
  </div>
  <br><br><br>
  <a href="#top">Go to top of the page</a>
  <br>
</body>
</html>
