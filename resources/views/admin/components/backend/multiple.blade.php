<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <button type="button" class="ms-2 btn btn-sm btn-danger" id="{{$name}}_template_add">{{__('admin::Admin.insert')}}</button>
    <div id="{{$name}}_area" class="mt-3">
    </div>
</div>
@push('template')
<div class="row {{$name}}_template template_area">
    <div class="col-10">
        <div class="{{$parameters['class']}}">
        @foreach($parameters['col'] as $item)
            <div class="{{$item['class']}}">
                @foreach($item['col'] as $sub_item)
                    @switch($fields[$sub_item['field']]['tag'])
                        @case('select')
                        <x-backend::select 
                            :children="($fields[$sub_item['field']]['children']??[])" 
                            :options="$fields[$sub_item['field']]['options']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multiple="($fields[$sub_item['field']]['multiple']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('textarea')
                        <x-backend::textarea 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('input')
                        <x-backend::input 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('media')
                        <x-backend::media 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :info="$fields[$sub_item['field']]['info']"
                            :multiple="$fields[$sub_item['field']]['multiple']??false"
                            :id="$sub_item['field']"
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                    @endswitch
                @endforeach
            </div>
        @endforeach
    </div>
    </div>
    <div class="col-2">
        <button class="btn btn-sm btn-danger delete_{{$name}}_template" type="button">{{__('admin::Admin.delete')}}</button>
    </div>
</div>
@endpush
@push('javascript')
<script>
    var {{$name}}_data = @json($value);
    var {{$name}}_key = '{{$key}}';
    $('#{{$name}}_template_add').click(function(){
        makeItem('new'+$('#{{$name}}_area .template_area').length);
    });
    function makeItem(id) {
        $('#{{$name}}_area').append($('.{{$name}}_template').clone().removeClass('{{$name}}_template').prop("outerHTML").replace(/\$i/ig,id));
    }
    $(document).on('click', '.delete_{{$name}}_template', function(){
        console.log($(this).parents('.template_area'));
        $(this).parents('.template_area').remove();
    }).ready(function(){
        {{$name}}_data.map((item) => {
            let id = item[{{$name}}_key];
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
    })
</script>
@endpush