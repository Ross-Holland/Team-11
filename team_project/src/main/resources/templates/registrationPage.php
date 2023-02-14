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