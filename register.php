<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username  = trim($_POST["username"] ?? "");
    $firstname = trim($_POST["firstname"] ?? "");
    $lastname  = trim($_POST["lastname"] ?? "");
    $phone     = trim($_POST["phone"] ?? "");
    $email     = trim($_POST["email"] ?? "");
    $password  = $_POST["password"] ?? "";
    $role      = $_POST["role"] ?? "Student";

    if (empty($username) || empty($firstname) || empty($lastname) || empty($password)) {
        die("Please fill in all required fields.");
    }
    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Username already exists!";
        $check->close();
        $conn->close();
        exit();
    }
    $check->close();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, firstname, lastname, phone, email, password, role)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Database error: " . $conn->error);
    }
    $stmt->bind_param("sssssss", $username, $firstname, $lastname, $phone, $email, $hashedPassword, $role);

    if ($stmt->execute()) {
        header("Location: ./index.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: ./Register.html");
    exit();
}
?>
