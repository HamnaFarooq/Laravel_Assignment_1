<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
	Protected $fillable = ['sid','stitle','sdate'];
	protected $primaryKey = 'sid';

	public function register(){
		return $this->hasMany('App\Register','sid','sesid');
	}
}
