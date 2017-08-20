<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\Welcome;


class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function persist ()
    {
        $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);

        auth()->login($user);

        Mail::to($user)->send(new Welcome($user));

    }
}
