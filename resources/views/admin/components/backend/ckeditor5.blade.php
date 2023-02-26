
<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <textarea class="form-control" name="{{$name}}" id="" cols="30" rows="10" placeholder="{{__($text)}}" @if($required) required @endif @if($disabled) disabled @endif>{{$value}}</textarea>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script src="{{asset(Universal::version('backend/assets/js/plugins/ckeditor5-classic/build/ckeditor.js'))}}"></script>
<script>
    ClassicEditor.create($(`textarea[name="{{$name}}"]`)[0], {
		licenseKey: '',
    } )
    .then( editor => {
        window.editor = editor;
    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: k5hz3megwu3-nohdljl880ze' );
        console.error( error );
    } );
</script>
@endpush