<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\AnimeEpisode;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    public function index()
    {
        return view("index", [
            "trends" => $this->showTrends()
        ]);
        
    }

    // Показать информацию об Аниме
    public function animeDetail($animeName)
    {
        $anime = $this->getAnime($animeName);
        return view("anime-details", [
            "anime" => $anime[0]
        ]);
    }

    // Общая функция для вида anime-watching
    public function watchAnime($animeSlug, $animeSeason ,$animeEpisode)
    {
        $episode         = $this->getAnimeEpisode($animeSlug, $animeSeason, $animeEpisode); 
        $seasonEpisodes  = $this->getSeasonEpisodes($animeSlug, $animeSeason);
        $seasons         = $this->getSeasons($animeSlug); 
        $commentaries    = $this->getCommentaries($animeSlug, $animeSeason, $animeEpisode);

        return view("anime-watching", [
            'animeSlug'        => $animeSlug,
            'animeEpisode'     => $animeEpisode,
            'episodePath'      => $episode[0]['path'],
            "episodeName"      => $episode[0]['name_of_episode'],
            'animeSeason'      => $animeSeason,
            'seasonEpisodes'   => $seasonEpisodes,
            'seasons'          => $seasons,
            'commentaries'     => $commentaries
        ]);
    }

    // Получить информацию об Аниме
    public function getAnime($animeSlug)
    {
        $anime = Anime::where("slug", $animeSlug)->get();
        return $anime;
    }

    // Получить эпизод аниме
    public function getAnimeEpisode($animeSlug, $animeSeason, $animeEpisode)
    {
        $anime = AnimeEpisode::where('name_of_anime', $animeSlug)
                             ->where("episode",       $animeEpisode)
                             ->where("season",        $animeSeason)
                             ->get();
        return $anime;
    }

    // Получить количество эпизодов в сезоне
    public function getSeasonEpisodes($animeSlug, $animeSeason)
    {
        $episodes = AnimeEpisode::where("name_of_anime", $animeSlug)->where("season", $animeSeason)->max('episode');
        return $episodes;
    }

    // Количество сезонов в аниме
    public function getSeasons($animeSlug)
    {
        $maxSeasons = AnimeEpisode::where("name_of_anime", $animeSlug)->max('episode');
        return $maxSeasons;
    }

    public function getCommentaries($animeSlug, $animeEpisode, $animeSeason)
    {
        $commentaries = Comment::where("anime_slug", $animeSlug)
                               ->where("season", $animeEpisode)
                               ->where("episode", $animeEpisode)
                               ->get();
        return $commentaries;
    }
    // Показать тренды
    public static function showTrends()
    {
        $animes = Anime::inRandomOrder()->limit(6)->get();
        return $animes;
    }

}
