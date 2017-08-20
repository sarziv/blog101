<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create() {
    return view('registration.create');
    }
    public function store(RegistrationForm $form) {

        $form ->persist();

        session()->flash('message','Thanks for singing up!');

        return redirect()->home();

    }

}
