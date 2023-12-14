@foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    <div class="mb-4 @if($multi_language)language-{{$language->code}}@endif @if($type=='checkbox') form-check form-switch @endif" @if($multi_language && $key !=0) style="display:none;" @endif>
        <label class="@if($type=='checkbox') form-check-label status @else form-label @endif" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
        @if($type=='checkbox')
        <input type="hidden" name="{{$name}}@if($multi_language)[{{$language->code}}]@endif" value="0">
        @endif
        <input 
            type="{{$type}}" 
            class="@if($type=='checkbox') form-check-input status @else form-control @endif" 
            id="{{$name}}@if($multi_language)[{{$language->code}}]@endif" 
            name="{{$name}}@if($multi_language)[{{$language->code}}]@endif" 
            @if($type=='checkbox') value="1" @else value="{{($multi_language)?$value[$language->code]??'':$value}}" @endif
            placeholder="{{__($text)}}" 
            @if($required) required @endif @if($disabled) disabled @endif 
            @if($type=='checkbox' && (($multi_language)?$value[$language->code]??1:$value)) checked @endif
        >
        @error(($id??$name))
            <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
    </div>
@endforeach