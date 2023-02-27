function multipleUpload(element,files) {
    $(element).filer({
        limit: null,
        maxSize: null,
        extensions: null,
        changeInput: `
                    <div class="jFiler-input-dragDrop">
                        <div class="jFiler-input-inner">
                            <div class="jFiler-input-icon">
                                <i class="icon-jfi-cloud-up-o"></i>
                            </div>
                            <div class="jFiler-input-text">
                                <h3>拖曳檔案到此</h3>
                                <span style="display:inline-block; margin: 15px 0">or</span>
                            </div>
                            <button class="btn btn-primary waves-effect waves-light" type="button">選擇檔案</button>
                        </div>
                    </div>`,
        showThumbs: true,
        theme: "dragdropbox",
        templates: {
            box: `<ul class="jFiler-items-list jFiler-items-grid"></ul>`,
            item: `<li class="jFiler-item">
                        <div class="jFiler-item-container">
                            <div class="jFiler-item-inner">
                                <div class="jFiler-item-thumb">
                                    <div class="jFiler-item-status"></div>
                                    <div class="jFiler-item-thumb-overlay">
                                        <div class="jFiler-item-info">
                                            <div style="display:table-cell;vertical-align: middle;">
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>
                                                <span class="jFiler-item-others">{{fi-size2}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{fi-image}}
                                </div>
                                <input type="hidden" name="images[]" value="{{fi-itemId}}" class="image">
                                <div class="jFiler-item-assets jFiler-row">
                                    <ul class="list-inline pull-left">
                                        <li>{{fi-progressBar}}</li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action" data-id="{{fi-itemId}}"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>`,
            itemAppend: `<li class="jFiler-item">
                            <div class="jFiler-item-container">
                                <div class="jFiler-item-inner">
                                    <div class="jFiler-item-thumb">
                                        <div class="jFiler-item-status"></div>
                                        <div class="jFiler-item-thumb-overlay">
                                            <div class="jFiler-item-info">
                                                <div style="display:table-cell;vertical-align: middle;">
                                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>
                                                    <span class="jFiler-item-others">{{fi-size2}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{fi-image}}
                                    </div>
                                    <input type="hidden" name="images[]" value="{{fi-itemId}}" class="image">
                                    <div class="jFiler-item-assets jFiler-row">
                                        <ul class="list-inline pull-left">
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>
                                        </ul>
                                        <ul class="list-inline pull-right">
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action" data-sort="{{fi-id}}" data-id="{{fi-itemId}}"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>`,
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: true,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
        },
        uploadFile: {
            url: "/DinjApi/v1/MultipleImage",
            data: null,
            type: 'POST',
            enctype: 'multipart/form-data',
            beforeSend: function(){},
            success: function(data, el){
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $(`<div class="jFiler-item-others text-success"><i class="icon-jfi-check-circle"></i>上傳成功</div>`).hide().appendTo(parent).fadeIn("slow");
                });
                el.find(".jFiler-item-trash-action").attr("data-id",data.data[0].id);
                el.find(".image").val(data.data[0].id);
                $( ".jFiler-items-grid" ).sortable();
            },
            error: function(el){
                var parent = el.find(".jFiler-jProgressBar").parent();
                el.find(".jFiler-jProgressBar").fadeOut("slow", function(){
                    $(`<div class="jFiler-item-others text-danger"><i class="icon-jfi-minus-circle"></i>上傳失敗</div>`).hide().appendTo(parent).fadeIn("slow");
                });
                el.find(".jFiler-item-trash-action").attr("data-id",data.data[0].id);
                el.find(".image").val(data.data[0].id);
                $( ".jFiler-items-grid" ).sortable();
            },
            statusCode: null,
            onProgress: null,
            onComplete: null
        },
		files: files,
        addMore: false,
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){
            var fileId = itemEl.find(".jFiler-item-trash-action").data('id');
            $.ajax({
                url: `/DinjApi/v1/Image/${fileId}`,
                type: "DELETE"
            });
        },
        onEmpty: null,
        captions: {
            button: "Choose Files",
            feedback: "Choose files To Upload",
            feedback2: "files were chosen",
            drop: "Drop file here to Upload",
            removeConfirmation: "確定要刪除檔案?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only Images are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }
    });
}
function fileUpload(element,files) {
    $(element).filer({
        limit: 1,
        maxSize: 3,
        extensions: null,
        showThumbs: true,
        templates: {
            box: `<ul class="jFiler-items-list jFiler-items-grid"></ul>`,
            item: `<li class="jFiler-item">
                        <div class="jFiler-item-container">
                            <div class="jFiler-item-inner">
                                <div class="jFiler-item-thumb">
                                    <div class="jFiler-item-status"></div>
                                    <div class="jFiler-item-thumb-overlay">
                                        <div class="jFiler-item-info">
                                            <div style="display:table-cell;vertical-align: middle;">
                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>
                                                <span class="jFiler-item-others">{{fi-size2}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    {{fi-image}}
                                </div>
                                <input type="hidden" name="images[]" value="{{fi-itemId}}" class="image">
                                <div class="jFiler-item-assets jFiler-row">
                                    <ul class="list-inline pull-left">
                                        <li>{{fi-progressBar}}</li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li><a class="icon-jfi-trash jFiler-item-trash-action" data-id="{{fi-itemId}}"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>`,
            itemAppend: `<li class="jFiler-item">
                            <div class="jFiler-item-container">
                                <div class="jFiler-item-inner">
                                    <div class="jFiler-item-thumb">
                                        <div class="jFiler-item-status"></div>
                                        <div class="jFiler-item-thumb-overlay">
                                            <div class="jFiler-item-info">
                                                <div style="display:table-cell;vertical-align: middle;">
                                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>
                                                    <span class="jFiler-item-others">{{fi-size2}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        {{fi-image}}
                                    </div>
                                    <input type="hidden" name="images[]" value="{{fi-itemId}}" class="image">
                                    <div class="jFiler-item-assets jFiler-row">
                                        <ul class="list-inline pull-left">
                                            <li><span class="jFiler-item-others">{{fi-icon}}</span></li>
                                        </ul>
                                        <ul class="list-inline pull-right">
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action" data-sort="{{fi-id}}" data-id="{{fi-itemId}}"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>`,
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: true,
            removeConfirmation: false,
        },
		files: files,
        addMore: false,
        clipBoardPaste: true,
        excludeName: null,
        beforeRender: null,
        afterRender: null,
        beforeShow: null,
        beforeSelect: null,
        onSelect: null,
        afterShow: null,
        onEmpty: null,
        captions: {
            button: "選擇圖片",
            feedback: "",
            feedback2: "個檔案被選擇",
            drop: "Drop file here to Upload",
            removeConfirmation: "確定要刪除檔案?",
            errors: {
                filesLimit: "Only {{fi-limit}} files are allowed to be uploaded.",
                filesType: "Only Images are allowed to be uploaded.",
                filesSize: "{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",
                filesSizeAll: "Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."
            }
        }
    });
}