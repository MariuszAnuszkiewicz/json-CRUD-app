<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'DACSoftware') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app col-sm-12">
       <div class="flash col-sm-5">
        @if ($message = Session::get('delete'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('empty'))
            <div class="alert alert-info">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('update'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
      </div>
        <div class="container col-sm-8">
          @yield('content')
       </div>
        <div class="edit_container col-sm-10">
          @yield('edit_content')
        </div>
    </div>
</body>
</html>
