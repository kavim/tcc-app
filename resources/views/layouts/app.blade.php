<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Probi, find the jobs">
    <meta name="author" content="Kevin">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <x-app.navbar.solid-nav></x-app.navbar.solid-nav>

    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <div class="d-flex align-items-center d-flex">
                    <div class="ms-4">
                        <div style="background-image: url('{{ Auth::user()->student->getAvatar() }}');" class="avatar-chico"></div></div>
                        &nbsp;
                        <h3>{{ Auth::user()->name }}</h3>
                    <div class="ms-4">
                        <a href="{{ route('students.show', Auth::user()->slug_name) }}" class="btn btn-outline-primary">{{ trans('sentences.see_profile') }}</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <x-app.alerts></x-app.alerts>
        </div>

        <div class="row">
            <div class="col-12 col-md-3  mb-4">
                <div class="d-block d-sm-none">
                    <div class="accordion" id="accordionExample">
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Menu
                          </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              <x-app.sidebar.links></x-app.sidebar.links>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="d-none d-sm-block">
                    <x-app.sidebar.links></x-app.sidebar.links>
                </div>
            </div>

            <div class="col-12 col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    {{-- <x-app.footer/> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
</body>

</html>
