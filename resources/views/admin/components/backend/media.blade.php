<div class="mb-4">
    <label class="form-label" for="{{$id}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input 
        type="text" 
        id="{{$id}}" 
        name="{{$id}}" 
        value="{{$value}}" 
        @if($required) required @endif 
        data-multiple="@json($multiple)"
        style="width:0;height:0;border:0;outline:0;"
    >
    @if(!$disabled)
    <button type="button" class="open_media btn btn-warning py-0 btn-sm mb-1" data-name="{{$id}}"><i class="far fa-folder-open" ></i></button>
    @endif 
    <div class="row" id="{{$id}}_image_area">
        @if(!$multiple)
            @if($info)
            <div class="col-4">
                <img src="{{$info}}" class="rounded w-100">
            </div>
            @endif
        @else
            @foreach($info as $item)
            <div class="col-4 mb-2">
                <input type="hidden" name="{{$id}}[]" value="{{$item->id}}">
                <img src="{{$item->getUrl()}}" class="rounded w-100">
            </div>
            @endforeach
        @endif
    </div>
    @error($name)
        <div id="{{$id}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('style')
@endpush
@push('javascript')
<script>
    $('.open_media').click(function(){
        media_target = $(`#${$(this).data('name')}`);
        media_mutiple = media_target.data('multiple');
        $('#media-popout').modal('show');
        @if(!$multiple)
        media_temp = '';
        @else
        media_temp = [];
        @endif
        $(`input[name="${media_target.attr('id')}[]"]`).each(function(){
            media_temp.push(parseInt($(this).val()));
        });
    });
    $('#{{$id}}_image_area').sortable(); 
</script>
@endpush