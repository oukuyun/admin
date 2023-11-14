
<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <div class="select-item">
        <select class="js-select2 form-select" id="{{$name}}" name="{{$name}}" style="width: 100%;" data-placeholder="{{__($text)}}" @if($disabled) disabled @endif @if($multiple) multiple @endif lang="zh-CN">
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
@push('javascript')
<script>
    @if($children)
        $(`select[name="{{$name}}"]`).change(function(){
            sendApi(
                '{{route($children['ajax']['url'],[],false)}}','{{$children['ajax']['method']}}',
                {
                    @foreach($children['ajax']['data'] as $key => $value)
                    {{$key}}:@if($value=='value') $(this).text() @else '{{$value}}' @endif
                    @endforeach
                },function(result){
                let str = '';
                result.data.children.map((item)=>{
                    str += `<option value="${item.id}">${item.name}</option>`
                });
                $(`select[name="{{$children['name']}}"]`).html(str);
            });
        });
    @endif
    $(`select[name="{{$name}}"]`).select2({
        allowClear: true,
    });
</script>
@endpush