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
        // if ($request['applink'] == '' || $request['googlelink'] == '') {
        //     // アップがからのときアップのバリデーションクリアし、グーグルにバリデーションする
        //     if ($request['applink'] == '') {
        //         $rules['applink'] = '';
        //         $rules['googlelink'] = 'required';
                
        //     } 
        //     // グーグルが、からのときグーグルのバリデーションクリアし、アップにバリデーションする
        //     if ($request['googlelink'] == '') {
        //         $rules['applink'] = 'required';
        //         $rules['googlelink'] = '';
        //     }
        // }
        // // $game = Validator::make($request->all(), $rules);

        $game = new Game;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image/');
            $game->image_path = basename($path);
        } else {
            $game->image_path = null; 
        }

        $releace_m_d = substr($form['releace'], 5);
        $releace_m = substr($releace_m_d, 0, strlen($releace_m_d) - 3);
        $game_params = [
            'releace' => $form['releace'],
            'releace_m_d' => $releace_m_d,
            'releace_m' => $releace_m,
            'title' => $form['title'],
            'genre' => $form['genre'],
            'link' => $form['link'],
            'applink' => $form['applink'],
            'googlelink' => $form['googlelink'],
        ];

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

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $game_form['image_path'] = basename($path);
        } else {
            $game_form['image_path'] = $game->image_path;
        }

        $releace_m_d = substr($game_form['releace'], 5);
        $releace_m = substr($releace_m_d, 0, strlen($releace_m_d) - 3);;
        $game_form_params = [
            'releace' => $game_form['releace'],
            'releace_m_d' => $releace_m_d,
            'releace_m' => $releace_m,
            'title' => $game_form['title'],
            'genre' => $game_form['genre'],
            'applink' => $game_form['applink'],
            'link' => $game_form['link'],
            'googlelink' => $game_form['googlelink'],
            'image_path' => $game_form['image_path']
        ];
        
        $game->fill($game_form_params)->save();

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
