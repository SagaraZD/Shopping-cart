<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{{ asset('/favicon.png') }}}">
  <title> @yield('title')</title>
    <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="{{ URL::to('js/fontawesome.js') }}"></script>
  <!-- Bootstraps -->
  <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }} ">
  <script src="{{ URL::to('js/jquery.min.js') }}"></script>
  <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ URL::to('css/custom.css') }} ">

</head>
</head>
<body>

  @if (Auth::check())

  <!-- Admin Navigation -->
  @if (Auth::user()->hasRole('Admin'))
  @include('includes.admin-nav')
  @endif

  <!-- Member Navigation -->
  @if (Auth::user()->hasRole('Member'))
  @include('includes.member-nav')
  @endif

  @endif

  <!-- Main Contents -->
  <div class="content">
    @yield('content')
  </div>
  <!-- Custom JS -->
  <script src="{{ URL::to('js/custom.js') }}"></script>
</body>
</html>
