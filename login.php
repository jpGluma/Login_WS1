<?php
session_start();
require_once "db.php";
$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if (empty($username) || empty($password)) {
    die("Please enter your username and password.");
}
$sql = "SELECT id, username, password, role FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Database error: " . $conn->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row["password"])) {
        $_SESSION["user_id"]  = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["role"]     = $row["role"];

        if ($row["role"] === "Admin") {
            header("Location: ./AdminDashboard.html");
            exit();
        } elseif ($row["role"] === "Teacher") {
            header("Location: ./TeacherDashboard.html");
            exit();
        } elseif ($row["role"] === "Student") {
            header("Location: ./StudentDashboard.html");
            exit();
        } else {
            echo "Invalid user role.";
        }
    } else {
        echo "Wrong username or password.";
    }
} else {
    echo "Username not found.";
}

$stmt->close();
$conn->close();
?>
