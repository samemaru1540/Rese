<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // 予約情報をコレクションとして取得
        $reservations = $user->reservations->map(function ($reservation) {
        $reservation->formatted_time = \Carbon\Carbon::parse($reservation->time)->format('H:i');
        return $reservation;
    }); // これでコレクションになります
        
        // お気に入り情報もコレクションとして取得
        $favorites = $user->favorites()->get(); // これでコレクションになります
        $favoriteShopIds = $favorites->pluck('shop_id')->toArray();

        return view('mypage', compact('user', 'reservations', 'favorites', 'favoriteShopIds'));
    }

    public function reservationDestroy(Request $request)
    {
        $reservation = Reservation::where('shop_id', $request->shop_id)
                                ->where('user_id', Auth::id())
                                ->first();

        if ($reservation) {
            $reservation->delete();
        }

        return back();
    }


    public function favoriteDestroy(Request $request)
    {
        $favorite = Favorite::where('shop_id', $request->shop_id)
                            ->where('user_id', Auth::id())
                            ->first();

        if ($favorite) {
            $favorite->delete();
        }

        return back();
    }
}
