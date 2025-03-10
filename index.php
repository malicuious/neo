<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpert" content="width=device-width, initial-scale=1.0">
        <title>PHP & mysql</title> 
</head>
<body>
    
    <h1>我的練習 php & mysql</h1>
    <hr>
    <p>今天是: <?= date("Y年M月D日")?></p>
    <form action="">
        姓名:
        <input type="text" name="name">
        年齡:
        <input type="text" name="age">
        身高:
        <input type="text" name="height">
        體重:
        <input type="text" name="weight">

        <input type="submit" value="送出" name="submit">

    <?php if( isset ($_GET["submit"]) ) { ?>
    
        <p>收到資料</p>
    <p>我的名字: <?= $_GET["name"] ?></p>
    <p>我的年齡: <?= $_GET["age"] ?></p>
    <p>我的身高: <?= $h=$_GET["height"] ?></p>
    <p>我的體重: <?= $w=$_GET["weight"] ?></p> 
    <p>我的BMI: <?= $bmi = $w/($h/100*$h/100) ?></p>
    <?php 
    if ($bmi>25){
        echo "你太胖了!";
        }
        elseif ($bmi<18){
            echo "你太瘦了!";
        }
        else {
            echo "正常體態!繼續保持!";
        }    
    ?>

    <?php } ?>
</body>
</html>