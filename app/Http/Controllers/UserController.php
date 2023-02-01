<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp(SignUpRequest $request)
    {
        $user = User::create([
            "user_name" => $request->name,
            "email"     => $request->email,
            "password"  => Hash::make($request->password)
        ]);

        Auth::login($user);
        return view("/");
    }
    
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(["email" => $request->email, "password" => $request->password]))
        {
            return redirect('/');
        }
        else
        {
            return "ERROR";
        }
    }

    public function logout()
    {
        Auth::logout();
        return view("index", [
            "trends" => AnimeController::showTrends()
        ]);
    }

    public function comment(CommentRequest $request)
    {
        Comment::create([
            "anime_slug" => $request->animeSlug,
            "season"     => $request->animeSeason,
            "episode"    => $request->animeEpisode,
            "username"   => $request->username,
            "text"       => $request->text
        ]);
        return redirect()->back();
    }
}
