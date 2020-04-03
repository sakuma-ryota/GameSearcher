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
        'applink' => 'required_without:googlelink',
        'googlelink' => 'required_without:applink'
    );

    public function games()
    {
        return $this->belongsTo('App\User');
    }

    public function histories()
    {
        return $this->hasMany('App\History');
    }
}
