<?php
// データベース接続情報
$dsn = 'mysql:host=mysql57.kevin-james.sakura.ne.jp;dbname=kevin-james_shuppin_db;charset=utf8';
$user = 'kevin-james';
$password = '159357Jj';

try {
    // データベース接続
    $dbh = new PDO($dsn, $user, $password);

    // POSTリクエストの場合
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // POSTデータの取得
        $name = $_POST['name'];
        $item_name = $_POST['item_name'];
        $item_condition = $_POST['item_condition'];
        $item_image = file_get_contents($_FILES['item_image']['tmp_name']);

        // SQL文の作成
        $sql = 'INSERT INTO items (name, item_name, item_condition, item_image) VALUES (:name, :item_name, :item_condition, :item_image)';

        // SQL文の実行
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':item_name', $item_name, PDO::PARAM_STR);
        $stmt->bindParam(':item_condition', $item_condition, PDO::PARAM_STR);
        $stmt->bindParam(':item_image', $item_image, PDO::PARAM_LOB);
        $stmt->execute();

        echo 'データの登録に成功しました。';
    }
} catch (PDOException $e) {
    echo 'データベースへの接続に失敗しました：' . $e->getMessage();
}
