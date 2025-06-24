<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginsubmit'])) {
    $email = $_POST["loginemail"] ?? '';
    $password = $_POST["loginpassword"] ?? '';

    $conn = new mysqli("localhost", "root", "", "info");
    if ($conn->connect_error) {
        header("Location: index.html?error=Database+connection+failed");
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if ($password === $user["password"]) {
               
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['name'];  // adjust if needed
                header("Location: requestaqi.php");
                exit;
            } else {
                
                header("Location: index.html?error=Incorrect+password");
                exit;
            }
        } else {
            
            header("Location: index.html?error=Email+not+found");
            exit;
        }
        $stmt->close();
    } else {
    
        header("Location: index.html?error=Query+failed");
        exit;
    }

    $conn->close();
} else {
    
    header("Location: index.html");
    exit;
}
?>

