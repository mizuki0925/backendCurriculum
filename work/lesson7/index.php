<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <?php if ($_POST){ ?>
    <from action = "index.php" method = "post">
        名前：<?php echo $_POST ['name']?><br>
        電話番号：<?php echo $_POST ['tel']?><br>
        メールアドレス：<?php echo $_POST ['mail']?><br>
        質問等の記入欄：<?php echo $_POST ['message']?><br>
    </form>

    <?php } else { ?>
        <form action = "index.php" method = "post">
            名前：<br>
            <input type = "text" name = "name" size = "50" value = ""><br>
            電話番号：<br>
            <input type = "text" name = "tel" size = "50" value = ""><br>
            メールアドレス：<br>
            <input type = "text" name = "mail" size = "50" value = ""><br>
            質問等の記入欄：<br>
            <textarea cols = "50" rows = "5" name = "message"></textarea><br>
            <input type = "submit" value = "確認"/>
        </form>
    <?php } ?>
</body>
</html>

