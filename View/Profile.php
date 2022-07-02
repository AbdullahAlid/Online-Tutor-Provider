<?php
 session_start();
 if (isset($_SESSION['uname'])) {
    echo "<h2>Welcome to product page Mr. ". $_SESSION['uname']. "</h2>";
  
}else{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>
    <table align="center">
        <tr>
            <td><b>Name:</b></td>
            <td><?php echo $_SESSION['name'];?></td></tr>
            <tr>
            <td><b>Email:</b></td>
            <td><?php echo $_SESSION['email'];?></td></tr>
            <tr>
            <td><b>Phone No.:</b></td>
            <td><?php echo $_SESSION['phone'];?></td></tr>
            <tr>
            <td><b>Username:</b></td>
            <td><?php echo $_SESSION['uname'];?></td></tr>
            <tr>
            <td><b>Class:</b></td>
            <td><?php echo $_SESSION['class'];?></td></tr>
            <tr>
            <td><b>Group:</b></td>
            <td><?php echo $_SESSION['group'];?></td></tr>
            <tr>
            <td><b>About:</b></td>
            <td><?php echo $_SESSION['about'];?></td></tr>
            <tr>
            <td><b>DOB:</b></td>
            <td><?php echo $_SESSION['dob'];?></td></tr>
            <tr>
            <td><b>Gender:</b></td>
            <td><?php echo $_SESSION['gender'];?></td></tr>
            <tr>
            <td><b>Area:</b></td>
            <td><?php echo $_SESSION['area'];?></td></tr>
            <tr>
            <td><b><a href="Logout.php">Logout</a></b></td>
            <td><b><a href="Edit_profile.php">Edit</a></b></td></tr>
        
    </table>
</body>
</html>