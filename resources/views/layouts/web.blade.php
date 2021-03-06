<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PROBI</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Probi, Profesional binacional">
    <meta name="author" content="Kevin MM">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="Probi" /> <!-- website name -->
    <meta property="og:site" content="probi.site" /> <!-- website link -->
    <meta property="og:title" content="Probi" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="Probi, Profesional binacional" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="http://probi.site/images/logo123.png" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="http://probi.site" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="landingpage" />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> --}}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    @yield('styles')
</head>

<body>

    <x-app.navbar.nav></x-app.navbar.nav>
    @yield('content')

    <x-app.footer/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @production
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BGXXWWV8P6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-BGXXWWV8P6');
    </script>
    @endproduction
</body>

</html>
