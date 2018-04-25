<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
	protected $table = 'Questionnaires';
	protected $fillable = [
		'name',
		'owner',
		'create_time',
		'audit_time',
	];
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function quests()
	{
		return $this->hasMany('App\Quest');
	}
	public static function boot()
	{
		parent::boot();
		static::deleted(function($Questionniare)
		{
			$Questionnaire->quests()->delete();
		}
	}	
}
