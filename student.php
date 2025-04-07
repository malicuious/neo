<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>學生表單</title> 
    </head>
    <body>
        <h1>student</h1>
        <form action="submit_movie.php" method="POST">
            <fieldset>
                <legend>student</legend>

                <p>
                    <label for="text">學生名稱</label>
                    <input type="text" name="name" id="name" placeholder="學生名稱" required>
                </p>

                <p>
                    <label for="sid">學號</label>
                    <input type="sid" name="sid" id="sid" placeholder="學號">
                </p>

                <p>
                    <label for="">性別</label>
                    <input type="radio" name="gender" id="gender1" value="M">
                    <label for="gender1">男生</label>
                    <input type="radio" name="gender" id="gender2" value="F">
                    <label for="gender2">女生</label>
                    </p>                

                <p>
                    <label for="date">出生日期</label>
                    <input type="date" name="date" id="date" value="<?= date('Y-m-d') ?>" required>
                </p>

                <p>
                    <label for="mail">電子郵件</label>
                    <input type="text" name="mail" id="mail" placeholder="電子郵件" required>
                </p>


                <p>
                    <label for="address">住址</label>
                    <textarea name="text" id="address" placeholder="地址" required></textarea>
                </p>

                <!-- 上傳按鈕 -->
                <p>
                    <button type="submit">上傳資料</button>
                </p>
            </fieldset>
        </form>
    </body>
</html>
