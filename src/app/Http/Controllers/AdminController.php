<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // 予約情報をコレクションとして取得
        $reservations = $user->reservations()->get(); // これでコレクションになります
        
        // お気に入り情報もコレクションとして取得
        $favorites = $user->favorites()->get(); // これでコレクションになります

        return view('mypage', compact('user', 'reservations', 'favorites'));
    }

        public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back();
    }
}
