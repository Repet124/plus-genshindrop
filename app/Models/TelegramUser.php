<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
	use HasFactory;

	protected $fillable = ['id', 'first_name', 'last_name', 'username', 'photo_url', 'user_id'];

	public static function fromData($telegramUserData): TelegramUser {
		// method accept data array from telegram
		if (!($tgUser = self::where('id', $telegramUserData['id']))) {
			$user = User::create([
				'username' => $telegramUserData['username'].'_'.time(),
				'password' => env('TG_PASSWORD_SALT').'_'.time()
			]);

			$tgUser = self::create([
				'id' => $telegramUserData['id'],
				'first_name' => $telegramUserData['first_name'],
				'last_name' => $telegramUserData['last_name'],
				'username' => $telegramUserData['username'],
				'photo_url' => $telegramUserData['photo_url'],
				'user_id' => $user->id
			]);

		} else {
			$hasChange = false;
			foreach ($telegramUserData as $field => $val) {
				if($tgUser->$field !== $val) {
					$hasChange = true;
					$tgUser->$field = $val;
				}
			}
			$tgUser->save();
		}
		return $tgUser;
	}
}
