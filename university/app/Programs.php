<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    Protected $fillable = ['pid','ptitle','duration'];
	protected $primaryKey = 'pid';

    public function student(){
		return $this->hasMany('App\Student','pid');
	}
    public function course(){
		return $this->hasMany('App\Course','code','pid');
	}
}
