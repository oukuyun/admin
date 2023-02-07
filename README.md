# 鼎聚網路後臺模板
## 環境需求
1. Laravel > 8.65
1. PHP > 8.0

## 環境配置
1. `composer create-project laravel/laravel:8.* example-app`
2. `vi composer.json`
3. `add`
    ```json
        "repositories": {
            "dinj/Admin": {
                "type": "vcs",
                "url": "git@github.com:DinJ-team/DinjAdmin.git"
            }
        }
    ```
4. `composer require dinj/Admin`
5. `php artisan vendor:publish --tag=admin-public`
6. `php artisan vendor:publish --tag=admin-config`
7. `php artisan jwt:secret`
8. `php artisan migrate`
9. `php artisan db:seed --class="Dinj\Admin\Database\Seeders\DatabaseSeeder"`

## 啟動服務
1. `cd <folder name>`
2. `php artisan serve`

## 開發相關
1. 後臺模板：[Uplon](https://drive.google.com/file/d/1GCYDqaAXRFjfnRUW6IvOpR4BSN5c1r31/view?usp=sharing)(需要甚麼plugin都可以先上去看)
1. 開發模板
    1. 檔案位置：`resources/views/admin/system/dashboard.blade.php`
    1. 直接寫 `section('content')` 的內容
    1. 如果需要新增js 或css
        請用：
        ```php
            @push('style')
            @endpush
            @push('javascript')
            @endpush
        ```
1. 上方導覽列
    1. 檔案位置：`public/js/demo.js`
    1. 變數 `path` 對應你的路徑
    1. 剩下依據需求填寫
1. `mockjax` (模擬後端回傳資料)
    1. 檔案位置：`public/js/mockjax.js`
    1. 變數 `demoData` 可以用來放預設列表資料
    1. 模擬寫法：
        ```javascript
		   $.mockjax({
                url: `${apiUrl}/Admin/Init`, //接收url
                type: "POST", //請求類型
                responseText: {  //回傳資料(固定格式)
                    "message": "初始化設定成功",
                    "status": true,
                    "data":[], //可依據需求更換
                },
                status:200 //回傳狀態碼
            });
        ```
1. `Ajax` (共用請求function)
    1. 查看範例前須先了解 [Laravel Url](https://laravel.com/docs/8.x/urls)
    1. 檔案位置：`public/js/ajax.js`
    1. 參數 `toastType`
        1. `toastr` Admin 本身有的 預設
        1. `toast` SweetAlert
    1. `sendApi`
        1. 一般請求使用(已套用結果處理、loading 效果)
        1. 參數介紹：
            1. `path` 請求路徑
            1. `method` 請求方法
            1. `data` 請求參數
            1. `callback` 成功後回調方法
            1. 錯誤例外處理 
                ```javascript
                    sendApi(...).error( callback function )
                ```
    1. `makeDataTable`
        1. 所有表格均使用 `DataTable` 呈現 (例外除外)
        1. 可參考 `resources/views/admin/users/index.blade.php`
        1. 參數介紹：
            1. `element` 要產生的表格的原件
            1. `path` 請求路徑
            1. `method` 請求方法
            1. `columns` 表格欄位
            1. `drawCallback` 完成表格繪製後的動作
    1. `sendForm`
        1. 送出表單使用(已套用loading、鎖定提交按鈕防重複點)
        1. 可參考 `resources/views/admin/users/form.blade.php`
        1. 參數介紹：
            1. `element` 要產生的表格的原件
            1. `path` 請求路徑
            1. `method` 請求方法
            1. `callback` 成功後回調方法
    1. `setForm`
        1. 編輯表單透過 `ajax` 取得資料後填入對應值
        1. 可參考 `resources/views/admin/ users/form.blade.php`
        1. 參數介紹：
            1. `element` 要產生的表格的原件
            1. `data` 為 `ajax` 後取回的資料
    1. `axfetch`
        1. 使用方法
            ```javascript
            // 刪除用法
            axfetch.setApiUrl(`<url>`).delete(`<id>`).done(ResponseHandle);
            // 列表取得
            axfetch.setApiUrl(`<url>`).show(`<id>`).done(ResponseHandle);
            ```
        1. Methods
            1. `setBaseUrl` ex: `https://abc.com`
                1. 參數介紹
                    1. url
            1. `setApiUrl`  ex: `/api/test`
                1. 參數介紹
                    1. url
            1. `index`
                1. 參數介紹
                    1. `Queries` Url query
                    1. ajax options
            1. `show`
                1. 參數介紹
                    1. `id` 流水號
                    1. `Queries` Url Query
                    1. ajax options
            1. `create`
                1. 參數介紹
                    1. `data` 傳送資料
                    1. ajax options
            1. `update`
                1. 參數介紹
                    1. `id` 流水號
                    1. `data` 傳送資料
                    1. ajax options
            1. `delete`
                1. 參數介紹
                    1. `id` 流水號
                    1. `Queries` Url query
                    1. ajax options
            1. `asForm` `content-Type:application/x-www-form-urlencoded; charset=utf-8`
            1. `asJson` `content-Type:application/json; charset=utf-8`
            1. `asMultipart` `content-Type:multipart/form-data; charset=utf-8`
            1. `withHeaders` 自定義 header
                1. 參數介紹
                    1. `headers` ajax headers options
                    ```javascript
                    axfetch.withHeaders({
                        "Authorization": "Bearer 123...",
                    });
                    ```
            1. `setHeader` 自定義 header
                1. 參數介紹
                    1. `key` ajax headers key
                    1. `value` ajax headers value
                    ```javascript
                    axfetch.setHeader("Authorization", "Bearer 123...");
                    ```
            1. `setBearerToken`
                1. 參數介紹
                    1. `string`
                    ```javascript
                    axfetch.setBearerToken("Bearer 123...");
                    ```
            1. `withOptions` 自定義 ajax options
                1. 參數介紹
                    1. `options` ajax options
                    ```javascript
                    axfetch.setOptions({
                        processData: false,
                    });
                    ```
            1. `setOptions` 自定義 ajax options
                1. 參數介紹
                    1. `key` ajax options key
                    1. `value` ajax options value
                    ```javascript
                    axfetch.setOptions("processData", false);
                    ```
1. `DataTable` 相關
    1. 檔案位置 : `public/js/jquery.extends.js`
    1. 使用方法，與上述 `makeDataTable` 擇一使用
        ```javascript
        // 無預設
        $("#dataTable").dataTable();

        // 無預設 自定義
        $("#dataTable").dataTable({
            lengthMenu: [1, 10, 25, 50, 100],
        });

        // 預設
        $("#dataTable").dataTables();

        // or 自定義
        $("#dataTable").dataTables({
            options: {
                lengthMenu: [1, 10, 25, 50, 100],
            }
        });
        ```
1. `Flatpickr` 日期選擇器
    1. 檔案位置 : `public/js/jquery.extends.js`
    1. 使用方法
        ```javascript
        // 無預設
        $("#flatpickr").flatpickr();

        // 無預設自定義
        $("#flatpickr").flatpickr({
            locale: "zh_tw",
        });

        // 預設
        $("#flatpickr").flatpickrs();

        // or 自定義
        $("#flatpickr").flatpickrs({
            options: {
                locale: "zh_tw",
            }
        });
        ```
1. `SweetAlert`
    1. 檔案位置 : `public/js/swal.js`
    1. 使用方式
        ```javascript
        // 預設 alert
        Swal.deleteAlert();

        // or 自定義
        Swal.deleteAlert({
            title: 'test'
        });
        ```
    1. Methods
        1. `success` 成功提示
        1. `error` 錯誤提示
        1. `warning` 警告提示
        1. `deleteAlert` 刪除提示
        1. `deleteSuccess` 刪除成功提示
        1. `updateSuccess` 更新成功提示
        1. `createSuccess` 新增成功提示
1. `Toast`
    1. 非 `SweetAlert` 使用方式
        ```javascript
        toastr.options = {
            "showDuration": 500,
            "hideDuration": 500,
        };
        toastr.success(data.message);
        ```
    1. Methods
        1. `success` 成功提示
        1. `error` 錯誤提示
    1. 檔案位置 : `public/js/toast.js` 基於 `SweetAlert`
    1. 使用方式
        ```javascript
        // 預設 alert
        Toast.success();

        // or 自定義
        Toast.success({
            title: 'test'
        });
        ```
    1. Methods
        1. `success` 成功提示
        1. `error` 錯誤提示
        1. `warning` 警告提示
        1. `deleteSuccess` 刪除成功提示
        1. `updateSuccess` 更新成功提示
        1. `createSuccess` 新增成功提示
1. `Laravel Route`
    1. 後台畫面`route`位置 `routes/DinjWeb.php`
    1. 後台`Apiroute`位置 `routes/DinjApi.php`

## REFERENCE
1. [Laravel Template](https://laravel.com/docs/8.x/blade)
1. [Laravel Routing](https://laravel.com/docs/8.x/routing)
1. [Laravel Url](https://laravel.com/docs/8.x/urls)
1. [DataTable](https://datatables.net/)
1. [Flatpickr](https://github.com/flatpickr/flatpickr)
1. [SweetAlert2](https://sweetalert2.github.io/)
1. [Mockjax](https://github.com/jakerella/jquery-mockjax)
1. [開發相關](https://docs.google.com/document/d/1rTqo3x8iscs6eD9cmUBHAp1gYb2v6DluNh_mTeN8y60/edit#)
