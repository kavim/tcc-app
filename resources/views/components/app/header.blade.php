<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="masthead-subheading">Proficional Binacional</div>
                <div class="masthead-heading text-uppercase">{{ trans('sentences.welcome') }}</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('register') }}">{{ trans('sentences.home_header_subtitle') }}</a>
            </div>
            <div class="col-12 col-md-6">
                <div class="d-none d-md-block" style="background-color: white; border-radius: 50px">
                    <img class="img-fluid" src="{{ asset('images/img-home.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</header>
