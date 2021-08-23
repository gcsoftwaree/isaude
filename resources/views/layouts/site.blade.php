<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
<script type="text/javascript" src="{{asset('js/tagin.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<head>
    <title>Isaude</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="theme-color" content="Blue"/>
    <meta charset="UTF-8"/>
    <meta name="description" content="Um sistema de controle e integração de saúde"/>
    <meta name="author" content="Allamos/Henrique Elias"/>

    <!-- Adicionar Favicon em todas as versões -->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="icon" href="#" type="image/x-icon">

    <!-- Tags facebook -->
    <meta property="og:title"
          content="Uma nova maneira de integrar a saude no Brasil">
    <meta property="og:site_name" content="Isaude ">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.isaude.com.br"/>
    <meta property="og:locale" content="pt_BR"/>
    <meta property="og:locale:alternate" content="en_US">
    <meta property="og:description"
          content="Aprenda como unificar todas as suas necessidades em apenas um clique">
    <meta property="og:image" content="http://receitasdecodigo.com.br/seo/image.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="600">

    <!-- Links & Scripts -->
    <link rel="stylesheet" href="https://use.typekit.net/nbc5nyh.css">
{{--    <link rel="stylesheet" href="{{asset('css/App.css')}}"/>--}}
    <link rel="stylesheet" href="{{asset('css/provider.css')}}"/>
    <link rel="stylesheet" href="{{asset('site/bootstrap.css')}} ">
    @toastr_css

    <link id="favicon" rel="shortcut icon" href="{{asset('images/Frame.svg')}}" sizes="16x16" type="image/svg">
    <link id="favicon" rel="shortcut icon" href="{{asset('images/Frame.svg')}}" sizes="32x32" type="image/svg">
    <link id="favicon" rel="shortcut icon" href="{{asset('images/Frame.svg')}}" sizes="48x48" type="image/svg">

    <link rel="apple-touch-icon" sizes="48x48" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="96x96" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="192x192" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="256x256" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="384x384" href="{{asset('images/Frame.svg')}}">
    <link rel="apple-touch-icon" sizes="512x512" href="{{asset('images/Frame.svg')}}">

    <!-- Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/tagin.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('lightbox/css/lightbox.css')}}"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans">
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=366643201503023&autoLogAppEvents=1" nonce="Iitg4YjG"></script>
@if(Auth::check())
<nav class="navbar navbar-expand-lg navbar-light bg-transparent " id="menu">
    <div class="container">
        <a class="navbar-brand me-auto" href="{{route('site.home')}}">
            <img src="{{asset('images/Asset 1.svg')}}" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto fs-5 fw-bold ">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('site.order')}}">Pedidos
                        <span class="border-effect"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="text-muted nav-link  href="{{route('site.blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('site.about')}}">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('site.contact')}}">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('site.login.logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@endif

@yield('content')

<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
                ></a>

            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
                ></a>

            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-google"></i
                ></a>

            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
                ></a>

            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-linkedin-in"></i
                ></a>

            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-github"></i
                ></a>
        </section>
        <!-- Section: Social media -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                eum harum corrupti dicta, aliquam sequi voluptate quas.
            </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->

                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-hand-holding-medical me-3"></i>Isaude
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum
                                dolor sit amet, consectetur adipisicing elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Empresa
                            </h6>
                            <p><a href="{{route('site.about')}}" class="text-white">Informações Legais</a></p>
                            <p><a href="{{route('site.about')}}" class="text-white">Termo de Privacidade</a></p>
                        </div>

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contato
                            </h6>
                            <p><i class="fas fa-home me-3"></i>New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope me-3"></i>info@example.com</p>
                            <p><a href="{{route('site.contact')}}" class="text-white "><i class="fas fa-phone me-3"></i>Fale com nosso suporte</a></p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </div>
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="{{route('site.home')}}">Isaude.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

</body>

<!-- Scripts -->
<script src="https://kit.fontawesome.com/12015aaedb.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript" src="{{asset('lightbox/js/lightbox.js')}}"></script>
<script src="{{asset('site/jquery.js')}}"></script>
<script src="{{asset('site/bootstrap.js')}}"></script>

@toastr_js
@toastr_render

<script type='text/javascript'>
    $j=jQuery.noConflict();
    $j(document).ready(function() {
        $('.cpf_cnpj').inputmask({mask: ['999.999.999-99', '99.999.999/9999-99'], keepStatic: true });
        $('.phone_with_ddd').inputmask({mask: ["(99) 9999-9999", "(61) 9 9999-9999"], keepStatic: true});
    });
    $(document).on("click", ".user_dialog", function () {
        let data_id = $(this).data('id');
        $(".modal-body #data_id").val( data_id );
    });

</script>

</html>

