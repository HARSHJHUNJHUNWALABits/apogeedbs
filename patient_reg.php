<?php
session_start();
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

//echo "Welcome to patient's registration";


if(isset($_POST['form-import'])){

    //$_SESSION['testform']=true;
    // if (isset($_POST['treatment_id'])) {
    //     $treatment_id = $_POST['treatment_id'];
    // }
    $treatment_id = "";
    if (isset($_POST['treatment_id'])) {
        $treatment_id = mysqli_real_escape_string($conn, $_POST['treatment_id']);
    }
    $treatment_id =(int)$treatment_id;

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

    // if (isset($_POST['age'])) {
    //     $age = $_POST['age'];
    // }

    // if (isset($_POST['weight'])) {
    //     $age = $_POST['weight'];
    // }

    $age = "";
    if (isset($_POST['age'])) {
        $age= mysqli_real_escape_string($conn, $_POST['age']);
    }
    $age = (int)$age;

    $weight = "";
    if (isset($_POST['weight'])) {
        $weight= mysqli_real_escape_string($conn, $_POST['weight']);
    }
    $weight = (int)$weight;

    $doctor = "";
    if (isset($_POST['doctor'])) {
        $doctor= mysqli_real_escape_string($conn, $_POST['doctor']);
    }

    $referral = "";
    if (isset($_POST['referral'])) {
        $referral= mysqli_real_escape_string($conn, $_POST['referral']);
    }

    $rabies_vac = "";
    if (isset($_POST['rabies_vac'])) {
        $rabies_vac= mysqli_real_escape_string($conn, $_POST['rabies_vac']);
    }

    $rab_imm_yes = "";
    if (isset($_POST['rab_imm_yes'])) {
        $rab_imm_yes= mysqli_real_escape_string($conn, $_POST['rab_imm_yes']);
    }
    $rab_imm_type = "";
    if (isset($_POST['rab_imm_type'])) {
        $rab_imm_type= mysqli_real_escape_string($conn, $_POST['rab_imm_type']);
    }
    $remarks = "";
    if (isset($_POST['remarks'])) {
        $remarks= mysqli_real_escape_string($conn, $_POST['remarks']);
    }



    $query = "INSERT INTO patient VALUES ($treatment_id,'$name','$login_id','$pwd','$date_of_birth',$age,'$email_id',$phone,$weight,'$referral','$rabies_vac','$rab_imm_yes','$rab_imm_type','$doctor','$remarks')";
    $query1= "INSERT INTO treatment VALUES($treatment_id,(select setup from doctor where name='$doctor'))";


    $result = $conn->query($query);
    $result1 = $conn->query($query1);


    if($result==true &&  $result1==true)
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
    <div class="container">
        <H1 class="main_heading">PATIENT REGISTRATION FORM</H1>
  <?php
  $query2= "SELECT max(treatment_id) as mt from patient";
  $result2 = $db->select($query2);
  foreach ($result2 as $row2) {
    $mt = $row2['mt'];
  }
  $mt = $mt + 1;
   ?>
<form  action="patient_reg.php" method="post">
                <div>
                    <label>TREATMENT ID:</label>
                    <input type="number" name="treatment_id" value=<?php echo $mt ?> readonly />
                    <br>
                    <br>
                    <label>NAME:</label>
                    <input type="text" name="name"/>
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
                    <label>PHONE-NUMBER:</label>
                    <input type="phone" name="phone">
                    <br>
                    <br>
                    <label>DATE OF BIRTH</label>
                    <input type="date" name="date_of_birth">
                    <br>
                    <br>
                    <label>AGE:</label>
                    <input type="number" name="age">
                    <br>
                    <br>
                    <label>WEIGHT:</label>
                    <input type="number" name="weight">
                    <br>
                    <br>
                    <label>DOCTOR:</label>

                    <?php
                    $doc = array();
                    $index = 0;
                    $query3= "SELECT name from doctor";
                    $result3 = $db->select($query3);
                    foreach ($result3 as $row3) {
                      $doc[$index] = $row3['name'];
                      $index = $index + 1;
                    }
                     ?>
                    <select name="doctor">
                    <?php foreach ($doc as $key=>$value): ?>
                     <option value = <?= $value; ?> > <?= $value; ?> </option>
                   <?php endforeach; ?>

                    </select>
                    <br>
                    <br>
                    <label>Are you referred from another healthcare set up or coming directly?</label>
                    <select id="referral" name="referral">
                        <option value = "yes" >Yes</option>
                        <option value = "no" >No</option>
                    </select>
                    <br>
                    <br>
                    <label>Are you administered for Anti rabies vaccine?</label>
                    <select id="rabies_vac" name="rabies_vac">
                      <option value = "yes" >Yes</option>
                      <option value = "no" >No</option>
                    </select>
                    <br>
                    <br>
                    <label>Are you administered for rabies immunoglobulin?</label>
                    <select id="rab_imm_yes" name="rab_imm_yes">
                      <option value = "Yes" >Yes</option>
                      <option value = "No" >No</option>
                    </select>
                    <br>
                    <br>
                    <label>What type of rabies immunoglobulin is being administered?</label>
                    <select id="rab_imm_type" name="rab_imm_type">
                      <option value = "eRIG" >eRIG</option>
                      <option value = "mRIG" >mRIG</option>
                      <option value = "HRIG" >HRIG</option>
                      <option value = "N.A." >Not Available</option>
                    </select>
                    <br>
                    <br>
                    <label>Remarks:</label>
                    <input type="text" name="remarks">
                    <br>
                    <br>
                    <button  class="button hover" type="submit"  name="form-import" value="true"><strong>SUBMIT</strong></button>
                    <br>
                    <br>
                </div>
</form>
</div>
</body>
</html>
