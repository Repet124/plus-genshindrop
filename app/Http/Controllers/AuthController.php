<?php

namespace App\Http\Controllers;

use App\Models\TelegramUser;
use Azate\LaravelTelegramLoginAuth\TelegramLoginAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login(TelegramLoginAuth $telegramLoginAuth, Request $request) {

		if (!$telegramUserEntity = $telegramLoginAuth->validateWithError($request)) {
			return back();
		}

		$tgUser = TelegramUser::fromData($telegramUserEntity);

		Auth::login($tgUser->user, true);
		$request->session()->regenerate();

		return $telegramUserData;
	}
}
