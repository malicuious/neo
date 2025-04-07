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

// 從資料庫中查詢電影資料
$sql = "SELECT id, title, year, director, mtype, mdate, contant FROM movies";
$result = $conn->query($sql);

// 顯示資料表
if ($result->num_rows > 0) {
    echo "<h1>電影資料列表</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>電影名稱</th><th>發行年分</th><th>導演</th><th>類型</th><th>首映日期</th><th>簡介</th></tr>";
    
    // 輸出每一行資料
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["year"] . "</td>
                <td>" . $row["director"] . "</td>
                <td>" . $row["mtype"] . "</td>
                <td>" . $row["mdate"] . "</td>
                <td>" . $row["contant"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "目前沒有電影資料。";
}

// 關閉資料庫連接
$conn->close();
?>
