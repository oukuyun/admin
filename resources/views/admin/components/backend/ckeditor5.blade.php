
<div class="mb-4">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    <textarea class="form-control" name="{{$name}}" id="" cols="30" rows="10" placeholder="{{__($text)}}" @if($required) required @endif @if($disabled) disabled @endif>{{$value}}</textarea>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script src="{{asset(Universal::version('backend/assets/js/plugins/ckeditor/ckeditor.js'))}}"></script>
<script>
    CKEDITOR.replace('{{$name}}',{
        extraPlugins: 'uploadimage',
        height: 300,
        // Upload images to a CKFinder connector (note that the response type is set to JSON).
        uploadUrl: '{{route('Backend.media.ckeditor.store',[],false)}}',

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        // filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.5/ckfinder.html?type=Images',
        filebrowserImageUploadUrl: '{{route('Backend.media.ckeditor.store',[],false)}}',

        // The following options are not necessary and are used here for presentation purposes only.
        // They configure the Styles drop-down list and widgets to use classes.

        stylesSet: [{
            name: 'Narrow image',
            type: 'widget',
            widget: 'image',
            attributes: {
            'class': 'image-narrow'
            }
        },
        {
            name: 'Wide image',
            type: 'widget',
            widget: 'image',
            attributes: {
            'class': 'image-wide'
            }
        }
        ],

        // Load the default contents.css file plus customizations for this sample.
        contentsCss: [
            'https://cdn.ckeditor.com/4.19.0/full-all/contents.css',
            'https://ckeditor.com/docs/ckeditor4/4.19.0/examples/assets/css/widgetstyles.css'
        ],

        // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
        // resizer (because image size is controlled by widget styles or the image takes maximum
        // 100% of the editor width).
        image2_alignClasses: ['image-align-left', 'image-align-center', 'image-align-right'],
        image2_disableResizer: true,
        removeButtons: 'PasteFromWord'
    });
    // ClassicEditor.create($(`textarea[name="{{$name}}"]`)[0], {
	// 	licenseKey: '',
    // } )
    // .then( editor => {
    //     window.editor = editor;
    // } )
    // .catch( error => {
    //     console.error( 'Oops, something went wrong!' );
    //     console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
    //     console.warn( 'Build id: k5hz3megwu3-nohdljl880ze' );
    //     console.error( error );
    // } );
</script>
@endpush