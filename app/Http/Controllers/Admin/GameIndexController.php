<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;

class GameIndexController extends Controller
{
    public function index(Request $request)
    {
        $cond_genre = $request->cond_genre;
        if ($cond_genre != '') {
            $posts = Game::where('genre', $cond_genre)->get()->sortBy('releace_m_d');
        } else {
            $posts = Game::all()->sortBy('releace_m_d');
        }

        return view('admin.game.main', ['posts' => $posts, 'cond_genre' => $cond_genre]);
    }
}
