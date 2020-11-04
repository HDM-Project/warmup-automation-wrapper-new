<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_activities extends Model
{
    //
    protected $table = 'event_activity';

    protected $fillable = ['email', 'open_timestamp', 'click_timestamp'];

    public $timestamps = false;
}
