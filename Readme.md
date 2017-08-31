Laravel と Wordpressを同一のnginxサーバに設置して動作させるテスト

# Vagrant

Boxは、`centos6.5`。  
参考 : [VagrantにCentOS 6.5をインストールする - Qiita](http://qiita.com/naomichi-y/items/d82da991831076599fd4)

hostsの設定には、`vagrant-hostsupdater`を利用している。  
<https://github.com/cogitatio/vagrant-hostsupdater>

* ローカルIP : `192.168.33.18`
* host : `laravel-wp-test.local`

# 初回セットアップ

```
$ vagrant up
$ vagrant ssh
...
$ /vagrant/vagrant.config/setup.sh
```

`vagrant up`で起動し、`vagrant ssh`で接続。  
Vagrant内で、初期セットアップのファイルを実行する。

MySQLの設定部分でいくつか設定を聞かれるので答える。  
参考 : [【MySQL, 開発環境】MySQLのインストールと初期設定 - Qiita](http://qiita.com/knife0125/items/3d685f1368a654d5187d)

```
..
Enter current password for root (enter for none):  //そのままEnter
..
Set root password? [Y/n] n  //rootパスワードをセット
..
Remove anonymous users? [Y/n] Y   //誰でもログイン出来る設定を削除
..
Disallow root login remotely? [Y/n] Y  //リモートログインをさせない
..
Remove test database and access to it? [Y/n] Y   //testデータベースを削除
..
Reload privilege tables now? [Y/n] Y   //即反映
..
```

パスワードの設定以外は全て`Y`で。  
ルートのパスワードはあくまでもローカル環境なので設定していない。  
(ルートパスワードを設定した場合はDBの作成が上手くいかないので注意)

SSLの参考 : [nginxでオレオレSSLを設定する - Qiita](http://qiita.com/duke-gonorego/items/afbbcd7044d3da178723)

# 各バージョン

* `centos 6.5`
* `PHP 5.6.31`
* `nginx 1.12.1`
* `Laravel 5.2.45`
* `Wordpress 4.8.1`

# 構成

* `/` : Laravel
* `/wp/` : Wordpress
