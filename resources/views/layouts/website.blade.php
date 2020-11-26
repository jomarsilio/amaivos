<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="keywords" content="Amai-vos uns aos outros, projeto, social, voluntario">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- Primary Meta Tags -->
        <title>{{ config('app.name') }}</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <meta name="author" content="Sisdado Tecnologia, Contato Internet, Jovana Marsilio">
        <meta name="title" content="{{ config('app.name') }}">
        <meta name="description" content="@lang('app.description')">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('home') }}">
        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:description" content="@lang('app.description')">
        <meta property="og:image" itemprop="image" content="https://layout.sisdado.com.br/amaivos/assets/img/logo_share.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ route('home') }}">
        <meta property="twitter:title" content="{{ config('app.name') }}">
        <meta property="twitter:description" content="@lang('app.description')">
        <meta property="twitter:image" content="https://layout.sisdado.com.br/amaivos/assets/img/logo_share.jpg">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Style -->
        <link href="{{asset(mix('css/amaivos.min.css'))}}" rel="stylesheet">
    </head>
    <body>
        {{-- Header --}}
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-9 col-md-8">
                        <a class="link-logo d-none d-md-block" href="{{ route('home') }}">
                            <img class="img-fluid" src="{{ asset('images/logo_header.svg') }}">
                        </a>
                        <a class="link-logo d-md-none" href="{{ route('home') }}">
                            <img class="img-fluid" src="{{ asset('images/logo_vert.svg') }}">
                        </a>
                    </div>

                    @if (request()->route()->getName() != 'volunteer.create')
                        {{-- Esconder se cadastro e voluntário --}}
                        <div class="col-3 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end">
                            <a class="link-btn-mobile d-inline-block d-md-none px-4 py-2" href="javascript:void(0);" onclick="toggleMenu()">
                                <i class="fas fa-bars fa-2x"></i>
                            </a>
                            <div class='nav-mobile d-md-none'>
                                <li class='nav-item'>
                                    <a href='{{ route('volunteer.create') }}' title='Seja voluntário'>
                                        Seja voluntário
                                    </a>
                                </li>
                            </div>
                            <a class="link-btn d-none d-md-inline-block text-white rounded text-uppercase px-4 py-2" href="{{ route('volunteer.create') }}">
                                <strong>Seja voluntário</strong>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </header>

        {{--  Content  --}}
        @yield('content')

        {{-- Footer --}}
        <footer class="d-flex align-items-center justify-content-center text-center text-uppercase text-white pt-4 pb-3 pt-sm-5 pb-sm-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h5>
                            <strong>Pastoral Social da Paróquia Sagrada Família</strong>
                        </h5>
                        <p class="m-0">Araranguá | Santa Catarina</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Scripts -->
        {{-- <script>
            window.Laravel = @php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); @endphp
        </script> --}}
        <script src="{{asset(mix('js/amaivos.min.js'))}}"></script>
        @yield('script')
    </body>
</html>