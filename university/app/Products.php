<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $fillable = ['Productid','Productname','Price'];
	protected $primaryKey = 'Productid';
	public $incrementing = false;

	public function cafes(){
		return $this->belongsToMany('App\Cafes', 'productsincafe' , 'Productid' , 'Cafeid' );
	}
}
