<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeEpisode extends Model
{
    use HasFactory;

    protected $fillable = [
        "name_of_anime",
        "season",
        "episode",
        "name_of_episode",
        "slug",
        "path"
    ];
}
