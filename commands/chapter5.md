# 第5章 Webサーバの構築

## 5-3 実際に作ってみよう

### 4.Webサーバの設定

#### パッケージ管理ツールのアップデート
```shell
sudo yum update
```

#### Webサーバのソフトウェアをインストール
```shell
sudo yum install httpd
```

```shell
httpd -v
```

#### PHPをインストール
```shell
sudo yum install php
```

```shell
php -v
```

#### Webサーバを起動
```shell
sudo service httpd start
```

#### Gitをインストール
```shell
sudo yum update
```

```shell
sudo yum install git
```

#### アプリをインストール
```shell
cd /var/www/html/sudo git clone https://github.com/CloudTechOrg/book-publish-web-application.git
```

#### Webアプリを起動
```
http://<パブリックIPアドレス>/book-publish-web-application/timer.php
```

<パブリックIPアドレス>の部分は、作成したEC2インスタンスのパブリックIPアドレスに置き換えてください。

#### 再起動時にWebサーバが自動起動するように設定する
```shell
sudo chkconfig httpd on
```