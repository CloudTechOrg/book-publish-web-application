# 第6章 データベースの構築
## 6-3 実際に作ってみよう
### 5. Webサーバから接続

#### EC2インスタンスにMySQLのインストール
```shell
sudo dnf -y localinstall  https://dev.mysql.com/get/mysql80-community-release-el9-1.noarch.rpm
```

```shell
sudo dnf -y install mysql mysql-community-client
```

```shell
mysql --version
```

#### RDSへの接続
```shell
mysql -h 【エンドポイント】 -P 3306 -u admin -p
```

※ 【エンドポイント】の部分は、実際のRDSのエンドポイントの内容に置き換えてください。

### 6. データベースを操作してみる

#### データベースを作成
```sql
CREATE DATABASE namelist;
```

```sql
use namelist;
```

#### テーブルの作成
```sql
CREATE TABLE users (   name VARCHAR(50),   age INT );
```

```sql
show tables;
```

#### レコードを追加
```sql
INSERT INTO users (name, age) VALUES ('ヤマダタロウ', 25);
```

```sql
select * from users;
```

#### MySQLを終了する
```sql
exit
```

### 7. Webアプリから接続してみる

#### パッケージのインストール
```shell
sudo yum install php-mysqlnd
```

#### 設定ファイルの更新
```shell
sudo vi /var/www/html/book-publish-web-application/config.php
```

#### Webアプリケーションの起動
```
http://<パブリックIPアドレス>/book-publish-web-application/index.php
```

※ <パブリックIPアドレス>の部分は、web-server-01のパブリックIPアドレスに置き換えてください。