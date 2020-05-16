<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $fillable = [ 'sid', 'sname' , 'fname' , 'adderess' , 'dob' , 'pid' , 'gpa' , 'gender' ];
	protected $primaryKey = 'sid';

    public function program(){
		return $this->belongsTo('App\Programs','pid');
	}

	public function societies(){
		return $this->belongsToMany('App\Societies', 'participate' , 'sid' , 'socid');
	}

	public function courses(){
		return $this->belongsToMany('App\Course', 'register' , 'sid' , 'code' );
	}

	public function participated(){
		return $this->hasMany('App\Participate','sid');
	}

	public function registered(){
		return $this->hasMany('App\Register','sid');
	}

}
