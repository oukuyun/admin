@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('admin::Admin.webSetting')}}</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" id="reload">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content pb-4">
                <x-backend::language />
                <div class="block block-rounded row g-0 overflow-hidden mt-3 border">
                    <ul class="nav nav-tabs nav-tabs-block flex-md-column col-md-4 rounded-0" role="tablist">
                        <li class="nav-item d-md-flex flex-md-column">
                            <button class="nav-link fs-sm text-md-start rounded-0 active" id="btabs-vertical-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-vertical-home" role="tab" aria-controls="btabs-vertical-home" aria-selected="true">
                            <i class="fa fa-fw fa-home opacity-50 me-1 d-none d-sm-inline-block"></i>{{__('admin::Admin.generalSetting')}}
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content col-md-8">
                        <div class="block-content tab-pane active" id="btabs-vertical-home" role="tabpanel" aria-labelledby="btabs-vertical-home-tab" tabindex="0">
                            <h4 class="fw-semibold">{{__('admin::Admin.generalSetting')}}</h4>
                            <x-backend::form :form="config('admin.settings.general.form')" :fields="config('admin.settings.general.fields')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END Page Content -->
</main>
@endsection
@push('style')
<style>
    .tab-content.system {
        padding: 15px;
        border: 1px;
        border-style: solid;
        border-color: #fff #ddd #ddd #ddd;
        border-radius: 0px 0px 5px 5px;
    }
</style>
@endpush
@push('javascript')
@endpush