<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Exception;


class RegisterController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.index'));
        }

        $validateFields = $request->validate([
            'last_name' => ['required',
                'string',
                'max:50'],
            'first_name' => ['required',
                'string',
                'max:50'],
            'patronymic' => ['required',
                'string',
                'max:50'],
            'email' => ['required',
                'string',
                'email',
                'unique:users'],
            'phone' => ['required',
                'string',
                'regex:/\+7[0-9]{10}/',
                'max:12',
                'unique:users'],
            'password' => ['required',
                'string',
                'min:6',
                'regex:/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/',
                'confirmed'],
            'password_confirm' => [
                'min:6']
        ]);


        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        if (User::where('phone', $validateFields['phone'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'phone' => 'Этот номер телефона занят уже'
            ]);

        }

//        if($validateFields['password'] != $validateFields['password_confirmation']){
//
//            return redirect(route('user.registration'))->withErrors([
//                'password_confirm' => 'Пароли должны совпадать'
//            ]);
//        }
        $user = User::create($validateFields);

        if ($user) {
            Auth::login($user);
            return redirect(route('user.index'));
        }


        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка'
        ]);
    }
}
