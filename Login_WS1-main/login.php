<?php
$massage= "";

if  ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username=  htmlspecialchars(trim($_POST['username']));
    $password= $_POST['password']; 

    if ($username === "user" && $password === "123") {
         header("location: DASHBOARBPAGE/DashboardPage.html");
         exit();
        
    } else {
        $message = "invalid username or password!";

    }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in page</title>
  <link rel="stylesheet" href="LoginForm.css">
</head>

<body>
  <div>
    <h2>Log in</h2>
    <?php if(!empty($massage)): ?>
        <p style = "color: red; margin-button:10px;"><?php echo $massage; ?></p>
    <?php endif; ?>   
    <form class="loginform">
      <input type="text" placeholder="Username" required/>
      <input type="password" placeholder="Password" required/>
      <button type="submit">log in</button>
      
    </form>
    <p>If you don't have a account?</h1><a href="REGISTERPAGE/RegistrationForm.html">Register</a></p>
  </div>
  
</body>

</html>