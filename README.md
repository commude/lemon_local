# semi_close_package
semi_close_package

## Requirements
- PHP 8.1.6
- Any database system
- Composer 2.x
- Npm 7.21 (or anything near) & yarn
- Other PHP extension
- Laravel 9.29
- Authenticated:breeze

## Environment
- Docker & Docker Compose
- Nginx
- php-fpm
- MySQL 5.7
- mailhog

## Directory Structure

```bash
├─docker (Docker Image builder)
│  ├─nginx
│  │  ├─conf
│  │  │   ├─conf.d
│  │  │   │   ├─default-local.conf
│  │  │   │   └─dedault-production.conf
│  │  │   └─nginx.conf
│  │  └─dockerfile
│  │
│  └─php-fpm
│     ├─conf
│     │   └─php.ini 
│     └─dockerfile 
│      
├─environments (Docker Composer environments)
│  ├─local
│  └─stg 
│
└─src (Laravel App)
    ├─app
    ├─bootstrap
    ├─config
    ├─database
    ├─node_modules
    ├─public
    ├─resources
    ├─routes
    ├─storag
    ├─tests
    ├─vendor
    ├─.env.example
    ├─artisan
    ├─composer.json
    ├─composer.lock
    ├─package-lock.json
    ├─package.json
    ├─phpunit.xml
    ├─README.md
    ├─server.php
    └─webpack.mix.js
```

## Setup(dockerイメージ構築)
1. Build docker image first.

```bash
cd environments/local
docker-compose build
```

2. Create Containers（コンテナ構築）

```bash
docker-compose up -d
```

3. Entering the Container&Install libraries（コンテナの中に入ってライブラのリインストール）
```bash
docker exec -it scp.local.php-fpm bash
```

→local %  →→　　bash-4.2#

```bash
composer install
```

4. Make .env（環境ファイルの構築）

```bash
cp .env.example .env
php artisan key:generate
```

Edit the .env under src folder（環境ファイルの編集）
```
APP_URL=http://localhost
ASSET_URL=http://localhost
MIX_ASSET_URL=http://localhost
↓
APP_URL=http://localhost:8081
ASSET_URL=http://localhost:8081
MIX_ASSET_URL=http://localhost:8081



ADMIN_PREFIX=
↓
ADMIN_PREFIX=SCP_Cmd_2022-11



DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
↓
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=scp.local_db
DB_USERNAME=default
DB_PASSWORD=secret



UNDER_CONSTRUCTION_ENABLED=
UNDER_CONSTRUCTION_HASH=
↓
UNDER_CONSTRUCTION_ENABLED=false
UNDER_CONSTRUCTION_HASH=
```

save＆cache clear(編集した環境ファイルを保存,キャッシュのクリア)

```bash
php artisan config:cache
php artisan route:cache
```

Preparing db（データベース準備）
```bash
php artisan migrate:fresh --seed
```

5. Install node modules and generate css/js files using yarn
Out of the container
```bash
exit
```
bash-4.2# →→ local % 


```bash
cd ../../src
npm install -g yarn       # execute this command if you don't have yarn installed yet.
yarn
yarn install
yarn dev #or yarn watch
```

6. Access your localhost:8081
```bash
http://localhost:8081
```




## サイトにアクセス

### user
[http://localhost:8081](http://localhost:8081)
```
user : undecided(users Table の email)
password : undecided（password）
```

### admin
[http://localhost:8081/SCP_Cmd_2022-11/login](http://localhost:8081/SCP_Cmd_2022-11/login)

```
user_id：
commude@commude.com 
password : 
password


## フロント構築方法_Front Construction Method
Laravelのフロント構築ディレクトリは、resources配下になります。
（実際にサイトが読み込んでいるのはPublic配下です。コンパイルすることでcss,js,imgがpublic配下のassetsに作成されます。）
The front building directory of Laravel is under resources.
(The actual site is loaded under public. (The actual site is loaded under public. css,js,img will be created under public when compiling).
```bash
HTML→resources/view→user or admin
CSS →resources/scss
js  →resources/ｊｓ
img　　→resources/images
```

HTMLの共通部分はcomponent化して外に出しています。
Headなどはresources/components/user/layout.blade/phpに記載しています。
Common parts of HTML are componentized and put outside.
Head, etc. are listed in resources/components/user/layout.blade/php.
参考：
[https://reffect.co.jp/laravel/laravel-components](https://reffect.co.jp/laravel/laravel-components)

scssのコンパイルはlaravel-mixを使っています。
参考：
[https://designsupply-web.com/media/programming/6950/](https://designsupply-web.com/media/programming/6950/)

// 開発環境ビルド
```bash
$ npm run dev
```

// 開発環境ファイル監視
```bash
$ npm run watch
```

// 本番環境ビルド
```bash
$ npm run prod
```
