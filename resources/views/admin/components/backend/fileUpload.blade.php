<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input 
        type="{{$type}}" 
        class="form-control" 
        id="{{$name}}" 
        name="{{$name}}" 
        value="{{$value}}" 
        placeholder="{{__($text)}}" 
        @if($required) required @endif @if($disabled) disabled @endif 
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script>
    fileUpload(`input[name="{{$name}}"]`,[]);
</script>
@endpush