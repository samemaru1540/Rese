# Rese
Rese (飲食店予約アプリ)
![alt text](<スクリーンショット 2024-12-13 18.08.41.png>)

## 作成した目的
勉強のアウトプット、模擬案件を通して実践に近い開発経験を積むため。

## アプリケーションURL
・開発環境：http://localhost/
・phpMyAdmin : http://localhost:8080/

## 機能一覧
ログイン/ログアウト機能  
ユーザ情報/お気に入り一覧/予約情報取得  
飲食店一覧/詳細取得  
お気に入り追加/削除機能  
飲食店予約/予約削除機能  
エリア/ジャンル/店名で検索
メール認証

## 使用技術（実行環境）
laravel : 8.83.27
php : 7.4.9
Mysql : 10.3.39
Docker : 25.0.3

## テーブル設計
![alt text](<スクリーンショット 2024-12-13 13.57.53.png>)
![alt text](<スクリーンショット 2024-12-13 13.57.59.png>)

## ER図
![alt text](<スクリーンショット 2024-12-13 14.00.17.png>)


## 環境開発
**Dockerビルド**
1. `git clone git@github.com:samemaru1540/Rese.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

**laravelの環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 新しく.envファイルを作成
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

5. アプリケーションキーの作成
``` bash
php artisan key:generate
```

6. マイグレーションの実行
``` bash
php artisan migrate
```

7. シーディングの実行
``` bash
php artisan db:seed
```

## アカウントの種類
ログイン、テスト用アカウント
 テストユーザー  
 email `testuser@icloud.com`  
  password `testuser`