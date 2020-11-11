<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
	public function orders()
	{
		return $this->belongsToMany('App\Order');
	}

    protected $fillable = [
        'title', 'description', 'price', 'category', 'restaurant_id'
    ];
}
