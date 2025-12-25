<?php
include("db.php");
$msg = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = "user";

    // ตรวจสอบ Username ซ้ำ
    $check = mysqli_query($conn, "SELECT id FROM add_user WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $msg = "<div style='color:red;'>❌ ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว!</div>";
    } else {
        // บันทึกเฉพาะ username, password และ role
        $sql = "INSERT INTO add_user (username, password_hash, role) VALUES ('$username', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            $msg = "<div style='color:green;'>✅ สมัครสำเร็จ! <a href='login.php'>ไปที่หน้าล็อคอิน</a></div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก - Cha Miao</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
        body { font-family: 'Kanit', sans-serif; background: #f8f9fa; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); width: 350px; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #eee; border-radius: 10px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #27ae60; color: white; border: none; border-radius: 10px; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>สมัครสมาชิก</h2>
        <?php echo $msg; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">สร้างบัญชี</button>
        </form>
        <p><a href="login.php" style="font-size: 14px;">มีบัญชีอยู่แล้ว? ล็อกอิน</a></p>
    </div>
</body>
</html>