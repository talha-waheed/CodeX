<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Register / Login</title>
    <style type="text/css">
        body{
        background-color: rgb(99,128,107)
        }
        .btn-group button {
      position: absolute;
      top: 115px;
      left: 5px;
      background-color: #11346b; 
      border: 1px solid green; /* Green border */
      color: white; /* White text */
      padding: 10px 24px; /* Some padding */
      cursor: pointer; /* Pointer/hand icon */
      float: left; /* Float the buttons side by side */
    }
        .btn-group button:hover {
      background-color: #3e8e41;
    }

    </style>

<?php

$servername = "localhost";
$username = "debian-sys-maint";
$password = "NVxKE4bCYGO8nV9Y";
$dbname = "Code-X";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start session
session_start();

// If session doesnt have relevant variables
if (!(isset($_SESSION["username"]) && isset($_SESSION["is_admin"])))
{
    echo "Yeh kya baat hui yaar :( Aap kidhar?";
}
else
{
    if (!($_SESSION["is_admin"]))
    {
        echo $_SESSION["is_admin"];
        echo "<br>Yaar mujhe tou lagta hai aap admin hi nahi ho :(";
    }
    else
    {   
        $username = $_SESSION['username'];
        $f_name = $_POST['first_name'];
        $l_name = $_POST["last_name"];
        $DOB = $_POST["date_of_birth"];
        $org = $_POST["organization"];
        $pass = $_POST["password"];

        if($f_name != ""){ $sql = "UPDATE admin SET first_name= '".$f_name."' WHERE username='".$username."' ";
        if ($conn->query($sql) === TRUE) {
        echo "First Name updated successfully...";
        echo "<br>";
        } else {
        echo "Error updating First Name: " . $conn->error;
        echo "<br>";
        } }

        if($l_name != ""){ $sql = "UPDATE admin SET last_name= '".$l_name."' WHERE username='".$username."' ";
        if ($conn->query($sql) === TRUE) {
        echo "Last Name updated successfully...";
        echo "<br>";
        } else {
        echo "Error updating Last Name: " . $conn->error;
        echo "<br>";
        } }

        if($DOB != ""){ $sql = "UPDATE admin SET date_of_birth= '".$DOB."' WHERE username='".$username."' ";
        if ($conn->query($sql) === TRUE) {
        echo "Date of Birth updated successfully...";
        echo "<br>";
        } else {
        echo "Error updating Date of Birth: " . $conn->error;
        echo "<br>";
        } }

        if($org != ""){ $sql = "UPDATE admin SET organization = '".$org."' WHERE username='".$username."' ";
        if ($conn->query($sql) === TRUE) {
        echo "Organization updated successfully...";
        echo "<br>";
        } else {
        echo "Error updating Organization: " . $conn->error;
        echo "<br>";
        } }

        if($pass != ""){ $sql = "UPDATE admin SET password= '".$pass."' WHERE username='".$username."' ";
        if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully...";
        echo "<br>";
        } else {
        echo "Error updating Password: " . $conn->error;
        echo "<br>";
        } }
    }
}

$conn->close();

?>

</head>
<body>

    <div class="btn-group">
    <button onclick="document.location='admin_portal.php'"  style="width:25%">Return to Admin Portal</button>
  </div>
</body>
</html>
