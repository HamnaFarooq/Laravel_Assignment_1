<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	// code coursetitle crdhr pid coursetype courseprereq
	protected $fillable = [ 'code', 'coursetitle' , 'crdhr' , 'pid' , 'coursetype' , 'courseprereq'];
	protected $primaryKey = 'code';

    public function program(){
		return $this->belongsTo('App\Programs','pid');
	}

	public function teachers(){
		return $this->belongsToMany('App\Teachers', 'teach' , 'code' , 'TId' );
	}

	public function students(){
		return $this->belongsToMany('App\Student', 'register' , 'code' , 'sid' );
	}
}
