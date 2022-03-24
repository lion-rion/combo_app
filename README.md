<img src="https://img.shields.io/badge/-Laravel9.4.1-black.svg?logo=laravel&style=popout">
<img src="https://img.shields.io/badge/-PHP8.1.2%20-black.svg?logo=php&style=popout">

# クローン後の設定方法

コンポーザーのアップデート

```
composer update
```

.env ファイルの作成
データベースの名前やパスワードなどを変更する

```
cp .env.exmaple .env
```

キーの作成

```
php artisan key:generate
```

マイグレーションファイルから DB の構築

```
php artisan migrate

//上記でエラーが発生する場合は
php artisan migrate:fresh
php artisan migrate:refresh
```
