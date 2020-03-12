<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'image' => 'required',
        'relrece' => 'required',
        'title' => 'required',
        'genre' => 'required',
        'applink' => 'required',
        'googlelink' => 'required'
    );

    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
