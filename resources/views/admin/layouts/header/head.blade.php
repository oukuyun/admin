@section('head')
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{Universal::version('/dinj/admin/assets/images/favicon.ico')}}">
    <title>{{ Settings::get("title") }}</title>
    <link href="{{Universal::version('/dinj/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{Universal::version('/dinj/admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{Universal::version('/dinj/admin/assets/js/modernizr.min.js')}}"></script>
@endsection