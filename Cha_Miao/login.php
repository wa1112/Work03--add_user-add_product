<?php
session_start();
include("db.php");
$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM add_user WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password_hash'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: add_product.php");
            exit();
        } else { $error = "รหัสผ่านไม่ถูกต้อง!"; }
    } else { $error = "ไม่พบชื่อผู้ใช้นี้!"; }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - Cha Miao</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap');
        body { font-family: 'Kanit', sans-serif; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 320px; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 10px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #4a90e2; color: white; border: none; border-radius: 10px; cursor: pointer; font-size: 16px; transition: 0.3s; width: 100%; }
        button:hover { background: #357abd; }
        .error { color: #e74c3c; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Cha Miao</h2>
        <?php if($error) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="ชื่อผู้ใช้" required>
            <input type="password" name="password" placeholder="รหัสผ่าน" required>
            <button type="submit" name="login">เข้าสู่ระบบ</button>
        </form>
        <p style="font-size: 14px; color: #666; margin-top: 20px;">ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
    </div>
</body>
</html>