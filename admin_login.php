<?php
session_start();
$_SESSION['auth']=false;
error_reporting(E_ERROR | E_PARSE);

if($_POST['ch'])
{
	$host="localhost";
	$user="root";
	$pass="";
	$db="apogee";
	$username=$_POST['username'];
	$password=$_POST['password'];
    // $secretkey="6LfVRJEeAAAAAJFZNOwBsw0CnzillF7gLIiawESA";
    // $ip=$_SERVER['REMOTE_ADDR'];
    // $responsee=$_POST['g-recaptcha-response'];
    // $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responsee&remoteip=$ip";
    // $fire=file_get_contents($url);
    // $data=json_decode($fire);
	$conn=mysqli_connect($host,$user,$pass,$db);
	$query= "SELECT * from admin where login_id='$username' and pwd='$password'";
	$result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)==1)
  {
		session_start();
	 	$_SESSION['auth'] = TRUE;
		$_SESSION['user']=$username;
    header('location:admin_index.php');
  }
  else
	{
		echo 'WRONG USERNAME or PASSWORD!';
	}
}

?>

<html>
<head>
	<style>
		form {
	        border: 3px solid #f1f1f1;
	    }
	    /*assign full width inputs*/

	    input[type=text],input[type=password] {
	        width: 100%;
	        padding: 12px 20px;
	        margin: 8px 0;
	        display: inline-block;
	        border: 1px solid #ccc;
	        box-sizing: border-box;
	    }
	    /*set a style for the buttons*/

	    button{
	        background-color: #00ccff;
	        color: white;
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

	    .container{
	        padding: 16px;
	    }
	    /*set the forgot password text*/
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
		.g-recaptcha
		{
	    	display: inline-block;
		}

		form {
			width: clamp(300px, 50%, 400px);
		}

		.form-wrapper {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100%;
			width: 100%;
			flex-direction: column;
		}

		.logo {
			height: 110px;
			width: auto;
			margin-bottom: 20px;
		}

		.text-center {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div align = "right">
    <a href="login.php" class="button">Return to Login</a>
  </div>
  <div align = "center">
    <br><br><br><br><br>
    <h1>Admin Login</h1>
  </div>
	<div align = "center">
  <form method="POST" action="admin_login.php">
      <div class="container" align = "center">
          <label>Username : </label>
          <br>
          <input type="text" placeholder="Enter Username" name="username">
          <br>
          <br>
          <label>Password : </label>
          <br>
          <input type="password" placeholder="Enter Password" name="password">
          <br>
          <br>
          <div class="text-center">
            <div class="g-recaptcha" data-sitekey="6LfVRJEeAAAAAO5b0-art8x2CUFd2hdmEPN9Rn1J">
            </div>
        </div>
          <button type="submit" name="ch" value="true">Login</button>
          <br>
		</div>
</body>
</html>
