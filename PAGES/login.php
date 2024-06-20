<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debugging: Echo email and password
    echo "Email: $email<br>";
    echo "Password: $password<br>";

    $stmt = $conn->prepare("SELECT user_id, username, password FROM user WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Debugging: Echo number of rows
        echo "Number of rows: " . $stmt->num_rows . "<br>";

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $username, $hashed_password);
            $stmt->fetch();

            // Debugging: Echo fetched data
            echo "User ID: $user_id<br>";
            echo "Username: $username<br>";
            echo "Hashed Password: $hashed_password<br>";

            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;

                // Debugging: Echo success message
                echo "Login successful! Redirecting...<br>";

                // Redirect to customer_data.php
                header("Location: customer_data.php");
                exit();
            } else {
                $error = "Password salah";
                echo $error;
            }
        } else {
            $error = "Email tidak ditemukan";
            echo $error;
        }

        $stmt->close();
    } else {
        // Debugging: Echo statement preparation error
        echo "Statement preparation failed: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="POST" action="login.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
