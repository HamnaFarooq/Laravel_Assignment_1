<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherissue extends Model
{
	protected $table = 'teacherissue';
	Protected $fillable = ['Isbn','Tid','Issuedate','returndate'];
	Protected $primaryKey = 'Tid';

	public function teachers(){
		return $this->belongsTo('App\Teachers', 'Tid','TId');
	}
	public function books(){
		return $this->belongsTo('App\Books', 'Isbn');
	}
}
