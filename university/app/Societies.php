<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Societies extends Model
{
	protected $fillable = ['socid','socname','type'];
    protected $primaryKey = 'socid';

	public function students(){
		return $this->belongsToMany('App\Student','participate','socid','sid');
	}
	public function participate(){
		return $this->hasMany('App\Participate', 'socid');
	}
}
