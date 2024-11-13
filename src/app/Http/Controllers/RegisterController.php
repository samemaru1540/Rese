<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request)
    {
        $form = $request->all();
        User::create($form);
        return view('register_thanks');
    }
}
