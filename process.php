<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        // 登録ボタンがクリックされた場合
        $name = $_POST['name'];
        $age = $_POST['age'];

        // RDSに接続
        $conn = connectToDB();

        // データを挿入するSQLクエリ
        $sql = "INSERT INTO users (name, age) VALUES ('$name', '$age')";

        // SQLクエリを実行して結果を取得
        if ($conn->query($sql) === true) {
            echo "登録しました";
        } else {
            echo "登録に失敗しました: " . $conn->error;
        }

        // 接続を閉じる
        $conn->close();
    } elseif (isset($_POST['search'])) {
        // 検索ボタンがクリックされた場合
        // RDSからデータを取得する処理を追加する
        $conn = connectToDB();

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

// DB接続を行う関数
function connectToDB() {
    include 'config.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    // 接続エラーチェック
    if ($conn->connect_error) {
        die("接続に失敗しました: " . $conn->connect_error);
    }

    return $conn;
}
?>
