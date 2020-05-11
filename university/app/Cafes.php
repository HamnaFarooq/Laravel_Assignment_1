<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cafes extends Model
{
	protected $fillable = ['CafeId','Cafename','Cafelocation'];
    protected $primaryKey = 'CafeId';

	public function products(){
		return $this->belongsToMany('App\Products', 'productsincafe' , 'Cafeid', 'Productid' );
	}
}
