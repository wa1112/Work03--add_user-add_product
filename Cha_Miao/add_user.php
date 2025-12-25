<?php
session_start();
include("db.php");
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit(); }

$msg = "";
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role     = $_POST['role'];

    $sql = "INSERT INTO add_user (username, password_hash, role) VALUES ('$username', '$password', '$role')";
    if (mysqli_query($conn, $sql)) { $msg = "✅ เพิ่มผู้ใช้เรียบร้อย!"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>จัดการผู้ใช้ - Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
        body { font-family: 'Kanit', sans-serif; background: #f4f7f6; margin: 0; }
        .nav { background: #333; color: white; padding: 15px; display: flex; justify-content: space-between; }
        .nav a { color: white; text-decoration: none; margin-left: 15px; }
        .container { max-width: 400px; margin: 50px auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #8e44ad; color: white; border: none; border-radius: 8px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="nav">
        <strong>Cha Miao Admin</strong>
        <div>
            <a href="add_product.php">เพิ่มสินค้า</a>
            <a href="logout.php" style="color:#ff7675;">ออกจากระบบ</a>
        </div>
    </div>
    <div class="container">
        <h3>➕ เพิ่มผู้ใช้งาน</h3>
        <p style="color: green;"><?php echo $msg; ?></p>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" name="submit">บันทึกข้อมูล</button>
        </form>
    </div>
</body>
</html>