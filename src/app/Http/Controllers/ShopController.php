<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function search(Request $request)
    {
        $query = Shop::query();

        // エリアでフィルタ
        if ($request->filled('area')) {
            $query->where('area_id', $request->area);
        }

        // ジャンルでフィルタ
        if ($request->filled('genre')) {
            $query->where('genre_id', $request->genre);
        }

        // 店名でフィルタ
        if ($request->filled('shop')) {
            $query->where('name', 'LIKE', "%{$request->shop}%");
        }

        // 検索結果を取得
        $shops = $query->get();

        return view('shop', compact('shops'));
    }

    public function index()
    {
        $shops = Shop::all();
        $areas = Area::all();  // エリア一覧
        $genres = Genre::all();  // ジャンル一覧

    return view('shop', compact('shops', 'areas', 'genres'));
    }

    public function detail($id)  // $id を引数として受け取る
    {
        $shop = Shop::with(['area', 'genre'])->find($id);
        return view('detail', compact('shop'));
    }
}
