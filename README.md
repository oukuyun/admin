# 歐酷雲後臺模板
## 環境需求
1. Laravel > 9.0
1. PHP > 8.1

## 環境配置
1. `composer create-project laravel/laravel:9.* example-app`
2. `vi composer.json`
3. `add`
    ```json
        "repositories": {
            "oukuyun/admin": {
                "type": "vcs",
                "url": "git@github.com:oukuyun/admin.git"
            }
        }
    ```
4. `composer require oukuyun/admin`
5. `php artisan vendor:publish --tag=admin-public`
6. `php artisan vendor:publish --tag=admin-config`
7. `php artisan migrate`
8. `php artisan db:seed --class="Oukuyun\Admin\database\seeders\DatabaseSeeder"`

## 啟動服務
1. `cd <folder name>`
2. `php artisan serve`

## REFERENCE
1. [Laravel Template](https://laravel.com/docs/8.x/blade)
1. [Laravel Routing](https://laravel.com/docs/8.x/routing)
1. [Laravel Url](https://laravel.com/docs/8.x/urls)
1. [DataTable](https://datatables.net/)
1. [Flatpickr](https://github.com/flatpickr/flatpickr)
1. [SweetAlert2](https://sweetalert2.github.io/)
1. [Mockjax](https://github.com/jakerella/jquery-mockjax)
1. [開發相關](https://docs.google.com/document/d/1rTqo3x8iscs6eD9cmUBHAp1gYb2v6DluNh_mTeN8y60/edit#)
