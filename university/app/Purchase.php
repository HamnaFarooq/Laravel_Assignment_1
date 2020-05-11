<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
	protected $table = 'purchase';
	protected $fillable = ['Sid','Productid','Cafeid','Quantity'];
	protected $primaryKey = [ 'Sid','Productid','Cafeid'];
	public $incrementing = false;

}
