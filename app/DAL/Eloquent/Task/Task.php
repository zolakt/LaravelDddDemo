<?php

namespace LaravelDemo\DAL\Eloquent\Task;

use Illuminate\Database\Eloquent\Model;
use LaravelDemo\DAL\Eloquent\User\User;

/**
 *
 * @property int $id
 * @property string $name
 * @property \DateTime $time
 * @property int $user_id
 * @property mixed $user
 */
class Task extends Model
{

	public function user()
	{
		return $this->belongsTo(User::class);
	}

}
