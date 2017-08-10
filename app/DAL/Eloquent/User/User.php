<?php

namespace LaravelDemo\DAL\Eloquent\User;

use Illuminate\Database\Eloquent\Model;
use LaravelDemo\Domain\Task;

/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $first_name
 * @property string $last_name
 * @property string $country
 * @property string $city
 * @property string $street
 * @property string $house_number
 * @property \Datetime $created_at
 * @property \Datetime $updated_at
 */
class User extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

}
