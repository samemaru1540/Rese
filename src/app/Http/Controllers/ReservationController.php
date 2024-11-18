<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // 予約の作成
        $user = Auth::user();
        // 今日の日付と現在の時刻をデフォルトで設定
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        // 予約の日付と時刻が指定されていない場合に、デフォルト値を使う
        $Date = $request->input('date', $currentDate);
        $Time = $request->input('time', $currentTime);

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'shop_id' => $request->shop_id,
            'date' => $Date,
            'time' => $Time,
            'number' => $request->number,
        ]);

        $shop = Shop::findOrFail($request->shop_id);
        return view('detail', compact('reservation', 'shop'));
    }

    public function thankYou()
    {
        return view('reservation_thanks');
    }
}
