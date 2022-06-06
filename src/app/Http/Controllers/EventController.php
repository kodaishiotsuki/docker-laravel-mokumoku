<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->event = new Event();
        $this->category = new Category();
    }

    /**
     * イベント一覧画面
     */
    public function index()
    {
        // Eloquentでeventsテーブルにあるデータを全て取得
        $events = $this->event->allEventsData();
        // dd($events);
        //コントローラーからビューに渡す
        return view('event.index', compact('events'));
    }

    /**
     * 会員登録画面
     */

    public function register()
    {
        $categories = $this->category->allCategoriesData();
        return view('event.register', compact('categories'));
    }

    /**
     * 会員登録処理
     */

    public function create(Request $request)
    {
        return redirect()->route('event.index');
    }
}
