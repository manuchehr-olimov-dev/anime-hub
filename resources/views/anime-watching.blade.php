@extends("layouts.base")

@section("content")
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <a href="#">Romance</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <h2 style="color:white">{{$episodeName}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                            <source src="{{url('storage/' . $episodePath)}}" type="video/mp4" />
                            <!-- Captions are optional -->
                            <track kind="captions" label="English captions" src="#" srclang="en" default />
                        </video>
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Сезон</h5>
                        </div>

                        @for ($i = 1; $i <= $seasons; $i++)
                            <a href="/anime-watching/{{ $animeSlug }}/{{ $i }}/1">Season {{$i}}</a>    
                        @endfor

                    </div>

                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Эпизод</h5>
                        </div>
                        
                        @for ($i = 1; $i <= $seasonEpisodes; $i++)
                            <a href="/anime-watching/{{ $animeSlug }}/{{ $animeSeason }}/{{$i}}">Эпизод {{$i}}</a>    
                        @endfor

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Комментарии</h5>
                        </div>
                        @foreach ($commentaries as $comment)
                            <div class="anime__review__item">
                                <div class="anime__review__item__pic">
                                    <img src="{{url ('img/anime/review-1.jpg') }}" alt="">
                                </div>
                                <div class="anime__review__item__text">
                                    <h6>{{Auth::user()->user_name}} - <span>{{$comment->created_at}}</span></h6>
                                    <p>{{ $comment->text }}</p>
                                    <button type="button" class="btn btn-danger btn-sm mt-3">Удалить комментарий</button>
                                </div>
                            </div>
                        @endforeach
                            

                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Оставить комментарий</h5>
                        </div>
                        @if(Auth::check())
                            
                            <form action="/comment" method="POST">
                                @csrf
                                <input type="hidden" name="animeSlug"   value="{{ $animeSlug    }}">
                                <input type="hidden" name="animeSeason" value="{{ $animeSeason  }}">
                                <input type="hidden" name="animeEpisode" value="{{ $animeEpisode }}">
                                <input type="hidden" name="username"    value="{{ Auth::user()->user_name }}">
                                <textarea placeholder="Your Comment" name="text"></textarea>
                                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                                @error("comment")
                                    <div class="alert alert-danger mt-3 h6" role="alert">{{$message}}</div>
                                @enderror
                            </form>

                        @else
                            <div class="alert alert-danger" role="alert">  Только авторизированные пользователи могут оставлять комментарии ! </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

   