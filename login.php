<?php
session_start();
// Check if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: admin/index.php");
    exit;
}

require_once 'includes/db_connect.php'; // Adjust path if needed

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Isi username dan password.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $db_username, $db_password_hash);
            $stmt->fetch();

            if (password_verify($password, $db_password_hash)) {
                // SUCCESS: Create Session
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $db_username;
                $_SESSION['loggedin'] = true;
                
                // REDIRECT TO DASHBOARD
                header("location: admin/index.php");
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Username tidak ditemukan.";
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Happy Valley Rinjani</title>
    <style>
        body { font-family: 'Poppins', sans-serif; display: flex; height: 100vh; justify-content: center; align-items: center; background: #f0f2f5; margin: 0; }
        .login-box { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; color: #666; font-weight: 500; }
        .form-group input { width: 100%; padding: 12px; border: 2px solid #e1e1e1; border-radius: 8px; box-sizing: border-box; transition: 0.3s; }
        .form-group input:focus { border-color: #4CAF50; outline: none; }
        button { width: 100%; padding: 12px; background: #4CAF50; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        button:hover { background: #45a049; }
        .error-msg { background: #ffebee; color: #c62828; padding: 10px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 14px; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if($error): ?><div class="error-msg"><?php echo $error; ?></div><?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Masuk Dashboard</button>
        </form>
    </div>
</body>
</html>