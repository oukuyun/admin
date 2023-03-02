<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input 
        type="hidden" 
        class="@if($type=='checkbox') form-check-input status @else form-control @endif" 
        id="{{$name}}" 
        name="{{$name}}" 
        @if($type=='checkbox') value="1" @else value="{{$value}}" @endif
        placeholder="{{__($text)}}" 
        @if($required) required @endif @if($disabled) disabled @endif 
        @if($type=='checkbox' && $value) checked @endif
    >
    <button type="button" class="open_media" data-bs-toggle="modal" data-bs-target="#media-popout"><i class="far fa-folder-open"></i></button>
    
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('style')
@endpush
@push('javascript')
@endpush