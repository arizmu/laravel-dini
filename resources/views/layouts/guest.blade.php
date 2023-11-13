<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ "Tiket Wisata - preview wisata dan beli tiket" }}</title>

        <link type="image/png" href="assets/img/favicons/favicon-32x32.png" rel="icon" sizes="32x32">
        <!--    Favicons-->
        <!-- ===============================================-->
        <link href="template/public/assets/img/favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
        <link type="image/png" href="template/public/assets/img/favicons/favicon-16x16.png" rel="icon"
            sizes="16x16">
        <link type="image/x-icon" href="template/public/assets/img/favicons/favicon.ico" rel="shortcut icon">
        <link href="template/public/assets/img/favicons/manifest.json" rel="manifest">
        <meta name="msapplication-TileImage" content="template/public/assets/img/favicons/mstile-150x150.png">
        <meta name="theme-color" content="#ffffff">

        <!-- Fonts -->
        <link href="https://fonts.bunny.net" rel="preconnect">
        <link href="https://fonts.bunny.net/css?family=atomic-age:400" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=baloo-bhaijaan-2:400,500,600,700,800" rel="stylesheet" />


        {{-- style --}}
        <link href="{{ asset('template/public/vendors/plyr/plyr.css') }}" rel="stylesheet">
        <link href="{{ asset('template/public/assets/css/theme.css') }}" rel="stylesheet" />

        {{-- icons --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

        <style>
            .fw-atomic {
                font-family: 'Atomic Age', display;
            }

            .fw-baloo {
                font-family: 'Baloo Bhaijaan 2', display;
            }
        </style>

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/js/app.js'])
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body class="">
        <main class="main" id="top">
            <nav class="navbar navbar-expand-lg backdrop py-3" data-navbar-on-scroll="data-navbar-on-scroll">
                <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="/">
                        <img class="d-inline-block img-fluid align-top" src="assets/img/gallery/logo-icon.png"
                            alt="" width="50" />
                        <span class="text-primary fs-4 fw-atomic ps-2">
                            Tiket Wisata
                        </span>
                    </a>
                    <button class="navbar-toggler collapsed" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="navbar-collapse border-top border-lg-0 mt-lg-0 collapse mt-4"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav pt-lg-0 fw-baloo font-weight-bold ms-auto pt-2">
                            <li class="nav-item">
                                <a class="nav-link" href="/" aria-current="page">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#wisata-populer">Wisata</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#tiket-wisata">Tiket Price</a>
                            </li>
                        </ul>
                        <form class="ps-lg-5">
                            <a class="btn btn-lg btn-outline-warning order-0" href="/tiket/list">
                                Chart
                            </a>
                            @auth
                                <a class="btn btn-lg btn-outline-primary order-0" href="{{ route('login') }}">
                                    <ion-icon name="home-outline"></ion-icon>
                                </a>
                            @endauth
                            @guest
                                <a class="btn btn-lg btn-outline-primary order-0" href="{{ route('login') }}">
                                    Login / Register
                                </a>
                            @endguest
                        </form>
                    </div>
                </div>
            </nav>
            </div>
        </main>

        {{ $slot }}

        <section class="pb-6">

            <div class="container">
                <div class="row flex-center">
                    <div class="col-auto mb-4">
                        <p class="fs--1 text-dark mb-0">&copy; This template is made with&nbsp;
                            <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="#3984F3" viewBox="0 0 16 16">
                                <path
                                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                </path>
                            </svg>&nbsp;by&nbsp;<a class="text-700" href="https://themewagon.com/"
                                target="_blank">ThemeWagon </a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- end of .container-->

        </section>

        <script src="{{ asset('template/public/vendors/@popperjs/popper.min.js') }}"></script>
        <script src="{{ asset('template/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('template/public/vendors/is/is.min.js') }}"></script>
        <script src="{{ asset('template/public/vendors/plyr/plyr.polyfilled.min.js') }}"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script src="{{ asset('template/public/assets/js/theme.js') }}"></script>

        {{-- <script>
            Swal.fire({
                title: 'Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: 'Cool'
            })
        </script> --}}
        @livewireScripts

    </body>

</html>
