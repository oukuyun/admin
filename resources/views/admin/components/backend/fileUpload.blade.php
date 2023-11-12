<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input 
        type="{{$type}}" 
        class="form-control" 
        id="{{$name}}" 
        name="{{$name}}" 
        placeholder="{{__($text)}}" 
        @if($required) required @endif @if($disabled) disabled @endif 
    >
    @error(($id??$name))
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script>
    fileUpload(`input[name="{{$name}}"]`,[{
                name: "20221124165459_45.jpg",
                size: 590599,
                type: 'image/jpeg',
                file: `/storage/48/20221124165459_45.jpg`,
                url: `https://test.henryegg8.com/storage/48/20221124165459_45.jpg`,
            }]);
</script>
@endpush