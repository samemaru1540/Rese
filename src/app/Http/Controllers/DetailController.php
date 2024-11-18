<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Reservation;

class detailController extends Controller
{
    public function detail($id)  // $id を引数として受け取る
    {
        $shop = Shop::with(['area', 'genre'])->find($id);
        return view('detail', compact('shop'));
    }
}
