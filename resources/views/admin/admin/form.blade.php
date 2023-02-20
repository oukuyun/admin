@extends('admin::layouts.main')
@section('content')
<main id="main-container">
<!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">管理員管理</h3>
            </div>
            <div class="block-content pb-4">
                <x-backend::form :form="$form" :fields="$fields" />
            </div>
        </div>
    </div>
<!-- END Page Content -->
</main>
@endsection
