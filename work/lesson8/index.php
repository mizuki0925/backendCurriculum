<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <form action = "index.php" method = "post">
        名前：<br>
        <input type = "text" name = "name" size = "50" value = ""><br>
        電話番号：<br>
        <input type = "text" name = "tel" size = "50" value = ""><br>
        メールアドレス：<br>
        <input type = "text" name = "mail" size = "50" value = ""><br>
        質問等の記入欄：<br>
        <textarea cols = "50" rows = "5" name = "others"></textarea><br>
        <input type = "submit" value = "送信"/>
    </form>
</body>
</html>

<?php
$dsn = 'mysql:dbname=convi;host=localhost';
$user = 'root';
$password = 'root';
/*データベースがdocker用のため、
私が使用しているMAMPの内容を入力しています。
また、可読性向上のため「=」の前後にスペースを入れていましたが、
スペースを入れると接続失敗になるため、スペースを入れていません。*/

try {
    $PDO = new PDO($dsn, $user, $password);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $others = $_POST['others'];

    $sql = "INSERT INTO users(name, tel, mail, others) VALUES(:name, :tel, :mail, :others)";
    $stmt = $PDO->prepare($sql);
    $params = array(':name' => $name, ':tel' => $tel, ':mail' => $mail, ':others' => $others);
    $stmt->execute($params);

} catch (PDOException $e) {
    echo "<<エラー>>:" . $e->getMessage()."\n";
    exit();
}
?>