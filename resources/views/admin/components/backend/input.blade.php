<div class="mb-4 @if($type=='checkbox') form-check form-switch @endif">
    <label class="@if($type=='checkbox') form-check-label status @else form-label @endif" for="{{$name}}">{{$text}}@if($required)<span class="text-danger">*</span>@endif</label>
    @if($type=='checkbox')
    <input type="hidden" name="{{$name}}" value="0">
    @endif
    <input 
        type="{{$type}}" 
        class="@if($type=='checkbox') form-check-input status @else form-control @endif" 
        id="{{$name}}" 
        name="{{$name}}" 
        @if($type=='checkbox') value="1" @else value="{{$value}}" @endif
        placeholder="{{$text}}" 
        @if($required) required @endif @if($disabled) disabled @endif 
        @if($type=='checkbox' && $value) checked @endif
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>