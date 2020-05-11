<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
	protected $table = 'participate';
	Protected $fillable = ['joindate','sid','socid'];
	protected $primaryKey = ['joindate','sid','socid'];
}
