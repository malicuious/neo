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
    <p>我的身高: <?= $h=178 ?></p>
    <p>我的體重: <?= $w=67 ?></p>
    <p>我的BMI: <?= $w/($h/100*$h/100) ?></p>
</body>
</html>