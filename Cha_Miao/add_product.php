<?php
session_start();
include("db.php");
if (!isset($_SESSION['username'])) { header("Location: login.php"); exit(); }

if (isset($_POST['submit_product'])) {
    $p_name  = mysqli_real_escape_string($conn, $_POST['product_name']);
    $p_price = $_POST['price'];
    $p_stock = $_POST['stock'];
    $p_desc  = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO add_product (product_name, price, stock_quantity, description) 
            VALUES ('$p_name', '$p_price', '$p_stock', '$p_desc')";
    if (mysqli_query($conn, $sql)) { echo "<script>alert('บันทึกสินค้าเรียบร้อย!');</script>"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>เพิ่มสินค้า - Cha Miao</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');
        body { font-family: 'Kanit', sans-serif; background: #f9f9f9; margin: 0; }
        .header { background: #fff; padding: 15px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; }
        .content { max-width: 500px; margin: 40px auto; background: #fff; padding: 35px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        input, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #eee; border-radius: 10px; box-sizing: border-box; }
        button { width: 100%; padding: 14px; background: #f39c12; color: white; border: none; border-radius: 10px; font-size: 16px; cursor: pointer; transition: 0.3s; }
        button:hover { background: #e67e22; }
    </style>
</head>
<body>
    <div class="header">
        <strong>Cha Miao Inventory</strong>
        <div>
            <a href="add_user.php" style="text-decoration:none; color:#666;">จัดการผู้ใช้</a> | 
            <a href="logout.php" style="text-decoration:none; color:red;">Logout</a>
        </div>
    </div>
    <div class="content">
        <h2>📦 เพิ่มสินค้าใหม่</h2>
        <form method="post">
            <input type="text" name="product_name" placeholder="ชื่อสินค้า" required>
            <input type="number" step="0.01" name="price" placeholder="ราคา" required>
            <input type="number" name="stock" placeholder="จำนวนในสต็อก" required>
            <textarea name="description" rows="4" placeholder="รายละเอียดสินค้า"></textarea>
            <button type="submit" name="submit_product">บันทึกรายการสินค้า</button>
        </form>
    </div>
</body>
</html>