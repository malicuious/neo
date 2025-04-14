<?php
// 資料庫設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_db";

// 建立資料庫連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 每頁顯示的資料筆數
$items_per_page = 10;

// 處理功能的動作
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($action == 'list') {
    // 1. 顯示產品列表
    $sql_count = "SELECT COUNT(*) AS total FROM products";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_items = $row_count['total'];
    $total_pages = ceil($total_items / $items_per_page);
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_limit = ($page - 1) * $items_per_page;

    // 取得產品資料
    $sql = "SELECT id, name, pspec, price, pdate FROM products LIMIT $start_limit, $items_per_page";
    $result = $conn->query($sql);

    echo "<h1>產品資料列表</h1>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>名稱</th><th>規格</th><th>價格</th><th>製作日期</th><th>操作</th></tr>";
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["pspec"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["pdate"] . "</td>";
            echo "<td><a href='?action=view&id=" . $row["id"] . "'>查看</a> | 
                      <a href='?action=edit&id=" . $row["id"] . "'>編輯</a> | 
                      <a href='?action=delete&id=" . $row["id"] . "'>刪除</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // 分頁
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?action=list&page=$i'>$i</a> ";
        }
    } else {
        echo "沒有資料";
    }
} elseif ($action == 'view' && isset($_GET['id'])) {
    // 2. 顯示單筆資料詳細內容
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h1>產品詳細資料</h1>";
        echo "<table border='1' cellpadding='10'>";
        echo "<tr><th>名稱</th><td>" . $row["name"] . "</td></tr>";
        echo "<tr><th>規格</th><td>" . $row["pspec"] . "</td></tr>";
        echo "<tr><th>價格</th><td>" . $row["price"] . "</td></tr>";
        echo "<tr><th>製作日期</th><td>" . $row["pdate"] . "</td></tr>";
        echo "<tr><th>內容說明</th><td>" . $row["content"] . "</td></tr>";
        echo "</table>";
    } else {
        echo "找不到該產品資料";
    }
} elseif ($action == 'add') {
    // 3. 新增資料頁面
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $pspec = $_POST['pspec'];
        $price = $_POST['price'];
        $pdate = $_POST['pdate'];
        $content = $_POST['content'];

        $sql = "INSERT INTO products (name, pspec, price, pdate, content) 
                VALUES ('$name', '$pspec', '$price', '$pdate', '$content')";

        if ($conn->query($sql) === TRUE) {
            echo "新產品資料已成功新增！<br>";
            echo "<a href='?action=list'>回到產品列表</a>";
        } else {
            echo "錯誤: " . $conn->error;
        }
    } else {
        echo "<h1>新增產品</h1>";
        echo "<form method='POST' action='?action=add'>";
        echo "名稱: <input type='text' name='name' required><br>";
        echo "規格: <input type='text' name='pspec' required><br>";
        echo "價格: <input type='number' name='price' step='0.01' required><br>";
        echo "製作日期: <input type='date' name='pdate' required><br>";
        echo "內容說明: <textarea name='content'></textarea><br>";
        echo "<input type='submit' value='提交'>";
        echo "</form>";
    }
} elseif ($action == 'edit' && isset($_GET['id'])) {
    // 4. 修改資料頁面
    $product_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $pspec = $_POST['pspec'];
        $price = $_POST['price'];
        $pdate = $_POST['pdate'];
        $content = $_POST['content'];

        $sql = "UPDATE products SET name='$name', pspec='$pspec', price='$price', pdate='$pdate', content='$content' WHERE id=$product_id";

        if ($conn->query($sql) === TRUE) {
            echo "產品資料已成功更新！<br>";
            echo "<a href='?action=list'>回到產品列表</a>";
        } else {
            echo "錯誤: " . $conn->error;
        }
    } else {
        $sql = "SELECT * FROM products WHERE id=$product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>編輯產品資料</h1>";
            echo "<form method='POST' action='?action=edit&id=$product_id'>";
            echo "名稱: <input type='text' name='name' value='" . $row['name'] . "' required><br>";
            echo "規格: <input type='text' name='pspec' value='" . $row['pspec'] . "' required><br>";
            echo "價格: <input type='number' name='price' value='" . $row['price'] . "' step='0.01' required><br>";
            echo "製作日期: <input type='date' name='pdate' value='" . $row['pdate'] . "' required><br>";
            echo "內容說明: <textarea name='content'>" . $row['content'] . "</textarea><br>";
            echo "<input type='submit' value='提交'>";
            echo "</form>";
        } else {
            echo "找不到該產品資料";
        }
    }
} elseif ($action == 'delete' && isset($_GET['id'])) {
    // 5. 刪除資料
    $product_id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id=$product_id";

    if ($conn->query($sql) === TRUE) {
        echo "產品資料已成功刪除！<br>";
        echo "<a href='?action=list'>回到產品列表</a>";
    } else {
        echo "錯誤: " . $conn->error;
    }
}

$conn->close();
?>
