@extends('layouts.base')

@section("content")
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Присоединитесь</h2>
                        <p>Добро пожаловать на Anime.Hub!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Создать учетную запись</h3>
                        <form action="/sign-up" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" placeholder="Email address" name = "email">
                                <span class="icon_mail"></span>

                                @error("email")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="input__item">
                                <input type="text" placeholder="Your Name" name = "name">
                                <span class="icon_profile"></span>

                                @error("name")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                                @enderror

                            </div>
                            <div class="input__item">
                                <input type="password" placeholder="Password" name = "password">
                                <span class="icon_lock"></span>
                                
                                @error("password")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                                @enderror

                            </div>
                            <button type="submit" class="site-btn">Создать аккаунт.</button>
                        </form>
                        <h5>Уже есть аккаунт? <a href="/login">Войти в учетную запись</a></h5>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Войти с помощью:</h3>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Войти через Facebook</a>
                            </li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i> Войти через Google</a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Войти через Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

@endsection