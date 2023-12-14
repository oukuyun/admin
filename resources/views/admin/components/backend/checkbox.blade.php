@foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    <div class="mb-4 @if($multi_language)language-{{$language->code}}@endif" @if($multi_language && $key !=0) style="display:none;" @endif>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$value}}" id="{{$name}}@if($multi_language)[{{$language->code}}]@endif" name="{{$name}}@if($multi_language)[{{$language->code}}]@endif" 
            @if($required) required @endif 
            @if($disabled) disabled @endif 
            @if($checked) checked @endif>
            <label class="form-check-label" for="{{$name}}@if($multi_language)[{{$language->code}}]@endif">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
        </div>
        @error(($id??$name))
            <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
    </div>
@endforeach