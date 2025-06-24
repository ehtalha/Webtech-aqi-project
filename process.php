<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $favcolor = $_POST['favcolor'] ?? '';
    setcookie("favcolor", $favcolor, time() + (86400 * 30), "/"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Preview</title>
    <link href="process.css" rel="stylesheet">
</head>
<body>
    <h2>Submitted Information Preview</h2>
    <div class="container">
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "info"; 

    $conn = new mysqli($host, $user, $pass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Fetch POST data safely
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmpass = $_POST['confirmpass'] ?? '';
        $dob = $_POST['dob'] ?? '';
        $country = $_POST['country'] ?? '';
        $favcolor = $_POST['favcolor'] ?? '';
        $gender = $_POST['gender'] ?? '';

        // Display data in a table
        echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;margin:auto auto'>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Full Name</td><td>" . htmlspecialchars($name) . "</td></tr>";
        echo "<tr><td>Email</td><td>" . htmlspecialchars($email) . "</td></tr>";
        echo "<tr><td>Password</td><td>" . htmlspecialchars($password) . "</td></tr>";
        echo "<tr><td>Confirm Password</td><td>" . htmlspecialchars($confirmpass) . "</td></tr>";
        echo "<tr><td>Date of Birth</td><td>" . htmlspecialchars($dob) . "</td></tr>";
        echo "<tr><td>Country</td><td>" . htmlspecialchars($country) . "</td></tr>";
        echo "<tr><td>Favorite Color</td>
                <td>
                    <span style='display:inline-block;width:20px;height:20px;background:" . htmlspecialchars($favcolor) . ";border:1px solid #000;vertical-align:middle;'></span>
                    &nbsp;" . htmlspecialchars($favcolor) . "
                </td></tr>";
        echo "<tr><td>Gender</td><td>" . htmlspecialchars($gender) . "</td></tr>";
        echo "</table>";

        // Insert into database only if 'confirm_submit' is set
        if (isset($_POST['confirm_submit'])) {
            $stmt = $conn->prepare("INSERT INTO userdata (name, email, password, confirmpass, dob, country, favcolor, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("ssssssss", $name, $email, $password, $confirmpass, $dob, $country, $favcolor, $gender);
                if ($stmt->execute()) {
                    echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
                    exit;
                } else {
                    echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
                }
                $stmt->close();
            } else {
                echo "<p style='color:red;'>Prepare failed: " . $conn->error . "</p>";
            }
        }

        // Show confirm/cancel form
        ?>
        <form method="post" action="" style="text-align: center; margin-top: 20px;">
            <input type="hidden" name="name" value="<?= htmlspecialchars($name) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <input type="hidden" name="password" value="<?= htmlspecialchars($password) ?>">
            <input type="hidden" name="confirmpass" value="<?= htmlspecialchars($confirmpass) ?>">
            <input type="hidden" name="dob" value="<?= htmlspecialchars($dob) ?>">
            <input type="hidden" name="country" value="<?= htmlspecialchars($country) ?>">
            <input type="hidden" name="favcolor" value="<?= htmlspecialchars($favcolor) ?>">
            <input type="hidden" name="gender" value="<?= htmlspecialchars($gender) ?>">
            <input type="hidden" name="confirm_submit" value="1">

            <button type="button" onclick="window.location.href='index.php'" style="padding: 10px 20px;">Cancel</button>
            <button type="submit" style="padding: 10px 20px;">Confirm</button>
        </form>
        <?php
    } else {
        echo "<p>No data submitted.</p>";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
