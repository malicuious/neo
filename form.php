<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpert" content="width=device-width, initial-scale=1.0">
        <title>活動報名表</title> 
</head>
<body>
    <h1>活動報名表</h1>
    <form action="">
        <fieldset>
            <p>
            <legend>基本資料</legend>
            <label for="name">姓名</label>
            <input type="text" name="name" id="name" value="" placeholder="請使用中文" required>
            </p>
            <p>
            <label for=""></label>
            <input type="radio" name="gender" id="gender1">
            <label for="gender1">男生</label>
            <input type="radio" name="gender" id="gender2">
            <label for="gender2">男娘</label>
            </p>

            <p>
                <label for="phone">電話</label>
                <input type="text" name="phone" id="phone">
            </p>

            <p>
            <label for="place">居住地區</label>
            <select name="place" id="place">
                <option value="0">請選擇地區</option>
                <option value="1">北部</option>
                <option value="2">南部</option>
                <option value="3">東部</option>
                <option value="4">西部</option>
                <option value="5">外島</option>
                <option value="6">內島</option>
            </select>
            </p>

        </fieldset>

        <fieldset>
            <legend>使用行為</legend>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="聊天"></label>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="直播"></label>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="書信"></label>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="社群"></label>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="購物"></label>
            <input type="checkbox" name="behavior" id="behavior">
            <label for="金融"></label>
        </fieldset>

        <fieldset>
            <legend>滿意度</legend>
            <input type="radio" name="place" id="place1" value="5">
            <label for="place1">完全滿意</label>
            <input type="radio" name="place" id="place2" value="4">
            <label for="place2">超級滿意</label>
            <input type="radio" name="place" id="place3" value="3">
            <label for="place3">非常滿意</label>
            <input type="radio" name="place" id="place4" value="2">
            <label for="place4">特別滿意</label>
            <input type="radio" name="place" id="place5" value="1">
            <label for="place5">普通滿意</label>
        </fieldset>

        <fieldset>
            <legend>資料上傳</legend>
            <input type="file" name="file" id="file">
        </fieldset>

        
    </form>
</body>
</html>