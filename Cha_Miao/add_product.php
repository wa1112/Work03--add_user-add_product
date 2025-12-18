<?php
include("db.php");

if (isset($_POST['submit_product'])) {
    $p_name  = mysqli_real_escape_string($conn, $_POST['product_name']);
    $p_price = $_POST['price'];
    $p_stock = $_POST['stock'];
    $p_desc  = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO add_product (product_name, price, stock_quantity, description) 
            VALUES ('$p_name', '$p_price', '$p_stock', '$p_desc')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('เพิ่มสินค้าสำเร็จ!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มสินค้า - Cha Miao</title>
</head>
<body>
    <h2>เพิ่มสินค้าใหม่</h2>
    <form method="post" action="add_product.php">
        ชื่อสินค้า: <input type="text" name="product_name" required><br><br>
        ราคา: <input type="number" step="0.01" name="price" required><br><br>
        จำนวนสต็อก: <input type="number" name="stock" required><br><br>
        รายละเอียด: <br>
        <textarea name="description" rows="4" cols="30"></textarea><br><br>
        <button type="submit" name="submit_product">บันทึกสินค้า</button>
    </form>
    <br><a href="add_user.php">ไปหน้าเพิ่มผู้ใช้</a>
</body>
</html>