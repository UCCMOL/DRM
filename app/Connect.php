<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connect extends Model
{
    //
	protected $table = 'teacher_ta_lists';
	protected $fillable = [
		'teacher_id',
		'ta_id',
	];

}
