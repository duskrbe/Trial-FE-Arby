<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(Request::segment(1) ?? 'IWU DKV') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThemeZaa">
    <meta name="viewport" content="width=device-width,initial-scale=1.0" /> 
    <meta name="description" content="Elevate your online presence with Crafto - a modern, versatile, multipurpose Bootstrap 5 responsive HTML5, SCSS template using highly creative 52+ ready demos.">
    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{asset('images/Iwu.png')}}">
    <link rel="apple-touch-icon" href="{{asset('images/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/apple-touch-icon-114x114.png')}}">
    <!-- google fonts preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- style sheets and font icons  -->
    <link rel="stylesheet" href="{{asset('css/vendors.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/icon.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}"/>
    <link rel="stylesheet" href="{{asset('demos/it-business/it-business.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    @stack('styles')
</head>
<body data-mobile-nav-style="full-screen-menu" data-mobile-nav-bg-color="#252840"> 

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- start scroll progress -->
    <div class="scroll-progress d-none d-xxl-block">
        <a href="#" class="scroll-top" aria-label="scroll">
            <span class="scroll-text">Scroll to top</span><span class="scroll-line"><span class="scroll-point"></span></span>
        </a>
    </div>
    <!-- end scroll progress -->
    <!-- javascript libraries -->
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vendors.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap JS Bundle (sudah termasuk Popper) untuk menjalan JS di program-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
  slidesPerView: 3,
  spaceBetween: 15,
  loop: false, // Jangan loop kalau hanya 2 atau 3 item
  centeredSlides: false, // Matikan agar tidak maksa di tengah
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    992: { slidesPerView: 3 }
  }
});
</script>
</html>