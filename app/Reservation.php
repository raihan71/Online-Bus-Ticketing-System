<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = 'id';

    public function user()
    {
    	return $this->hasMany('App\User');
    }

    public function ticket()
    {
    	return $this->belongsTo('App\Tickets');
    }
}
