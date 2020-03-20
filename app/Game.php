<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'image' => 'required',
        'releace' => 'required',
        'title' => 'required',
        'genre' => 'required',
        'link' => 'required|url',
        'applink' => 'required|url',
        'googlelink' => 'required|url'
    );

    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
