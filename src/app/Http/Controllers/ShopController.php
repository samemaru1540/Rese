<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop', compact('shops'));
    }

    public function detail($id)  // $id を引数として受け取る
    {
        $shop = Shop::with(['area', 'genre'])->find($id);
        return view('detail', compact('shop'));
    }
}
