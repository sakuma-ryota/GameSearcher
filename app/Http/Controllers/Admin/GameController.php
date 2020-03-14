<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\History;
use Carbon\Carbon;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function add()
    {
        return view('admin.game.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cond_genre = $request->cond_genre;
        if ($cond_genre != '') {
            $posts = Game::where('genre', $cond_genre)->get();
        } else {
            $posts = Game::all();
        }
        return view('admin.game.index', ['posts' => $posts, 'cond_genre' => $cond_genre]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validationを行う
        $this->validate($request, Game::$rules);
        $game = new Game;
        $form =$request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image/');
            $game->image_path = basename($path);
        } else {
            $game->image_path = null; 
        }

        $game_params = [
            'releace' => $form->releace,
            'search-relce' => $form->search-releace,
            'title' => $form->title,
            'genre' => $form->genre,
            'applink' => $form->applink,
            'googlelink' => $form->googlelink,          
        ];
        
        $form += array('search-releace' => $form['releace']);
        $form['search-releace'] = substr($form['releace'], 5, 6);


        $game->fill($game_params);
        $game->save();

        return redirect('admin/game');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $game = Game::find($request->id);
        if (empty($game)) {
            abort(404);
        }
        return view('admin.game.edit', ['game_form' => $game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, Game::$rules);
        $game = Game::find($request->id);
        $game_form = $request->all();

        if ($request->remove == 'true') {
            $game_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $game_form['image_path'] = basename($path);
        } else {
            $game_form['image_path'] = $game->image_path;
        }

        unset($game_form['_token']);
        unset($game_form['image']);
        unset($game_form['remove']);

        $game->fill($game_form)->save();

        $history = new History;
        $history->game_id = $game->id;
        $history->edited_at = Carbon::now();
        $history->save();

        return redirect('admin/game');
    }

    public function delete(Request $request) {
        $game = Game::find($request->id);
        $game->delete();

        return redirect('admin/game');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
