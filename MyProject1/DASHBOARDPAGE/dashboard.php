<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../LOGINPAGE/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>

<body>

<h1>Welcome, <?php 
echo htmlspecialchars($_SESSION["username"]);
 ?>
 !
</h1>

<p>You are successfully logged in.</p>

</body>
</html>