<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
	use HasFactory;

	protected $fillable = ['id', 'first_name', 'last_name', 'username', 'photo_url', 'user_id'];

	public function createUser(): User {
		return User::create([
			'username' => $this->username.'_'.time(),
			'password' => env('TG_PASSWORD_SALT').'_'.time()
		]);
	}
}
