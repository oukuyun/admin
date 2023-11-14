<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <button type="button" class="ms-2 btn btn-sm btn-danger" id="{{$name}}_template_add">{{__('admin::Admin.insert')}}</button>
    <table class="multiple_table table table-bordered table-striped table-vcenter js-dataTable-full mt-2">
        <thead>
            <tr>
                <th>#</th>
                @foreach($parameters as $item)
                <th>
                    {{__($fields[$item['field']]['text'])}}
                    @if($fields[$item['field']]['required'])
                    <span class="text-danger">*</span>
                    @endif
                </th>
                @endforeach
                <th></th>
            </tr>
        </thead>
        <tbody id="{{$name}}_area"></tbody>
    </table>
</div>
@push('style')
<style>
    .multiple_table td label  {
        display: none;
    }
    .multiple_table td .mb-4 {
        margin-bottom: 0!important;
    }
    @media (max-width: 992px) {
        .multiple_table thead {
            display: none;
        }
        .multiple_table td {
            display:flex;
        }
        .multiple_table td .mb-4 {
            display: flex;
            width: 100%;
        }
        .multiple_table td label {
            display: flex;
            justify-content: right;
            padding-right: 20px;
            align-items: center;
            flex: 0.3;
        }
        .multiple_table td .no {
            display: flex;
            flex: 1;
        }
        .multiple_table td input {
            display: flex;
            flex: 1;
            align-items: center;
        }
        .multiple_table td .select-item {
            display: flex;
            flex: 1;
            align-items: center;
        }
        .multiple_table td:last-of-type {
            justify-content: right;
        }
    }
</style>
@endpush
@push('template')
<table class="{{$name}}_template ">
    <tbody>
        <tr class="template_area">
            <td>
                <div class="mb-4">
                    <label for="">
                    #
                    </label>
                    <span class="no">
                        $i
                    </span>
                    <input type="hidden" name="{{$name}}[$i][{{$key}}]">
                </div>
            </td>
            @foreach($parameters as $item)
            <td>
                @switch($fields[$item['field']]['tag'])
                    @case('select')
                    <x-backend::select 
                        :id="$item['field']"
                        :children="($fields[$item['field']]['children']??[])" 
                        :options="$fields[$item['field']]['options']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :multiple="($fields[$item['field']]['multiple']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('textarea')
                    <x-backend::textarea 
                        :id="$item['field']"
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('input')
                    <x-backend::input 
                        :id="$item['field']"
                        :tag="$fields[$item['field']]['tag']" 
                        :type="$fields[$item['field']]['type']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('media')
                    <x-backend::media 
                        :id="$item['field']"
                        :tag="$fields[$item['field']]['tag']" 
                        :type="$fields[$item['field']]['type']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :info="$fields[$item['field']]['info']"
                        :multiple="$fields[$item['field']]['multiple']??false"
                        :id="$item['field']"
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                @endswitch
            </td>
            @endforeach
            <td>
                <button class="btn btn-sm btn-danger delete_{{$name}}_template" type="button">{{__('admin::Admin.delete')}}</button>
            </td>
        </tr>
    </tbody>
</table>
@endpush
@push('javascript')
<script>
    var {{$name}}_data = @json($value);
    
    $('#{{$name}}_template_add').click(function(){
        makeItem(($('#{{$name}}_area .template_area').length + 1));
    });
    function seqCheck(seq) {
        let check = false;
        $('#{{$name}}_area .template_area').each(function() {
            let regexp = new RegExp(`{{$name}}\\[${seq}\\]`,'gs');
            if($(this).prop("outerHTML").match(regexp) != null) {
                check = true;
            }
        });
        if(check) {
            return seqCheck((seq+1));
        }
        return seq;
    }
    function makeItem(id) {
        id = seqCheck(id);
        $('#{{$name}}_area').append($('.{{$name}}_template tr').clone().removeClass('{{$name}}_template').prop("outerHTML").replace(/\$i/ig,id));
    }
    $(document).on('click', '.delete_{{$name}}_template', function(){
        $(this).parents('tr').remove();
    }).ready(function(){
        $('.{{$name}}_template select').each(function(){
            if($(this).data('select2')) {
                $(this).select2("destroy");
            }
        });

        {{$name}}_data.map((item, key) => {
            let id = key + 1;
            makeItem(id);
            Object.keys(item).map((key) => {
                let element = $(`[name="{{$name}}[${id}][${key}]"]`);
                if(element.length > 0 ) {
                    switch (element.prop("tagName")) {
                        case 'TEXTAREA':
                            element.text(item[key])
                            break;
                        default:
                            element.val(item[key])
                            break;
                    }
                }
            });
        })

        $('#{{$name}}_area select').each(function(){
            if(!$(this).data('select2')) {
                $(this).select2({
                    allowClear: true,
                });
            }
        });
    })
</script>
@endpush