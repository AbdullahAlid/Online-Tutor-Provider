<?php
session_start();
$un = $pass="";
$unErr = $passErr ="";
$msg = "";
$error=1;
  
include '../Controller/DataController.php' ;

$data = loadData();
if(isset($_POST["submit"])) {
    
if (empty($_POST["un"])) {
    $unErr = "Username is required";
  } else {
    $un = $_POST["un"];
    $error = 0;
    
    }
  
   
  if (empty($_POST["pass"])) {
    $passErr = "password is required";
    $error = 1;
  } else {
    $pass = $_POST["pass"];
    $error = 0;
    
    }
    if ($error==0){
        foreach($data as $row)  
{  
    
    
    if($row['username']==$_POST["un"] and $row['password']==$_POST["pass"]){
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['e-mail'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['uname'] = $row['username'];
        $_SESSION['pass'] = $row['password'];
        $_SESSION['class'] = $row['class'];
        $_SESSION['group'] = $row['group'];
        $_SESSION['about'] = $row['about'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['gender'] = $row['gender'];
        $_SESSION['area'] = $row['area'];
	    header("location:Profile.php");
        break;
    }
    else{
        $msg = "invalid username or password";
    }
     
}  echo $msg;
    }
  }


 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .error {color: #FF0000;}
    </style>
    <title>Document</title>
</head>
<body>
<form method="post" >  
  <fieldset>
  <legend><h2 align="center">Login Form</h2></legend>
  <table align="center">
  <tr>
    <td><b>Username:</b> </td>
    <td><input type="text" name="un" value="<?php echo $un;?>"></td>
    <td><span class="error">* <?php echo $unErr;?></span></td>
  </tr>
  <tr>
    <td><b>Password:</b> </td>
    <td><input type="password" name="pass" ></td>
    <td><span class="error">* <?php echo $passErr;?></span></td>
  </tr>
  </tr>
  <tr><td><input type="submit" name="submit" value="Login"></td></tr>
</table>
  



</fieldset>
</body>
</html>