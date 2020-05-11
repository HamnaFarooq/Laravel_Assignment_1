<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
	Protected $fillable = ['tid','tname'];
	protected $primaryKey = 'tid';

	public function users(){
		return $this->hasMany('App\User','tid');
	}
	public function pages(){
		return $this->belongsToMany(Pages::class,'pageusertype','tid','pid');
	}
}
