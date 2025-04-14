<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>產品資料表</title> 
    </head>
    <body>
        <h1>產品資料</h1>

        <form action="submit_product.php" method="POST">
            <fieldset>
                <legend>Produce</legend>

                <p>
                    <label for="name">產品名稱</label>
                    <input type="text" name="name" id="name" placeholder="請輸入產品名稱" maxlength="64" required>
                </p>

                <p>
                    <label for="pspec">產品規格</label>
                    <input type="text" name="pspec" id="pspec" placeholder="請輸入產品規格" maxlength="64" required>
                </p>

                <p>
                    <label for="price">產品定價</label>
                    <input type="number" name="price" id="price" step="1" required>
                </p>

                <p>
                    <label for="pdate">製作日期</label>
                    <input type="date" name="pdate" id="pdate" value="<?= date('Y-m-d') ?>" required>
                </p>

                <p>
                    <label for="content">內容說明</label>
                    <textarea id="content" name="content" rows="3" cols="20" maxlength="500"></textarea>
                </p>

                <p>
                    <input type="submit" value="提交">
                </p>
            </fieldset>
        </form>
    </body>
</html>
