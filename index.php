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
        if (isset($_POST['一覧'])) {
            // 一覧ボタンがクリックされた場合
            echo date('Y-m-d H:i:s') . " 一覧表示しました";

            // RDSに接続してデータを取得する処理を追加する
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

            // ユーザー一覧を表示するSQLクエリ
            $query = "SELECT * FROM users";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<h2>ユーザー一覧</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>名前</th><th>年齢</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "ユーザーは存在しません";
            }

            // 接続を閉じる
            $conn->close();
        } elseif (isset($_POST['register'])) {
            echo "登録を開始しました";
            // 登録ボタンがクリックされた場合
            $name = $_POST['name'];
            $age = $_POST['age'];

            // RDSに接続してデータを登録する処理を追加する
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

            // SQLクエリの作成と実行
            $sql = "INSERT INTO users (name, age) VALUES ('$name', $age)";

            echo "クエリ実行しました";
            if ($conn->query($sql) === TRUE) {
                echo "登録しました";
            } else {
                echo "エラー: " . $sql . "<br>" . $conn->error;
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
        <label for="profile_image">プロフィール画像:</label>
        <input type="file" name="profile_image" id="profile_image" accept="image/*">
        <br>
        <input type="submit" name="register" value="登録">
    </form>

    <h2>一覧</h2>
    <form method="POST" action="">
        <input type="submit" name="一覧" value="一覧">
    </form>

    <?php
    // 一覧表示のために再度RDSに接続してデータを取得する
    $servername = "my-db.cw1llpjdkwly.ap-northeast-1.rds.amazonaws.com";
    $username = "admin";
    $password = "0xncr5HUMSr7rpa3qCTd";
    $dbname = "namelist";

    // RDSに接続
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 接続エラーチェック
    if ($conn->connect_error) {
        die("接続に失敗しました: " . $conn->connect_error);
    }

    // ユーザー一覧を表示するSQLクエリ
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>ユーザー一覧</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>名前</th><th>年齢</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["age"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "ユーザーは存在しません";
    }

    // 接続を閉じる
    $conn->close();
    ?>

</body>
</html>