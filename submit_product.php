<?php
$servername = "localhost";
$username = "root";  // 根據你的資料庫設定調整
$password = "";      // 密碼（若有設定的話）
$dbname = "product_db";  // 資料庫名稱

// 建立資料庫連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 接收表單資料
$name = $_POST['name'];
$pspec = $_POST['pspec'];
$price = $_POST['price'];
$pdate = $_POST['pdate'];
$content = $_POST['content'];

// 插入資料到資料表
$sql = "INSERT INTO products (name, pspec, price, pdate, content)
        VALUES ('$name', '$pspec', '$price', '$pdate', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "新產品資料已成功儲存";
} else {
    echo "錯誤: " . $sql . "<br>" . $conn->error;
}

// 關閉資料庫連接
$conn->close();
?>
