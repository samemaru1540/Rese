<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();

        $favorite = Favorite::create({
            'user_id' => $user->id,
            'shop_id' => $request->shop_id,
        });
        return redirect('/');
    }
}
