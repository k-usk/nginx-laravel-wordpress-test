# Vagrant 

Boxは、`centos6.5`。  
参考 : [VagrantにCentOS 6.5をインストールする - Qiita](http://qiita.com/naomichi-y/items/d82da991831076599fd4)

hostsの設定には、`vagrant-hostsupdater`を利用している。  
<https://github.com/cogitatio/vagrant-hostsupdater>

初期手順

```
$ vagrant up
$ vagrant ssh
...
$ /vagrant/vagrant.config/setup.sh
```

`vagrant up`で起動し、`vagrant ssh`で接続。  
初期セットアップのファイルを実行する。

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

SSLの参考 : [nginxでオレオレSSLを設定する - Qiita](http://qiita.com/duke-gonorego/items/afbbcd7044d3da178723)

## Wordpress


