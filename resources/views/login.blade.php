@extends('layouts.base')

@section('content')

    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Login</h2>
                        <p>Welcome to the official Anime blog.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Войти</h3>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="input__item">
                                <input type="text" name = "email" placeholder="Email address">
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" name = "password" placeholder="Password">
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Войти</button>
                        </form>
                        <a href="#" class="forget_pass">Забыли пароль?</a>
                        
                        @error("email")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                        @enderror

                        @error("password")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                        @enderror
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Нету аккаунта?</h3>
                        <a href="/sign-up" class="primary-btn">Так создайте его!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->

@endsection