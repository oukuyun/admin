// Ajax 攔截器
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: () => {
        $('#loading').show();
    },
    complete: () => {
        $('#loading').hide();
    },
    error: function (event, request, settings) {
        switch (settings.toastType) {
            case 'toastr':
            default:
                this.toastr(event);
                break;
            case 'toast':
                this.toast(event);
                break;
        }
    },
    toastr: function (request) {
        switch (request.status) {
            case 401:
                // Codebase.helpers('jq-notify', {
                //     align: 'right',             // 'right', 'left', 'center'
                //     from: 'top',                // 'top', 'bottom'
                //     type: 'error',               // 'info', 'success', 'warning', 'danger'
                //     icon: 'fa fa-times',    // Icon class
                //     message: "權限不足，請聯繫管理人員",
                //     delay:500,
                // });

                // var isLogin = window.location.pathname == '/Admin/Login';
                
                // toastr.options = {
                //     "hideDuration": "500",
                //     "onHidden": function () {
                //         if(!isLogin) {
                //             location.href = "/Admin/Login";
                //         }
                //     }
                // };
                // if(isLogin) {
                //     $('.captcha img').click();
                // }
                // toastr.error(request.responseJSON.message);
                break;
            case 403:
                Codebase.helpers('jq-notify', {
                    align: 'right',             // 'right', 'left', 'center'
                    from: 'top',                // 'top', 'bottom'
                    type: 'warning',               // 'info', 'success', 'warning', 'danger'
                    icon: 'fa fa-exclamation-triangle',    // Icon class
                    message: "權限不足，請聯繫管理人員",
                    delay:1000,
                });
                break;
            case 422:
                Codebase.helpers('jq-notify', {
                    align: 'right',             // 'right', 'left', 'center'
                    from: 'top',                // 'top', 'bottom'
                    type: 'warning',               // 'info', 'success', 'warning', 'danger'
                    icon: 'fa fa-exclamation-triangle',    // Icon class
                    message: request.responseJSON.message,
                    delay:1000,
                });
                break;
            default:
                Codebase.helpers('jq-notify', {
                    align: 'right',             // 'right', 'left', 'center'
                    from: 'top',                // 'top', 'bottom'
                    type: 'danger',               // 'info', 'success', 'warning', 'danger'
                    icon: 'fa fa-times',    // Icon class
                    message: "系統錯誤，請聯繫技術人員",
                    delay:1000,
                });
                break;
        }
    },
});

const ResponseHandle = function (data) {
    Codebase.helpers('jq-notify', {
        align: 'right',             // 'right', 'left', 'center'
        from: 'top',                // 'top', 'bottom'
        type: 'success',               // 'info', 'success', 'warning', 'danger'
        icon: 'fa fa-check',    // Icon class
        message: data.message,
        delay:500,
    });
}

function sendApi(path, method, data, callback = ResponseHandle) {
    let extension = {};
    if(data instanceof FormData) {
        extension = {
            contentType: false,
            processData: false,
        };
    }
    return $.ajax({
        url: `${path}`,
        type: method,
        data: data,
        dataType: "JSON",
        ...extension,
        success: function (data) {
            callback(data);
        }
    });
}

function makeDataTable(element, path, method, data, columns, drawCallback, orderData={}) {
    return $(element).DataTable({
        ajax: {
            url: `${path}`,
            type: method,
            data: data??{},
            dataFilter: function(data) {
                var json = JSON.parse( data );
                return JSON.stringify(json.data.original);
            }
        },
        searching: true,
        ordering: orderData.ordering??false,
        order: orderData.order??[],
        serverSide: true,
        responsive: true,
        autoWidth: false,
        language: {
            processing: pagination_lang.processing,
            loadingRecords: pagination_lang.loadingRecords,
            lengthMenu: pagination_lang.lengthMenu,
            zeroRecords: pagination_lang.zeroRecords,
            info: pagination_lang.info,
            infoEmpty: pagination_lang.infoEmpty,
            infoFiltered: pagination_lang.infoFiltered,
            infoPostFix: pagination_lang.infoPostFix,
            search: pagination_lang.search,
            paginate: {
                "first": pagination_lang.paginate.first,
                "previous": pagination_lang.paginate.previous,
                "next": pagination_lang.paginate.next,
                "last": pagination_lang.paginate.last,
            },
            aria: {
                "sortAscending": pagination_lang.aria.sortAscending,
                "sortDescending": pagination_lang.aria.sortDescending,
            }
        },
        drawCallback: drawCallback,
        columns: columns,
    });
}

function sendForm(element, path, method, callback) {
    $(element).submit(function () {
        if (typeof ($(this).parsley) != "undefined" && !$(this).parsley().validate()) {
            return false;
        }
        let button = $(this).find('button[type=submit]');
        button.attr('disabled', true);
        let data = $(this).serialize();
        if($('form[name=employee]').find(`input[type="file"]`).length > 0) {
            data = new FormData($(this)[0]);
        }
        sendApi(path, method, data, callback).error(() => {
            button.attr('disabled', false);
        });
        return false;
    });
}

function setForm(element, data, callback) {
    Object.keys(data).map(item => {
        let type = $(`${element} [name=${item}]`).prop("type");
        if (type) {
            switch (type) {
                case "radio":
                    $(`${element} [name=${item}][value="${data[item]}"]`).prop('checked', true);
                    break;
                default:
                    $(`${element} [name=${item}]`).val(data[item]);
                    break;
            }
        }
    });
    if (typeof callback == "function") {
        callback(data);
    }
}
