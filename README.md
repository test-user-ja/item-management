<!-- ## 商品管理システム

### 環境構築手順

* Gitクローン
* .env.example をコピーして .env を作成
* MySQLのデータベース作成（名前：item_management）
* Macの場合 .env の DB_PASSWORD を root に修正（Windowsは修正不要）

    ```INI
    DB_PASSWORD=root
    ```

* APP_KEY生成

    ```console
    php artisan key:generate
    ```

* Composerインストール

    ```console
    composer install
    ```

* フロント環境構築

    ```console
    npm ci
    npm run build
    ```

* マイグレーション

    ```console
    php artisan migrate
    ```

* 起動

    ```console
    php artisan serve
    ``` -->

# 商品在庫管理システム

## 概要
このシステムでは、店舗で扱う商品の在庫管理を行うことができます。
商品の新規登録から編集、削除を行うことができ、各商品の在庫を調整することができます。

## 主な機能
- ログイン、ログアウト機能
- 商品一覧画面
- 商品新規登録、編集、削除機能
- 商品在庫管理機能
- 商品検索機能

'''
php 8.2.12
MySQL 10.4.32
Laravel 10.13.5
'''

## 設計書
[設計書ページへ](test)

