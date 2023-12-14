@foreach($languages as $key => $language)
    @if(!$multi_language && $key !=0)
        @continue
    @endif
    <div class="mb-4 @if($multi_language)language-{{$language->code}}@endif" @if($multi_language && $key !=0) style="display:none;" @endif>
        <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
        <textarea class="form-control" name="{{$name}}@if($multi_language)[{{$language->code}}]@endif" id="{{$name}}@if($multi_language)[{{$language->code}}]@endif" cols="30" rows="10" placeholder="{{__($text)}}" @if($required) required @endif @if($disabled) disabled @endif>{{($multi_language)?$value[$language->code]??'':$value}}</textarea>
        @error(($id??$name))
            <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
    </div>
@endforeach