<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $table = 'Courses';
	protected $fillable = [
		'user_id',
		'name',
		'role',
	];	
	public function users()
	{
		return $this->belongsToMany('App\User','course_user_lists');
	}
	public function owner()
	{
		return $this->belongsTo('App\User');
	}
	public static function boot()
	{
		parent::boot();
	}
}
