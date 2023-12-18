@foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    <div class="mb-4 @if($multi_language)language-{{$language->code}}@endif" @if($multi_language && $key !=0) style="display:none;" @endif">
        <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
        <div class="select-item">
            <select class="js-select2 form-select" id="{{$name}}{{($multi_language)?('['.$language->code.']'):''}}{{($multiple)?'[]':''}}" name="{{$name}}{{($multi_language)?('['.$language->code.']'):''}}{{($multiple)?'[]':''}}" style="width: 100%;" data-placeholder="{{__($text)}}"
                @if($disabled) disabled @endif 
                @if($multiple) multiple @endif 
                @if($required) required @endif 
                @if($children) data-children="{{$children['name']}}" @endif
                lang="zh-CN">
                <option></option>
                @foreach($options as $option)
                <option value="{{$option['value']}}" 
                    @if($multiple)
                        @if(in_array($option['value'],$value)) selected @endif
                    @else
                        @if($value == $option['value']) selected @endif
                    @endif
                >{{$option['name']}}</option>
                @endforeach
            </select>
        </div>
        @error(($id??$name))
            <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
    </div>
@endforeach
@push('javascript')
<script>
    @foreach($languages as $key => $language)
        @if(!$multi_language && $key !=0)
            @continue
        @endif

        @if($children)
            $(`select[name="{{$name}}{{($multi_language)?('['.$language->code.']'):''}}{{($multiple)?'[]':''}}"]`).change(function(){
                sendApi(
                    '{{route($children['ajax']['url'],[],false)}}','{{$children['ajax']['method']}}',
                    {
                        @if($multi_language)
                        lang: "{{$language->code}}",
                        @endif
                        @foreach($children['ajax']['data'] as $key => $value)
                        {{$key}}:@if($value=='value') $(this).val() @elseif($value == 'text') $(this).find('option:selected').text() @else '{{$value}}' @endif
                        @endforeach
                    },function(result){
                    let str = '';
                    let select = $(`select[name="{{$children['name']}}{{($multi_language)?('['.$language->code.']'):''}}{{($multiple)?'[]':''}}"]`);
                    let value = select.val();
                    result.data.children.map((item)=>{
                        str += `<option value="${item.id}" ${((value == item.id)?'selected':'')}>${item.name}</option>`
                    });
                    select.html(str);
                });
            });
        @endif
        $(`select[name="{{$name}}{{($multi_language)?('['.$language->code.']'):''}}{{($multiple)?'[]':''}}"]`).select2({
            allowClear: true,
        });
    @endforeach
</script>
@endpush