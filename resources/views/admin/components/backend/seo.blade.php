<h3 class="mt-3">{{__('seo::backend.seoSettings')}}</h3>
<hr>
<x-backend::row :row="config('seo.row')??[]" :fields="config('seo.fields')??[]" />