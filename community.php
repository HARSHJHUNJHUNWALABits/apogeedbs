<?php
error_reporting(E_ERROR | E_PARSE);
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
$query2="SELECT setup FROM doctor WHERE doctor.login_id='$user'";
$result2= $conn->query($query2);
foreach($result2 as $row){
	$setup=$row['setup'];
}
//echo $setup;
if($_POST['addcomm']){
	$comm = "";
    if (isset($_POST['comm'])) {
        $comm = mysqli_real_escape_string($conn, $_POST['comm']);
    }
    if($comm==NULL){
    	echo "PLEASE ADD A COMMENT";
    }
    else{
    $query="INSERT INTO community VALUES($setup,'$comm')";
    $result = $conn->query($query);
    if($result == true)
    {
    	//echo "WORKING";
   }
}
}
?>
<html>
<head>
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
	<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table {
  border-collapse: collapse;
  width: 100%;
}
td {
  text-align: center;
}
th{
	background-color: #00ccff;
}
textarea {
  width: 100%;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.vertical-center {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.flex-parent {
  display: flex;
}

.jc-center {
  justify-content: center;
}
form {
        border: 3px solid #f1f1f1;
    }
    /*assign full width inputs*/

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    /*set a style for the buttons*/

    button {
        background-color: #00ccff; /*#4CAF50;*/
        color: black;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    /* set a hover effect for the button*/

    button:hover {
        opacity: 0.8;
    }
    /*set extra style for the cancel button*/

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
    }
    /*centre the display image inside the container*/

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }
    /*set image properties*/

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }
    /*set padding to the container*/

    .container {
        padding: 16px;
    }
    /*set the forgot password text*/

		/* span {
			background-color: #00ccff;
		} */

    span.psw {
        float: right;
        padding-top: 16px;
    }
    /*set styles for span and cancel button on small screens*/

    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .cancelbtn {
            width: 100%;
        }
    }
</style>
</head>
<body>
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
	<form action="community.php" method="POST">
	<div>
    	<label><h1>DOCTOR LOGIN_ID:</label>
     		<?php echo $user?></h1>
  	</div>
  		<div>
  			<label>PLEASE TYPE YOUR COMMENT HERE</label>
  			<div>
  <!-- <span>ADD COMMENT</span> -->
  <textarea name="comm" rows="10" column="60"></textarea>
</div>
		</div>
		<!-- <input type="text" name="comm">  -->
		<div class="flex-parent jc-center">
		<button type="submit" name="addcomm" value="true"><strong>ADD COMMENT</strong></button>
		</div>
	</form>
	<?php
	// use Phppot\DataSource;
	// require_once 'DataSource.php';
	// $db = new DataSource();
	// $conn = $db->getConnection();
	//$query="SELECT * from comment";
	$query1="SELECT * FROM doctor JOIN community on community.setup=doctor.setup";
	//$result=$db->select($query);
	$result1=$db->select($query1);
	?>
	<table>
	<thead>
			<tr>
			<th>DOCTOR NAME</th>
			<th>COMMENT</th>
			</tr>
	</thead>
	<?php
	foreach($result1 as $row1){
		?>
	<tbody>
	<tr>
		<td>
			<?php echo $row1['name'];?>
		</td>
		<td><?php echo $row1['comment'];?></td>
	</tr>
	<?php
	}
	?>
	</tbody>
	</table>
	</body>
</html>
