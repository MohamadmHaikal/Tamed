<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

<!-- CSRF Token -->
<meta name="_token" content="{{ csrf_token() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />

<!-- fonts library -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">

<script src="{{ asset('assets/js/app.js') }}"></script>
@if (session()->get('lang') == 'en')
<link rel="stylesheet" media="all" href="{{ asset('assets/css/all_en.css') }}">
  @else
  <link rel="stylesheet" media="all" href="{{ asset('assets/css/all.css') }}">
@endif



<link rel="stylesheet" href="{{ asset('plugins/line-awesome-1.3.0/css/line-awesome.min.css') }}">

<!-- Stack array for including inline css or head elements -->
@stack('plugin-styles')

