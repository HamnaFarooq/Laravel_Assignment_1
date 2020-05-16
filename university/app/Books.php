<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
	protected $fillable = ['Isbn','Title','Author','Price','Publisher','copies'];
    protected $primaryKey = 'Isbn';
	public $incrementing = false;

	public function teachers(){
		return $this->belongsToMany('App\Teachers', 'teacherissue' , 'Isbn' , 'TId');
	}

	public function issuers(){
		return $this->hasMany('App\Teacherissue','Isbn');
	}
}
