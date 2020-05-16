<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
	protected $table = 'register';
	Protected $fillable = ['sid','code','sesid','Grade'];
	Protected $primaryKey = 'Grade';

	public function student(){
		return $this->belongsTo('App\Student', 'sid');
	}
	public function session(){
		return $this->belongsTo('App\Sessions', 'sesid','sid');
	}
	public function course(){
		return $this->belongsTo('App\Courses', 'code');
	}
}
