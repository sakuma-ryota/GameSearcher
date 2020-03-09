<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
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
    public function index()
    {
        return view('admin.game.index');
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
            $path = $request->file('image')->store('public/image');
            $game->image_path = basename($path);
        } else {
            $game->image_path = null; 
        }

        unset($form['_token']);
        unset($form['image']);
        
        
        // if (is_null($request['appurl']) || is_null($request['googleurl'])) {
        //     // 電話番号が空の場合、電話番号のバリデーションをクリアし、メアドのバリデーションを追加する。
        //     if (is_null($request['appurl'])) {
        //         $rules['googleurl'] = 'required_without:appurl|sometimes|max:255|googleurl';
        //         $rules['appurl'] = '';
        //     }
        //     // メアドが空の場合、メアドのバリデーションをクリアし、電話番号のバリデーションを追加する。
        //     if (is_null($request['appurl'])) {
        //         $rules['appurl'] = 'required_without:googleurl|sometimes|numeric|max:14';
        //         $rules['googleurl'] = '';
        //     }
        // }

        $game->fill($form);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
