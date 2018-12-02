<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $guared = 'id';

    public function ticket()
    {
    	return $this->hasMany('App\Tickets');
    }
}
