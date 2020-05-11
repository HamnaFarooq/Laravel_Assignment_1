<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
	protected $fillable = ['TId','Firstname','Lastname','Designation','Experience'];
    protected $primaryKey = 'TId';
	public $incrementing = false;

	public function courses(){
		return $this->belongsToMany('App\Course', 'teach' , 'TId' , 'code');
	}
	public function books(){
		return $this->belongsToMany('App\Books', 'teacherissue' , 'TId' , 'Isbn');
	}
}
