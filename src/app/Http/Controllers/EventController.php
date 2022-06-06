<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // 追加


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

    public function create(EventRequest $request)
    {
        try {
            // トランザクション開始
            DB::beginTransaction();
            // リクエストされたデータをもとにeventsテーブルにデータをinsert
            $insertEvent = $this->event->insertEventData($request);
            // 処理に成功したらコミット
            DB::commit();
        } catch (\Throwable $e) {
            // 処理に失敗したらロールバック
            DB::rollback();
            // エラーログ
            \Log::error($e);
            // 登録処理失敗時にリダイレクト
            return redirect()->route('event.index')->with('error', 'もくもく会の登録に失敗しました。');
        }
        return redirect()->route('event.index');
    }

    /**
     * 詳細画面
     */
    public function show($id)
    {
        // $id(event_id)をもとに、eventsテーブルの特定のレコードに絞り込む
        $event = $this->event->findEventByEventId($id);

        // 指定の日付を△△/××に変換する
        $date = date("m/d", strtotime($event->date));
        //指定日の曜日を取得する
        $getWeek = date('w', strtotime($event->date));
        //配列を使用し、要素順に(日:0〜土:6)を設定する
        $week = [
            '日', //0
            '月', //1
            '火', //2
            '水', //3
            '木', //4
            '金', //5
            '土', //6
        ];

        // 開始時間 ex.15:00:00→15:00に変換。秒部分を切り捨て
        $start_time = substr($event->start_time, 0, -3);
        // 終了時間 ex.19:00:00→19:00に変換。秒部分を切り捨て
        $end_time = substr($event->end_time, 0, -3);

        return view('event.show', compact(
            'event',
            'date',
            'getWeek',
            'week',
            'start_time',
            'end_time',
        ));
    }
}
