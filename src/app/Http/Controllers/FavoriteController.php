<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function store(Request $request)
    {
        $favorite = Favorite::where('user_id', Auth::id())
                        ->where('shop_id', $request->shop_id)
                        ->first();

        if ($favorite) {
            // お気に入り解除
            $favorite->delete();
        } else {
            // お気に入り登録
            Favorite::create([
                'user_id' => Auth::id(),
                'shop_id' => $request->shop_id,
            ]);
        }

        return redirect()->back();
    }
}
