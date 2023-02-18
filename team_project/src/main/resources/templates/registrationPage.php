<?php

    if (isset($_POST['submit'])) {
        require_once('connect.php');

        $email = $password = $confirm_pass = $firstname = $lastname = $address = $telephone ='';
        
        $email = $_POST['EmailAddress'];
        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $address = $_POST['Address'];
        $password = $_POST['Password'];
        $confirmPassword = $_POST['confirmPassword'];
        $telephone = $_POST['phone'];
        
 
        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE user_email ='$email'");
        if (mysqli_num_rows($duplicate)> 0) {
            echo "<script> alert('Email has been taken'); </script>";
        } elseif ($password == $confirmPassword)
        { $password = md5($password);
        
        $sql = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password, user_address, telephone_number)
        VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$telephone')";
        
        
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo("Success!");
            header("Location: registrationPage.html");
        }
        }else if ($password != $confirmPassword) {
        echo  "<script> alert('Passwords do not match'); </script>";} }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <link rel="stylesheet" href="../static/registrationPage.css">
</head>

<body>
    <h1>To create an account, <br> Register below:</h1>
    <form id="register" method="post">
        <p1>First name:</p1>
        <input type="text" name="Fname" class="name-input, name-shadow" id="Fname"
            placeholder="Please enter your first name">
        <br>
        <br>
        <p1>Last name:</p1>
        <input type="text" name="Lname" class="" id="Lname" placeholder="Please enter your last name">
        <br>
        <br>
        <p1>Email address:</p1>
        <input type="email" name="EmailAddress" class="" id="EmailAddress" placeholder="Please enter a valid email">
        <br>
        <br>
        <p1>Password:</p1>
        <input type="Password" id="Password" name="Password" class="" minlength="8" placeholder="Enter a password">
        <br>
        <br>
        <p1>Confirm password:</p1>
        <input type="password" id="confirmPassword" name="confirmPassword" class="" minlength="8"
            placeholder="Confirm password">
        <br>
        <br>
        <p1>Address:</p1>
        <input type="text" name="Address" class="" id="Address" placeholder="Enter your address">
        <br>
        <br>
        <p1>Telephone number:</p1>
        <input type="tel" id="phone" name="phone" class="" placeholder="01234567890" pattern="[0-9]{11}" required>
        <br>
        <br>
        <input type="submit" value="Submit" name="submit" class="submit-button" id="submit">
    </form>

</body>


</html>

<script>
    var firstPassword = document.getElementById("Password"),
        confirmPassword = document.getElementById("confirmPassword");

    function validatePassword() {
        if (firstPassword.value != confirmPassword.value) {
            confirmPassword.setCustomValidity("Passwords Don't Match");
        } else {
            confirmPassword.setCustomValidity('');
        }
    }

    firstPassword.onchange = validatePassword;
    confirmPassword.onkeyup = validatePassword;
</script>