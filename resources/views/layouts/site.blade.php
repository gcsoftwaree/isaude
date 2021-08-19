<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

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
    <link rel="stylesheet" href="{{asset('css/App.css')}}"/>
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
    <link rel="stylesheet" type="text/css" href="{{asset('lightbox/css/lightbox.css')}}"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans">
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=366643201503023&autoLogAppEvents=1" nonce="Iitg4YjG"></script>
{{--<nav>--}}
{{--    <div class="main-wrapper">--}}
{{--        <div class="flex-container">--}}
{{--            <a class="logotipo" href="{{route('site.home')}}">--}}
{{--                <img src="{{asset('images/Asset 1.svg')}}">--}}
{{--            </a>--}}
{{--            <ul class="navigation__itens" id="menu">--}}
{{--                <li>--}}
{{--                    <a href="{{route('site.home')}}">Página principal--}}
{{--                        <span class="border-effect"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{route('site.products')}}">Produtos--}}
{{--                        <span class="border-effect"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{route('site.blog')}}">Blog--}}
{{--                        <span class="border-effect"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{route('site.about')}}">Sobre--}}
{{--                        <span class="border-effect"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="{{route('site.contact')}}">Contato--}}
{{--                        <span class="border-effect"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <!-- Hamburger menu -->--}}
{{--            <div id="toggle">--}}
{{--                <div class="span" id="one"></div>--}}
{{--                <div class="span" id="two"></div>--}}
{{--                <div class="span" id="three"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

<nav class="navbar navbar-expand-lg navbar-light bg-light " id="menu">
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
<!-- Hamburger menu list -->
<div id="resize">
    <ul id="menu">
        <li><a  class="title-medium" href="{{route('site.home')}}">Página principal</a></li>
        <li><a class="title-medium" href="{{route('site.products')}}">Produtos</a></li>
        <li><a class="title-medium" href="{{route('site.blog')}}">Blog</a></li>
        <li><a class="title-medium" href="{{route('site.about')}}">Sobre</a></li>
        <li><a class="title-medium" href="{{route('site.contact')}}">Contato</a></li>
    </ul>
</div>

@yield('content')

<footer class="main_footer">
    <div class="dots_pattern"></div>
    <div class="main-wrapper flex-container">
        <div class="quality-badge">
            <p>Cur omnia mori? </p>
            <p>Ubi est barbatus zelus? </p>
        </div>
        <ul>
            <li class="footer__links">
                <h4 class="title-small">Redes Sociais</h4>
                <a href="{{route('site.blog')}}">Blog</a>
            </li>
            <li class="footer__links">
                <h4 class="title-small">Empresa</h4>
                <a href="{{route('site.about')}}">Informações Legais</a>
                <a href="{{route('site.about')}}">Termo de Privacidade</a>
                <a href="{{route('site.contact')}}">Entre em contato</a>
            </li>
            <li class="footer__links">
                <h4 class="title-small">Contatos</h4>
                <a title="Clique no número do telefone para ligar" href="tel:16999999999">Telefone</a>
                <a title="Clique no email para enviar email automatico" href="mailto:contato@beerandcode.com
                .br">Email</a>
            </li>
        </ul>
    </div>
</footer>
<section class="sub__footer">
    <div class="main-wrapper flex-container">
        <a href="#"><img src="{{asset('images/Lock-icon.svg')}}">CMS</a>
        <p>Tem nada aqui não patrão, pode olhar pra outro canto.</p>
        <a href="http://mmpx.com.br/" target="_blank">Deisgn by <strong>MMPX</strong></a>
    </div>
</section>
</body>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    // $(document).ready(function($){

    // $('.phone_with_ddd').inputmask({mask: ["(99) 9999-9999", "(61) 9 9999-9999"], keepStatic: true});
    // $("#toggle").click(function () {
    //     $(this).toggleClass("on")
    //     $("#resize").toggleClass("active")
    // })
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

