<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top d-none d-lg-block" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo123.png') }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <x-app.navbar.flags></x-app.navbar.flags>
                <x-app.navbar.links></x-app.navbar.links>
                <x-app.navbar.login-btn></x-app.navbar.login-btn>
            </ul>
        </div>
    </div>
</nav>

<x-app.navbar.mobile></x-app.navbar.mobile>
