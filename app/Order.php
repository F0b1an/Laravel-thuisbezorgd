<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() 
    {
        return $this->hasOne('App\User');
    }

    public function consumables()
	{
		return $this->belongsToMany('App\Consumable');
	}

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

	 protected $fillable = [
        'user_id', 'restaurant_id', 'address', 'zip_code'
    ];
}
