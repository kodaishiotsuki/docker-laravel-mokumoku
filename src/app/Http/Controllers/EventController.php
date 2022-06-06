<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * イベント一覧画面
     */
    public function index()
    {
        // Eloquentでeventsテーブルにあるデータを全て取得
        $events = Event::get();
        // dd($events);
        //コントローラーからビューに渡す
        return view('event.index', compact('events'));
    }
}
