<?php
session_start();
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

//echo "Welcome to doctor's registration";


if(isset($_POST['form-import'])){

    //$_SESSION['testform']=true;
    // if (isset($_POST['treatment_id'])) {
    //     $treatment_id = $_POST['treatment_id'];
    // }
    $setup = "";
    if (isset($_POST['setup'])) {
        $setup= mysqli_real_escape_string($conn, $_POST['setup']);
    }
    $setup =(int)$setup;

    $name = "";
    if (isset($_POST['name'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }

    $login_id = "";
    if (isset($_POST['login_id'])) {
        $login_id = mysqli_real_escape_string($conn, $_POST['login_id']);
    }

    $pwd = "";
    if (isset($_POST['pwd'])) {
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    }

    $email_id = "";
    if (isset($_POST['email_id'])) {
        $email_id = mysqli_real_escape_string($conn, $_POST['email_id']);
    }

    $phone = "";
    if (isset($_POST['phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    $phone = (int)$phone;

    $date_of_birth = "";
    if (isset($_POST['date_of_birth'])) {
        $date_of_birth= mysqli_real_escape_string($conn, $_POST['date_of_birth']);
    }

    $age = "";
    if (isset($_POST['age'])) {
        $age= mysqli_real_escape_string($conn, $_POST['age']);
    }
    $age = (int)$age;


    $address = "";
    if (isset($_POST['address'])) {
        $address= mysqli_real_escape_string($conn, $_POST['address']);
    }

    $specialization = "";
    if (isset($_POST['specialization'])) {
        $specialization= mysqli_real_escape_string($conn, $_POST['specialization']);
    }


    $query = "INSERT INTO doctor VALUES ('$name','$login_id','$pwd','$date_of_birth',$age,'$address','$email_id',$phone,'$specialization',$setup)";


    $result = $conn->query($query);

    if($result==true)
    {
        echo "INSERTED";
    }
    else
    {
        echo "FAILED";
    }


    $type = "success";
    $message = "Form Data inserted into the Database";
    echo $message;
}
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
  <div align = "right">
    <a href="login.php">Return to Login</a>
  </div>
    <H1 class="main_heading"> DOCTOR REGISTRATION </H1>
    <div class="container">
  <?php
  $query2= "SELECT max(setup) as ms from doctor";
  $result2 = $db->select($query2);
  foreach ($result2 as $row2) {
    $ms = $row2['ms'];
  }
  $ms = $ms + 1;
   ?>
<form  action="doctor_reg.php" method="post">
                <div>
                    <label>SET UP NUMBER:</label>
                    <input  type="number" name="setup" value=<?php echo $ms ?> readonly />
                    <br>
                    <br>
                    <label>NAME:</label>
                    <input  type="text" name="name"/>
                    <br>
                    <br>
                    <label>Specialization:</label>
                    <input type="text" name="specialization">
                    <br>
                    <br>
                    <label>LOGIN ID</label>
                    <input type="text" name="login_id"/>
                    <br>
                    <br>
                    <label>PASSWORD:</label>
                    <input type="password" name="pwd">
                    <br>
                    <br>
                    <label>EMAIL-ID:</label>
                    <input type="email_id" name="email_id">
                    <br>
                    <br>
                    <label>Phone Number:</label>
                    <input type="phone" name="phone">
                    <br>
                    <br>
                    <label>Date of birth</label>
                    <input type="date" name="date_of_birth">
                    <br>
                    <br>
                    <label>AGE:</label>
                    <input type="number" name="age">
                    <br>
                    <br>
                    <label>Address:</label>
                    <input type="text" name="address">
                    <br>
                    <br>
                    <button class="button" type="submit"  name="form-import" value="true">Insert</button>
                    <br>
                </div>
</form>
</div>
</body>
</html>
