<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // 追加する


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルの中身を削除
        DB::table('events')->truncate();

        // テーブルにデータを挿入
        DB::table('events')->insert([
            [
                'event_id' => 1,
                'category_id' => 1,
                'title' => 'パンを買う',
                'date' => '2021-11-07',
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
                'content' => 'テスト書斎',
                'entry_fee' => 100,
                'created_at' => '2022-02-11 12:11:11',
                'updated_at' => '2022-02-13 14:22:33'
            ],
            [
                'event_id' => 2,
                'category_id' => 2,
                'title' => 'パンを買う',
                'date' => '2021-11-07',
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
                'content' => 'テスト書斎',
                'entry_fee' => 100,
                'created_at' => '2022-02-11 12:11:11',
                'updated_at' => '2022-02-13 14:22:33'
            ],
            [
                'event_id' => 3,
                'category_id' => 3,
                'title' => 'パンを買う',
                'date' => '2021-11-07',
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
                'content' => 'テスト書斎',
                'entry_fee' => 100,
                'created_at' => '2022-02-11 12:11:11',
                'updated_at' => '2022-02-13 14:22:33'
            ],
        ]);
    }
}
