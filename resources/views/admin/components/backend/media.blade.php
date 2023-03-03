<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input 
        type="text" 
        id="{{$name}}" 
        name="{{$name}}" 
        value="{{$value}}" 
        @if($required) required @endif 
        multiple="{{$multiple}}"
        style="width:0;height:0;border:0;outline:0;"
    >
    @if(!$disabled)
    <button type="button" class="open_media mb-2" data-name="{{$name}}"><i class="far fa-folder-open" ></i></button>
    @endif 
    <div class="row" id="{{$name}}_image_area">
        @if(!$multiple)
            @if($info)
            <div class="col-4">
                <img src="{{$info}}" class="rounded w-100">
            </div>
            @endif
        @endif
    </div>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('style')
@endpush
@push('javascript')
<script>
    $('.open_media').click(function(){
        media_target = $(`input[name="${$(this).data('name')}"]`);
        media_mutiple = media_target.attr('multiple');
        $('#media-popout').modal('show');
    });
</script>
@endpush