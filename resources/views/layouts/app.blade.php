<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title') | axieandfriends.com</title>
  <meta name="description" content="{{ $description ?? '' }}">
  <link rel="canonical" href="{{ $canonical ?? '' }}" />
  @yield('page_meta')
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="coinzilla" content="76e4499a6b5acb9bd87ab7235c4c99e6" />

  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('img/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->

  <!-- global css -->
  @include('head')
  <!--  -->
  <!--  -->

  <!-- in-page styles -->
  @yield('page_styles')
  <!--  -->
  <!--  -->

  <!-- Header Banner -->
  <script src="https://coinzillatag.com/lib/header.js"></script>
  <script>
    window.coinzilla_header = window.coinzilla_header || [];

    function czilla() {
      coinzilla_header.push(arguments);
    }
    czilla('2156113d0c9e8349782');
  </script>

  <!-- Sticky Banner (STICKY) -->
  <script src="https://coinzillatag.com/lib/sticky.js"></script>
  <script>
    window.coinzilla_sticky = window.coinzilla_sticky || [];

    function czilla() {
      coinzilla_sticky.push(arguments);
    }
    czilla('122610f60b639ab2479');
  </script>

</head>

<body class="antialiased font-mono  bg-gray-900 2xl:text-lg"
      x-data="{ 
        menu: true, 
        modal_timezone: false, 
        modal_currency: false, 
        show_table_list: localStorage.getItem('default_view') == 'table' ? true : false, 
        show_grid_list: (localStorage.getItem('default_view') == 'grid' ||  localStorage.getItem('default_view') == null) ? true : false,
        sort_by: (localStorage.getItem('sort_by') == null) ? 0 : localStorage.getItem('sort_by'),
      }">

            <script async src="https://appsha1.cointraffic.io/js/?wkey=jmESh1wwCz"></script>






  <!--                                    -->
  <!--    menus and nagivation            -->
  @include('includes.header')
  <!--                                    -->



  <!--                                    -->
  <!--    main content (pages)            -->
  @yield('content')
  <!--                                    -->



  <!--                                    -->
  <!--    menus and nagivation            -->
  @include('includes.footer')
  <!--                                    -->



  <!--                                    -->
  <!--    global js scripts               -->
  @include('scripts')
  <!--                                    -->



  <!--                                    -->
  <!--    in-page js scripts              -->
  @yield('page_scripts')
  <!--                                    -->

</body>

</html>