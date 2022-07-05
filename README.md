<img src="https://img.shields.io/badge/-Laravel9.4.1-black.svg?logo=laravel&style=popout">
<img src="https://img.shields.io/badge/-PHP8.1.2%20-black.svg?logo=php&style=popout">

# クローン後の設定方法

コンポーザーのアップデート

```
composer update
```

コンポーザーのインストール //環境を更新しない場合はこちらを入力
 
```
composer install
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

スクリプトのコンパイル

```
npm run dev

//実行できない場合はnpmとnode.jsのインストール
```

#雑用
既存のテーブルにカラムを追加するとき

```

php artisan make:migration add_column_to_users_table --table=users

//マイグレーションファイルをいじった後

php artisan migrate

```

ストレージへのリンク

```
php artisan storage:link
chmod -R 777 storage
```
