<?php
include("db.php");

// ตรวจสอบว่ามีการกดปุ่ม submit หรือยัง
if (isset($_POST['submit'])) {
    
    // รับค่าจาก $_POST โดยเช็คว่ามีค่าส่งมาจริงไหม ถ้าไม่มีให้เป็นค่าว่าง
    $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    $fullname = isset($_POST['fullname']) ? mysqli_real_escape_string($conn, $_POST['fullname']) : "";
    $email    = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : "";
    $role     = isset($_POST['role']) ? mysqli_real_escape_string($conn, $_POST['role']) : "user";

    // คำสั่ง INSERT (เช็คชื่อคอลัมน์ให้ตรงกับที่แก้ใน SQL ด้านบน)
    $sql = "INSERT INTO add_user (username, password_hash, fullname, email, role) 
            VALUES ('$username', '$password', '$fullname', '$email', '$role')";

    if (mysqli_query($conn, $sql)) {
        echo "<p style='color:green;'>✅ เพิ่มผู้ใช้สำเร็จ!</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<h2>เพิ่มผู้ใช้</h2>
<form method="post" action="add_user.php">
    ชื่อผู้ใช้: <input type="text" name="username" required><br><br>
    รหัสผ่าน: <input type="password" name="password" required><br><br>
    สิทธิ์: 
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>
    <button type="submit" name="submit">เพิ่มผู้ใช้</button>
</form>