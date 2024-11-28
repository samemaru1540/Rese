<?php

namespace App\Http\Controllers;
use App\Models\Favorite;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        // データを保存
        Favorite::create([
            'user_id' => Auth::id(), // 現在ログインしているユーザーのID
            'shop_id' => $request->shop_id, // リクエストから取得したshop_id
        ]);

        // 成功時にリダイレクト
        return redirect()->back();
    }
}
