<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{$text}}@if($required)<span class="text-danger">*</span>@endif</label>
    <input type="{{$type}}" class="form-control" id="{{$name}}" name="{{$name}}" placeholder="{{$text}}" @if($required)required@endif>
    @error($name)
        <div id="account-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>