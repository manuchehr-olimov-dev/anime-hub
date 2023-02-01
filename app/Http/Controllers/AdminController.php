<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimeEpisodeRequest;
use App\Http\Requests\AnimeRequest;
use App\Models\Anime;
use App\Models\AnimeEpisode;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function index()
    {
        $stats = $this->Statistics();
        $animeList = Anime::all();

        return view("admin.main", [
            "stats" => $stats,
            "animeList" => $animeList
        ]);
    }

    public function addAnime(AnimeRequest $request)
    {
        $data = $request->validated();

        $filePath = Storage::disk("public")->putFile('photos', $data['poster']);

        Anime::create([
            "name"           => $data['anime_name'],
            "img"            => $filePath,
            "slug"           => Str::slug($data['anime_name']),
            "category"       => $data['anime_category'],
        ]);
        return redirect()->back();


    }

    public function addAnimeEpisode(AnimeEpisodeRequest $request)
    {
        $data      = $request->validated();
        $animeSlug = Str::slug($data['animeName']);
        $filePath  = Storage::disk("public")->putFile("anime/{$animeSlug}/{$data['seasonNumber']}", $data['video']);
        
        $status = AnimeEpisode::create([
            "name_of_anime"     => $animeSlug,
            "season"            => $data['seasonNumber'],
            "episode"           => $data['episodeNumber'],
            "name_of_episode"   => $data['episodeName'],
            "path"              => $filePath
        ]);
        
        return redirect()->back();
    }
    
    public function statistics()
    {
        $stats = [
            "animes" => Anime::count(),
            "users"  => User::count()
        ];

        return $stats;
    }

    
    
}
