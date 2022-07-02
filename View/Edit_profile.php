<?php  
session_start();
include '../Controller/DataController.php';
$error=1;
$nameErr  = $emailErr =  $opassErr= $npassErr=$classErr=$groupErr=$areaErr= $phoneErr="";
$name =$email =   $opass=$npass=  $class= $group= $area= $phone=""; 
 if(isset($_POST["submit"]))  
 {  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
    $_SESSION['name'] = $_POST["name"];
    $error = 0;
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $error = 1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $error = 1;
  } else {
    $email = $_POST["email"];
    $_SESSION['email'] = $_POST["email"];
    $error = 0;
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $error = 1;
    }
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
    $error = 1;
  } else {
    $phone = $_POST["phone"];
    $_SESSION['phone'] = $_POST["phone"];
    $error = 0;
    // check if e-mail address is well-formed
    if (strlen($phone)!=11) {
      $phoneErr = "Invalid phone number";
      $error = 1;
    }
  }

  
   
  if (empty($_POST["opass"])) {
    $opassErr = "password is required";
    $error = 1;
  } else {
    $opass = $_POST["opass"];
    
    $error = 0;

    // check if e-mail address is well-formed
    if ($_SESSION["pass"]!=$_POST["opass"]) {
      $opassErr = "password must match";
      $opass="";
      $error = 1;
    }
  }
  if (empty($_POST["npass"])) {
    $npassErr = "password is required";
    $error = 1;
  } else {
    $npass = $_POST["npass"];
    $_SESSION['pass'] = $_POST["npass"];
    $error = 0;

    // check if e-mail address is well-formed
    if (strlen($npass)<8) {
      $npassErr = "password must be more than 7 character";
      $npass="";
      $error = 1;
    }
  }
  
  
  if ($_POST["class"]=="0") {
    $classErr = "class is required";
    $error = 1;
  } else {
    $class = $_POST["class"];
    $_SESSION['class'] = $_POST["class"];
    $error = 0;
  }
  if ($_POST["group"]=="0") {
    $groupErr = "group is required";
    $error = 1;
  } else {
    $group = $_POST["group"];
    $_SESSION['group'] = $_POST["group"];
    $error = 0;
  }

  


  if ($_POST["area"]=="0") {
    $areaErr = "Area is required";
    $error = 1;
  } else {
    $area = $_POST["area"];
    $_SESSION['area'] = $_POST["area"];
    $error = 0;
  }
  
}

  if($error==0){   
        

    $jsonString = file_get_contents('../data/data.json');
    $data = json_decode($jsonString, true);

        foreach ($data as $key => $entry) {
            if ($entry['username'] == $_SESSION["uname"]) {
                $data[$key]['name'] = $name;
                $data[$key]['e-mail'] = $email;
                $data[$key]['phone'] = $phone;
                $data[$key]['password'] = $npass;
                $data[$key]['class'] = $class;
                $data[$key]['gruop'] = $group;
                $data[$key]['area'] = $area;

            }
        }
        $newJsonString = json_encode($data);
       
        if(file_put_contents('../data/data.json', $newJsonString))  
        {  
            header("location:Profile.php");
        }
                          
  }
  
   
  
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .error {color: #FF0000;}
    </style>
    <title>Registration</title>
</head>

<body>
    <?php
    

?>
<form method="post" >  
  <fieldset>
  <legend><h2 align="center">Edit Profile</h2></legend>
 
  

<table align="center">
  
  <tr>
    <td><b>Name:</b> </td>
    <td><input type="text" name="name" value="<?php echo $_SESSION['name'];?>"></td>
    <td><span class="error">* <?php echo $nameErr;?></span></td>
  </tr>
  <tr>
    <td><b>E-mail:</b> </td>
    <td><input type="text" name="email" value="<?php echo $_SESSION['email'];?>"></td>
    <td><span class="error">* <?php echo $emailErr;?></span></span></td>
  </tr>
  <tr>
    <td><b>Phone No.:</b> </td>
    <td><input type="text" name="phone" value="<?php echo $_SESSION['phone'];?>"></td>
    <td><span class="error">* <?php echo $phoneErr;?></span></span></td>
  </tr>
  
  <tr>
    <td><b> Old Password:</b> </td>
    <td><input type="password" name="opass" ></td>
    <td><span class="error">* <?php echo $opassErr;?></span></td>
  </tr>
  <tr>
    <td><b> New Password:</b> </td>
    <td><input type="password" name="npass" ></td>
    <td><span class="error">* <?php echo $npassErr;?></span></td>
  </tr>
 
  <tr>
    <td><b>Class:</b> </td>
    <td><select name="class">
        <option value="0">Select Class</option>
        <option value="One">One</option>
        <option value="Two">Two</option>
        <option value="Three">Three</option>
        <option value="Four">Four</option>
        <option value="Five">Five</option>
        <option value="Six">Six</option>
        <option value="Seven">Seven</option>
        <option value="Eight">Eight</option>  
        <option value="Nine">Nine</option>
        <option value="Ten">Ten</option>
        <option value="Intermediate 1st year">Intermediate 1st year</option>
        <option value="Intermediate 2nd year">Intermediate 2nd year</option>
        <option value="Admission">Admission</option>  
    </select></td>
    <td><span class="error">* <?php echo $classErr;?></span></td>
  </tr>
  <tr>
    <td><b>Group:</b> </td>
    <td><select name="group">
      <option value="0">Select group</option>
        <option value="None">None</option>
        <option value="Science">Science</option>
        <option value="Commerce">Commerce</option>
        <option value="Arts">Arts</option>      
    </select></td>
    <td><span class="error">* <?php echo $groupErr;?></span></td>
  </tr>
 

  <tr>
    <td><b>Area:</b> </td>
    <td><select name="area">
        <option  value="0">Select Area</option>
        <option <?php if (isset($area) && $area=="Bashundhara") echo "selected";?> value="Bashundhara">Bashundhara</option>
        <option <?php if (isset($area) && $area=="Uttara") echo "selected";?> value="Uttara">Uttara</option>
        <option <?php if (isset($area) && $area=="Banani") echo "selected";?> value="Banani">Banani</option>
        <option <?php if (isset($area) && $area=="Baridhara") echo "selected";?> value="Baridhara">Baridhara</option>
        <option <?php if (isset($area) && $area=="Banasree") echo "selected";?> value="Banasree">Banasree</option>
        <option <?php if (isset($area) && $area=="Dhanmondi") echo "selected";?> value="Dhanmondi">Dhanmondi</option>
        <option <?php if (isset($area) && $area=="Mohammadpur") echo "selected";?> value="Mohammadpur">Mohammadpur</option>
        <option <?php if (isset($area) && $area=="Mirpur") echo "selected";?> value="Mirpur">Mirpur</option>    
    </select></td>
    <td><span class="error">* <?php echo $areaErr;?></span></td>
  </tr>
  <tr><td><input type="submit" name="submit" value="Update"></td></tr>
</table>


</fieldset>
</form>
</body>
</html>
