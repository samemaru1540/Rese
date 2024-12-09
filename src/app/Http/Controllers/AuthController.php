<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
        public function create(RegisterRequest $request)
    {
        $form = $request->all()->validated();
        User::create($form);
        return redirect('thanks');
    }
}
