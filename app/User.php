<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
	protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
	'gender',
	'height',
	'weight',
	'birthday',
	'cellphone',
	'school',
	'student_id',
	'post_office_account',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function questionnaires()
	{
		return $this->hasMany('App\Questionnaire');
	}
	public function quizzes()
	{
		return $this->hasMany('App\Quiz');
	}
	public function courses()
	{
		return $this->hasMany('App\Course');
	}
	public function roles()
	{
		return $this->hasMany('App\Role');
	}
	public static function boot()
	{
		parent::boot();
		static::deleted(function($user)
		{
			$user->Questionnaires()->delete();
			$user->Quizzes()->delete();
		});
	}
}
