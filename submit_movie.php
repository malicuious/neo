<?php
// 資料庫連接設定
$servername = "localhost";
$username = "root";  // 資料庫用戶名
$password = "";  // 資料庫密碼
$dbname = "movie_db";  // 資料庫名稱

// 創建資料庫連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查資料庫連接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 檢查表單是否已提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 從表單中獲取資料
    $title = $_POST['title'];
    $year = $_POST['year'];
    $director = $_POST['director'];
    $mtype = $_POST['mtype'];
    $mdate = $_POST['mdate'];
    $contant = $_POST['contant'];

    // 防止 SQL 注入
    $title = $conn->real_escape_string($title);
    $director = $conn->real_escape_string($director);
    $mtype = $conn->real_escape_string($mtype);
    $contant = $conn->real_escape_string($contant);

    // SQL 查詢，將資料插入資料庫
    $sql = "INSERT INTO movie (title, year, director, mtype, mdate, contant)
            VALUES ('$title', '$year', '$director', '$mtype', '$mdate', '$contant')";

    if ($conn->query($sql) === TRUE) {
        echo "新電影資料已成功提交！";
    } else {
        echo "錯誤: " . $sql . "<br>" . $conn->error;
    }

    // 關閉資料庫連接
    $conn->close();
} else {
    echo "未提交表單。";
}
?>
