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

    <form method="POST" action="">
        <div class="form-row">
            <div class="form-column">
                <label for="name">名前:</label>
                <input type="text" name="name" id="name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-column">
                <label for="age">年齢:</label>
                <input type="number" name="age" id="age" required>
            </div>
        </div>
        <div class="button-row">
            <input type="submit" name="register" value="登録">
            <input type="submit" name="search" value="検索">
        </div>
    </form>



</body>
</html>
