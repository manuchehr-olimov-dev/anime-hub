<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnimeEpisodeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $slug = Str::slug($request['animeName']);
        return [
            "animeName"     => "required|exists:animes,slug",
            "episodeName"   => "required",
            "seasonNumber"  => "required|numeric",
            "episodeNumber" => "required|numeric",
            "video"         => "required|mimetypes:video/m4v,video/avi,video/flv,video/mp4,video/mov" 
        ];
    }
}
