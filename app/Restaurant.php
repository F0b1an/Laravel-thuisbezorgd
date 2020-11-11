<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	public function Users()
	{
		return $this->belongsTo('App\User');
	}

	public function Consumables()
	{
		return $this->hasMany('App\Consumable');
	}

	protected $fillable = [
        'user_id', 'title', 'description', 'opens_at', 'closes_at', 'address', 'zip_code'
    ];

}
