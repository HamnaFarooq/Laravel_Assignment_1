<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
	protected $table = 'participate';
	Protected $fillable = ['joindate','sid','socid'];
	Protected $primaryKey = 'joindate';

	public function student(){
		return $this->belongsTo('App\Student', 'sid');
	}
	public function societies(){
		return $this->belongsTo('App\Societies', 'socid');
	}

}
