<x-guest-layout>
    <section class="py-0">
        <div class="bg-holder d-none d-md-block"
            style="background-image:url(template/public/assets/img/illustrations/hero.png);background-position:right bottom;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="position-relative container">
            <div class="row align-items-center min-vh-75 my-lg-8">
                <div class="col-md-7 col-lg-6 text-md-start py-8 text-center">
                    <h1 class="display-1 lh-sm fw-atomic mb-4">
                        Tiket Wisata <br class="d-block d-lg-none d-xl-block" />Malino
                    </h1>
                    <p class="fs-1 lh-base mb-5 mt-4 fw-baloo">
                        Plan and book your perfect trip with expert advice, <br class="d-none d-lg-block" />travel tips,
                        destination information and <br class="d-none d-lg-block" />inspiration from us.
                    </p>
                    <a class="btn btn-lg btn-primary hover-top fw-baloo" href="/register" role="button">
                        Daftar Beli Tiket
                    </a>

                </div>
            </div>
        </div>
    </section>

    <section class="pt-5" id="wisata-populer">
        <div class="container">
            <div class="row flex-center mb-5">
                <div class="col-lg-8 text-center">
                    <h1 class="fw-bold fs-md-3 fs-lg-4 fs-xl-5">
                        Destinasi Populer
                    </h1>
                    <hr class="text-primary mx-auto my-4" style="height:3px; width:70px;" />
                    {{-- <p class="mx-auto">Aliquam sodales vitae ex tincidunt consectetur. Etiam eleifend malesuada
                        magna, at imperdiet justo euismod eu. Aliquam vel imperdet mi, et convallis eros. Duis
                        fermentum fringilla nisl at vulputate. Nunc nec lorem faucibus, molestie nisi id, elementum
                        sem. Sed vulputate tempor augue a efficitur urna, ultrices eu. Duis vel turpis et arcu.
                    </p> --}}
                    <div>
                        @livewire('wisata-populer')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5" id="tiket-wisata">
        @livewire('public.wista-price')
    </section>

</x-guest-layout>
