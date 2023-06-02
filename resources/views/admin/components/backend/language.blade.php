@if($languages->count() > 1)
<div class="d-flex">
    @foreach($languages as $key => $language)
    <div class="me-1">
        <a href="?lang={{$language->code}}" class="btn btn-sm @if(($key == 0 && !request()->lang) || request()->lang == $language->code) btn-info @else btn-outline-info @endif">{{$language->name}}</a>
    </div>
    @endforeach
</div>
@endif