<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css')       }}">
    <link rel="stylesheet" href="{{ url('/css/font-awesome.min.css')    }}">
    <link rel="stylesheet" href="{{ url('/css/elegant-icons.css')       }}">
    <link rel="stylesheet" href="{{ url('/css/plyr.css')                }}">
    <link rel="stylesheet" href="{{ url('/css/nice-select.css')         }}">
    <link rel="stylesheet" href="{{ url('/css/owl.carousel.min.css')    }}">
    <link rel="stylesheet" href="{{ url('/css/slicknav.css')            }}">
    <link rel="stylesheet" href="{{ url('/css/style.css')               }}">
  

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo ml-3">
                        <a href="/">
                            <img src="{{ url('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index">Homepage</a></li>
                                <li><a href="./categories">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./categories">Categories</a></li>
                                        <li><a href="./anime-details">Anime Details</a></li>
                                        <li><a href="./anime-watching">Anime Watching</a></li>
                                        <li><a href="./blog-details">Blog Details</a></li>
                                        <li><a href="./sign-up">Sign Up</a></li>
                                        <li><a href="./login">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="./blog">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                       
                        @if (Auth::check())
                            <a href="#"><span class="icon_profile mr-2"></span>
                                {{ Auth::user()->user_name }}
                            </a>
                            <a href="/logout">
                                <button type="button" class="btn btn-outline-danger mr-3" style = "padding:5px 10px; margin-top:-5px">Выход</button>
                            </a>
                        @else
                            <a href="/sign-up"><span class="icon_profile"></span></a>
                        @endif    
                        
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    
    {{-- MAIN CONTENT --}}
        
    @yield("content")
    
    {{-- END CONTENT --}}


    <footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="./index"><img src="{{url('img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="./index">Homepage</a></li>
                        <li><a href="./categories">Categories</a></li>
                        <li><a href="./blog">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->



<script src="{{ url('/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/player.js') }}"></script>
<script src="{{ url('/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('/js/mixitup.min.js') }}"></script>
<script src="{{ url('/js/jquery.slicknav.js') }}"></script>
<script src="{{ url('/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>



</body>

</html>