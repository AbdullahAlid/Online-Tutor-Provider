<?php  

include '../Controller/DataController.php';
$error=1;
$nameErr = $dateErr = $emailErr = $genderErr = $unErr = $passErr= $conpassErr=$classErr=$groupErr=$areaErr= $phoneErr="";
$name =$date = $email = $gender = $about = $un = $pass= $conpass= $class= $group= $area= $phone=""; 
 if(isset($_POST["submit"]))  
 {  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];
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
    $error = 0;
    // check if e-mail address is well-formed
    if (strlen($phone)==11) {
      $phoneErr = "Invalid phone number";
      $error = 1;
    }
  }

  if (empty($_POST["un"])) {
    $unErr = "Username is required";
  } else {
    $un = $_POST["un"];
    $error = 0;
    // check if e-mail address is well-formed
    if (strlen($un)<5) {
      $unErr = "username must be more than 5 character";
      $error = 1;
    }
  }
   
  if (empty($_POST["pass"])) {
    $passErr = "password is required";
    $error = 1;
  } else {
    $pass = $_POST["pass"];
    $error = 0;

    // check if e-mail address is well-formed
    if (strlen($pass)<8) {
      $passErr = "password must be more than 7 character";
      $pass="";
      $error = 1;
    }
  }
  if (empty($_POST["conpass"])) {
    $conpassErr = "password is required";
    $error = 1;
  } else {
    $conpass = $_POST["conpass"];
    $error = 0;
    // check if e-mail address is well-formed
    if ($pass!=$conpass) {
      $conpassErr = "password must match";
      $un="";
      $error = 1;
    }
  }
  if ($_POST["class"]=="0") {
    $classErr = "class is required";
    $error = 1;
  } else {
    $class = $_POST["class"];
    $error = 0;
  }
  if ($_POST["group"]=="0") {
    $groupErr = "group is required";
    $error = 1;
  } else {
    $group = $_POST["group"];
    $error = 0;
  }

  if (empty($_POST["about"])) {
    $about = "";
  } else {
    $about = $_POST["about"];
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
    $error = 1;
  } else {
    $gender = $_POST["gender"];
    $error = 0;
  }
  if ($_POST["area"]=="0") {
    $areaErr = "Area is required";
    $error = 1;
  } else {
    $area = $_POST["area"];
    $error = 0;
  }
  if (empty($_POST["date"])) {
    $dateErr = "date is required";
    $error = 1;
  }
  else if (isset($_POST["date"])>01/01/2010) {
    $dateErr = "Tell your guardian to register";
    $error = 1;
  } else {
    $date = $_POST["date"];
    $error = 0;
  }

}

  if($error==0){
    if(file_exists('../data/data.json'))  
    {  
         $extra = array(  
              'name'       =>     $name,  
              'e-mail'     =>     $email,
              'phone'      =>    $phone,
              'username'   =>     $un, 
              'password'   =>     $pass,
              'class'     => $class,
              'group' =>$group,
              'about' =>$about,
              'dob'        =>     $date,
              'gender'     =>     $gender,  
              'area'      =>   $area

         ); 
         addData($extra);
    }  
    else  
    {  
         $error = 'JSON File not exits';  
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
  <legend><h2 align="center">Registration Form</h2></legend>
 
  

<table align="center">
  
  <tr>
    <td><b>Name:</b> </td>
    <td><input type="text" name="name" value="<?php echo $name;?>"></td>
    <td><span class="error">* <?php echo $nameErr;?></span></td>
  </tr>
  <tr>
    <td><b>E-mail:</b> </td>
    <td><input type="text" name="email" value="<?php echo $email;?>"></td>
    <td><span class="error">* <?php echo $emailErr;?></span></span></td>
  </tr>
  <tr>
    <td><b>Phone No.:</b> </td>
    <td><input type="number" name="phone" value="<?php echo $phone;?>"></td>
    <td><span class="error">* <?php echo $phoneErr;?></span></span></td>
  </tr>
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
  <tr>
    <td><b>Confirm Password:</b> </td>
    <td><input type="password" name="conpass" ></td>
    <td><span class="error">* <?php echo $conpassErr;?></span></td>
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
    <td><b>About Yourself:</b> </td>
    <td><textarea name="about" ><?php echo $about;?></textarea></td>
    <td></td>
  </tr>
  <tr>
    <td><b>Date of Birth:</b> </td>
    <td><input type="date" name="date" value="<?php echo $date;?>"></td>
    <td><span class="error">* <?php echo $dateErr;?></span></td>
  </tr>
  <tr>
    <td><b>Gender:</b> </td>
    <td><input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other </td>
    <td><span class="error">* <?php echo $genderErr;?></span></td>
  </tr>
  <tr>
    <td><b>Area:</b> </td>
    <td><select name="area">
        <option  value="0">Select Area</option>
        <option <?php if (isset($area) && $area=="Bashundhara") echo "selected";?> value="Bashundhara">Bashundhara</option>
        <option <?php if (isset($area) && $gender=="Uttara") echo "selected";?> value="Uttara">Uttara</option>
        <option <?php if (isset($area) && $gender=="Banani") echo "selected";?> value="Banani">Banani</option>
        <option <?php if (isset($area) && $gender=="Baridhara") echo "selected";?> value="Baridhara">Baridhara</option>
        <option <?php if (isset($area) && $gender=="Banasree") echo "selected";?> value="Banasree">Banasree</option>
        <option <?php if (isset($area) && $gender=="Dhanmondi") echo "selected";?> value="Dhanmondi">Dhanmondi</option>
        <option <?php if (isset($area) && $gender=="Mohammadpur") echo "selected";?> value="Mohammadpur">Mohammadpur</option>
        <option <?php if (isset($area) && $gender=="Mirpur") echo "selected";?> value="Mirpur">Mirpur</option>    
    </select></td>
    <td><span class="error">* <?php echo $areaErr;?></span></td>
  </tr>
  <tr><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>


</fieldset>
</form>
</body>
</html>
