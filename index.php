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
            // 検索処理を追加する

            // 検索結果を表示する
            echo "検索結果を表示します";
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
