<form action="{{$form['action']}}" method="POST" name="{{$form['name']}}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="{{$form['method']}}">
    @csrf
    @foreach($form['form'] as $row)
    <x-backend::row :row="$row" />
    @endforeach
    @error('error')
        <div id="error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
    <div class="row">
        <div class="mb-4">
            <button type="submit" class="btn btn-primary">{{__('admin::Admin.sent')}}</button>
            @if($form['back'] !== false)
            <a href="{{$form['back']}}" class="btn btn-secondary">{{__('admin::Admin.back')}}</a>
            @endif
        </div>
    </div>
</form>
<div id="template_area" class="d-none">
@stack('template')    
</div>
@push('javascript')
<script>
    Codebase.onLoad((
        ()=>class{
            static initValidation(){
                Codebase.helpers("jq-validation"),
                $(`form[name="{{$form['name']}}"]`).validate({
                    rules:@json(collect($fields)->map(function($item){ return $item['rules'];})),
                    submitHandler: function() {
                        Codebase.block('state_toggle','.block-rounded');
                        return true;
                    },
                })
            }
            static init(){
                this.initValidation()
            }
        }.init()
    ));
</script>
@endpush