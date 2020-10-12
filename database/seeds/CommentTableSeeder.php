<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => '11',
                'post_id' => '1',
                'comment' => '私もこのシャンプーを愛用しています。他のシャンプーに比べて汚れが落ちている感じがします。しかし、少し髪の毛がきしむ感じもします。',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => '21',
                'post_id' => '1',
                'comment' => '私もこのシャンプーを使ってますが、EXTRA COOLは何か違いがありますか？',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => '1',
                'post_id' => '1',
                'comment' => 'EXTRA COOLは使った感じ他のものとの違いはあまり感じませんでした。もともと清涼感があるからかもしれません。',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
        ]);
    }
}
