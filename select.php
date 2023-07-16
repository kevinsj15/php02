<!DOCTYPE html>
<html>

<head>
    <title>出品物一覧</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script2.js"></script>
</head>

<body>
    <div id="item_list">
        <?php
        // データベース接続情報
        $dsn = 'mysql:host=mysql57.kevin-james.sakura.ne.jp;dbname=kevin-james_shuppin_db;charset=utf8';
        $user = 'kevin-james';
        $password = '159357Jj';

        // ページ番号の取得
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

        // データの取得開始位置の計算
        $start = ($page - 1) * 10;

        try {
            // データベース接続
            $dbh = new PDO($dsn, $user, $password);

            // SQL文の作成
            $sql = 'SELECT * FROM items ORDER BY id DESC LIMIT :start, 10';

            // SQL文の実行
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $stmt->execute();

            // データの取得
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // データの表示
            foreach ($rows as $row) {
                echo '<div>';
                echo '<h2>' . htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8') . '</h2>';
                echo '<p>出品者：' . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p>状態：' . htmlspecialchars($row['item_condition'], ENT_QUOTES, 'UTF-8') . '</p>';
                echo '<p><img src="data:image/png;base64,' . base64_encode($row['item_image']) . '"></p>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo 'データベースへの接続に失敗しました：' . $e->getMessage();
        }
        ?>
    </div>
    <div class="ajax-load" style="display: none;">
        <p><img src="loading.gif"> データを読み込み中...</p>
    </div>
</body>

</html>