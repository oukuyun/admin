
<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{$text}}@if($required)<span class="text-danger">*</span>@endif</label>
    <select class="js-select2 form-select" id="{{$name}}" name="{{$name}}" style="width: 100%;" data-placeholder="{{$text}}" @if($disabled) disabled @endif @if($multiple) multiple @endif lang="zh-CN">
        <option></option>
        @foreach($options as $option)
        <option value="{{$option['value']}}" 
            @if($multiple)
                @if(in_array($option['value'],$value)) selected @endif
            @else
                @if($value==$option['value']) selected @endif
            @endif
        >{{$option['name']}}</option>
        @endforeach
    </select>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>