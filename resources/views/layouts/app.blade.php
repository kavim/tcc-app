<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="{{config('app.name')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Destino Binacional') }}</title>

    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}" />

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body id="app">

    <div id="wrapper">

        <x-app.sidebar />

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <x-app.nav />

                <div class="container-fluid">
                    <div id="app">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; | {{ config('app.url') }} | {{ \Carbon\Carbon::now()->format('Y') }} | Todos os direitos reservados </span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#app"> <i class="fas fa-angle-up"></i> </a>

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')
</body>
</html>
