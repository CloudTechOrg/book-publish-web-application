<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PHPアプリ</title>
</head>
<body>
    <h1>PHPアプリ</h1>

    <?php include 'process.php'; ?>

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
