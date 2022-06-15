<?php
include 'create.php';

// Input validation section

$fname = $lname = $email = "";
$fnameErr = $lnameErr = $emailErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["fname"])){
        $fnameErr = "Name is required";
    } else{
        $fname = test_input($_POST["fname"]);
    }

    if(empty($_POST["lname"])){
        $lnameErr = "Surname is required";
    }else{
        $lname = test_input($_POST["lname"]);
    }

    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    } else{
        $email = test_input($_POST["email"]);
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet/less" type="text/css" href="style.less" />
    <link rel="stylesheet/less" type="text/css" href="responsive.less" />
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="script.js"></script>
    <title>Sign Up </title>
</head>
<body>
<div class="formDiv">
        <form action="" method="post" class="form" id="form">
            <p class="signup">Sign Up</p>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="Enter your name">
            <span class="error">*<?php echo $fnameErr; ?></span>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Enter your surname">
            <span class="error">*<?php echo $lnameErr; ?></span>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <span class="error">*<?php echo $emailErr; ?></span>
            <button type="submit" id="submit" name="submit">Send</button>
            <button ><a href="view.php" >See List</a></button>

        </form>
    </div>
    
</body>
</html>