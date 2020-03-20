<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $guarede = array('id');

    public static $rules = array(
        'game_id' => 'required',
        'edited_at' => 'required'
    );
}
