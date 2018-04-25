<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
	protected $table = 'roles';
	protected $fillable = [
		'type_name',
		'type_code',
	];
	public function user()
	{
		return $this->belongsToMany('App\User','user_role_lists');
	}
	public static function boot()
	{
		parent::boot();
	}
}
