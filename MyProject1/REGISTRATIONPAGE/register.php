<?php

include 'db.php';

if (isset($_POST['register.php'])) {
    $username  = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $phone     = $_POST['phone'];
    $email     = $_POST['email'];
    $password  = $_POST['password'];
    $password = md5($password);

   
    $checkusername = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkusername);

    if ($result->num_rows > 0) {

        echo "Username already exists!";

    } else {

      
        $insertQuery = "
            INSERT INTO user 
            (username, firstname, lastname, phone, email, password)
            VALUES 
            ('$username', '$firstname', '$lastname', '$phone', '$email', '$password')
        ";

        if ($conn->query($insertQuery) === TRUE) {

         
            header("Location: ../LOGINPAGE/index.html");
            exit();

        } else {

            echo "Error: " . $conn->error;
        }
    }
}

?>
