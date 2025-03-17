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
            <input type="radio" name="gender" id="gender1" value="1">
            <label for="gender1">男生</label>
            <input type="radio" name="gender" id="gender2" value="2">
            <label for="gender2">男娘</label>
            </p>

            <p>
                <label for="">生日</label>
                <input type="date" name="bday" id="bday" value="<?= date("Y-m-d") ?>">
            </p>


            <p>
                <label for="phone">電話</label>
                <input type="text" name="phone" id="phone" placeholder="例:09-12345678">
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
            <input type="checkbox" name="behavior" id="behavior" value="聊天">
            <label for="聊天">聊天</label>
            <input type="checkbox" name="behavior" id="behavior" value="直播">
            <label for="直播">直播</label>
            <input type="checkbox" name="behavior" id="behavior" value="書信">
            <label for="書信">書信</label>
            <input type="checkbox" name="behavior" id="behavior" value="社群">
            <label for="社群">社群</label>
            <input type="checkbox" name="behavior" id="behavior" value="購物">
            <label for="購物">購物</label>
            <input type="checkbox" name="behavior" id="behavior" value="金融">
            <label for="金融">金融</label>
        </fieldset>

        <fieldset>
            <legend>滿意度</legend>
            <div>
            <label for="">場地</label>
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
            </div>

            <div>
            <label for="">設備</label>
            <input type="radio" name="equipment" id="equipment1" value="5">
            <label for="equipment1">完全滿意</label>
            <input type="radio" name="equipment" id="equipment2" value="4">
            <label for="equipment2">超級滿意</label>
            <input type="radio" name="equipment" id="equipment3" value="3">
            <label for="equipment3">非常滿意</label>
            <input type="radio" name="equipment" id="equipment4" value="2">
            <label for="equipment4">特別滿意</label>
            <input type="radio" name="equipment" id="equipment5" value="1">
            <label for="equipment5">普通滿意</label>
            </div>

            <div>
            <label for="">服務</label>
            <input type="radio" name="service" id="service1" value="5">
            <label for="service1">完全滿意</label>
            <input type="radio" name="service" id="service2" value="4">
            <label for="service2">超級滿意</label>
            <input type="radio" name="service" id="service3" value="3">
            <label for="service3">非常滿意</label>
            <input type="radio" name="service" id="service4" value="2">
            <label for="service4">特別滿意</label>
            <input type="radio" name="service" id="service5" value="1">
            <label for="service5">普通滿意</label>
            </div>
        </fieldset>

        
    </form>
    
    <script type='text/javascript'>
function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('output_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

<fieldset>
    <legend>資料上傳</legend>

    <p>
        <label for="">同意書</label>
        <input type="file" name="agreement" id="agreement" accept=".pdf,.doc,.docx" >
    </p>

    <p>
        <label for="image">個人照片</label>
        <input type="file" name="image" accept="image/*" onchange="preview_image(event)" >
        <div><img id="output_image" width="300"></div>
    </p>

   </fieldset>

    <input type="submit" name="submit" value="送出">

   </form>

   <script type='text/javascript'>
        function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function () {
        var output = document.getElementById('output_image');
        output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        }
</script>

<?php

if (isset($_POST["submit"])) {

    $name   = $_REQUEST["name"];
    $gender = $_REQUEST["gender"];
    $bday   = $_REQUEST["bday"];
    $phone  = $_REQUEST["phone"];
    $area   = $_REQUEST["area"];
    $equipment = $_REQUEST["equipment"];
    $place   = $_REQUEST["place"];
    $service   = $_REQUEST["service"];

    echo"收到資料";
    

    echo "<p>資料收到</p>";

    echo "<p>你的名字是:" . $name ."</p>";

     if (isset($_REQUEST["gender"])) {
        if ($_REQUEST["gender"]=='1'): 
            $gender = "男生";
        elseif ($_REQUEST["gender"]=='2') :
            $gender = "男娘";
        endif;
    } else {
        $gender = "不帶把的男娘";
    }

    if (isset($_REQUEST["behavior"])) {
        $behavior = implode(',', $_REQUEST["behavior"]);
    } else {
        $behavior = "沒有選任何項目";
    }

    echo "<p>你的生日:" . $bday ."</p>";
    echo "<p>你的電話:" . $phone ."</p>";
    echo "<p>你居住區域:" . $area ."</p>";
    echo "<p>使用行為: $behavior </p>";
    echo "<p>滿意度: 場地: $place , 設備:$equipment, 服務:$service </p>";
}

?>


</body>
</html>