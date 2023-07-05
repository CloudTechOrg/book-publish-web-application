<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHPアプリ</title>
</head>
<body>
    <h1>PHPアプリ</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['register'])) {
            echo "登録を開始しました";
            // 登録ボタンがクリックされた場合
            $name = $_POST['name'];
            $age = $_POST['age'];

            // 登録成功メッセージを表示する
            echo "登録しました";
        } elseif (isset($_POST['search'])) {
            echo "検索を開始しました";
            // 検索ボタンがクリックされた場合
            // RDSからデータを取得する処理を追加する
            $servername = "my-db.co7vcyxdczfg.ap-northeast-1.rds.amazonaws.com";
            $username = "admin";
            $password = "cloudtech";
            $dbname = "namelist";

            // RDSに接続
            $conn = new mysqli($servername, $username, $password, $dbname);

            // 接続エラーチェック
            if ($conn->connect_error) {
                die("接続に失敗しました: " . $conn->connect_error);
            }

            // データを取得するSQLクエリ
            $sql = "SELECT name, age FROM users";

            // SQLクエリを実行して結果を取得
            $result = $conn->query($sql);

            // テーブル形式で結果を表示
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>名前</th><th>年齢</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["name"]."</td><td>".$row["age"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "検索結果がありません";
            }

            // 接続を閉じる
            $conn->close();
        }
    }
    ?>

    <h2>登録</h2>
    <form method="POST" action="">
        <label for="name">名前:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="age">年齢:</label>
        <input type="number" name="age" id="age" required>
        <br>
        <input type="submit" name="register" value="登録">
    </form>

    <h2>検索</h2>
    <form method="POST" action="">
        <input type="submit" name="search" value="検索">
    </form>

</body>
</html>
