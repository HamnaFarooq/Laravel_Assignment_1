<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
	Protected $fillable = ['pid','pname'];
	protected $primaryKey = 'pid';

	public function types(){
		return $this->belongsToMany(Types::class,'pageusertype','pid','tid');
	}
}
