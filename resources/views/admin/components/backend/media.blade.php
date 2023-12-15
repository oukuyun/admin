@foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    @php
        $media_value = collect(($multi_language)?$value[$language->code]??'':$value);
    @endphp
    <div class="mb-4 @if($multi_language)language-{{$language->code}}@endif" @if($multi_language && $key !=0) style="display:none;" @endif>
        <label class="form-label" for="{{$id}}@if($multi_language)[{{$language->code}}]@endif">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
        <input 
            type="text" 
            id="{{$id}}@if($multi_language)[{{$language->code}}]@endif" 
            name="{{$name}}@if($multi_language)[{{$language->code}}]@endif" 
            value="{{($multiple)?$media_value->pluck('id'):$media_value['id']??''}}" 
            @if($required) required @endif 
            data-multiple="@json($multiple)"
            style="width:0;height:0;border:0;outline:0;"
        >
        @if(!$disabled)
        <button type="button" class="open_media btn btn-warning py-0 btn-sm mb-1" data-name="{{$id}}@if($multi_language)[{{$language->code}}]@endif"><i class="far fa-folder-open" ></i></button>
        @endif 
        <div class="row" id="{{$id.(($multi_language)?"[{$language->code}]":"")}}_image_area">
            @if(!$multiple)
                @if($media_value)
                <div class="col-4">
                    <img src="{{$media_value['url']??''}}" class="rounded w-100">
                </div>
                @endif
            @else
                @foreach($media_value as $item)
                <div class="col-4 mb-2">
                    <input type="hidden" name="{{$name}}@if($multi_language)[{{$language->code}}]@endif[]" value="{{$item['id']??''}}">
                    <img src="{{$item['url']??''}}" class="rounded w-100">
                </div>
                @endforeach
            @endif
        </div>
        @error(($id??$name))
            <div id="{{$id}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
    </div>
@endforeach
@push('style')
@endpush
@push('javascript')
<script>
    $('.open_media').click(function(){
        media_target = $(`[id="${$(this).data('name')}"]`);
        media_mutiple = media_target.data('multiple');
        $('#media-popout').modal('show');
        media_temp = '';
        if(media_mutiple) {
            media_temp = [];
        }
        $(`input[name="${media_target.attr('id')}[]"]`).each(function(){
            media_temp.push(parseInt($(this).val()));
        });
    });
    @foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    $('[id="{{$id.(($multi_language)?"[{$language->code}]":"")}}_image_area"]').sortable(); 
    @endforeach
</script>
@endpush