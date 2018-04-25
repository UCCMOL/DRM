<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    //
	protected $table = 'Quests';
	protected $fillable = [
		'problem',
		'quest_type',
	];
	public function questionniare()
	{
		return $this->belongsTo('App\Questionnaire');
	}
	public function options()
	{
		return $this->hasMany('App\Option');
	}
	public static function boot()
	{
		parent::boot();
		static::deleted(function ($quest)
		{
			$quest->options()->delete();
		});
	}
}
