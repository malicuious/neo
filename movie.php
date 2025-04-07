<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpert" content="width=device-width, initial-scale=1.0">
        <title>Movie表單</title> 
</head>
<body>
    <h1>電影名稱</h1>
    <form action="">
        <fieldset>
            <legend>Moive</legend>

            <p>
            <label for="title">電影名稱</label>
            <input type="text" name="title" id="title" placeholder="請使用中文" required>
            </p>


            <p>
            <label for="year">發行年分</label>
            <input type="number" name="year" id="year" placeholder="西元年分" required min="1000" max="9999">
            </p>

            <p>
            <label for="director">導演</label>
            <input type="text" name="director" id="director" placeholder="導演名稱" required>
            </p>

            <p>
            <label for="mtype">類型</label>
            <input type="text" name="mtype" id="mtype" placeholder="電影類型" required>
            </p>

            <p>
            <label for="mdate">首映日期</label>
                <input type="date" name="mdate" id="mdate" value="<?= date("Y-m-d") ?>">
            </p>

            <p>
            <label for="contant">電影簡介</label>
            <input type="textarea" name="contant" id="contant" placeholder="簡單描述電影內容" required>

            </p>
</body>
</html>