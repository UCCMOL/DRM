<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
	protected $table = 'Options';
	protected $fillable =[
		'name',
	];
	public function quest()
	{
		return $this->belongsTo('App\Quest');
	}
	public static function boot()
	{
		parent::boot();
		static::deleted(function($option)
		{
		});
	}
}
