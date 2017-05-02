<?php

namespace App\Http\Controllers;

use App\Card;
use Cache;

class CardsController extends Controller
{
    public function index()
    {
//        $cards = Cache::remember('cards',5,function() {
//            return Card::with('notes')->get();
//        });
        $cards = Card::with('notes')->get();
        return view('cards.index', compact('cards'));
    }
}
