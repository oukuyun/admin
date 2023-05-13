
<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <textarea class="form-control" name="{{$name}}" id="{{$name}}" cols="30" rows="10" placeholder="{{__($text)}}" @if($required) required @endif @if($disabled) disabled @endif>{{$value}}</textarea>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script src="{{asset(Universal::version('backend/assets/js/plugins/ckeditor5/ckeditor.js'))}}"></script>
<script>
    var {{$name}}
    ClassicEditor
    .create( document.querySelector( '#{{$name}}' ), {
        licenseKey: '',
        removePlugins: ['Style', 'Markdown'],
        simpleUpload: {
            // The URL that the images are uploaded to.
            uploadUrl: '{{route('Backend.media.ckeditor.store',[],false)}}',

            // Enable the XMLHttpRequest.withCredentials property.
            withCredentials: true,

            // Headers sent along with the XMLHttpRequest to the upload server.
            // headers: {
            //     'X-CSRF-TOKEN': 'CSRF-Token',
            // }
        },
        fontFamily: {
            options: [
                'default',
                'Ubuntu, Arial, sans-serif',
                'Ubuntu Mono, Courier New, Courier, monospace'
            ]
        },
    } )
    .then( editor => {
        {{$name}} = editor;
    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: r2rxra7rfs9o-gjxmmx3dujab' );
        console.error( error );
    } );
</script>
@endpush