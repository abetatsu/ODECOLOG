<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
            [
            'user_id' => 1,
            'size' => '6cm',
            'sleep_time' => '7時間',
            'care_item1' => 'サクセスシャンプー',
            'care_item2' => 'サクセススプレー',
            'care_item3' => '化粧水',
            'care_item4' => '乳液',
            'alcohol' => '1合（180ml）未満',
            'stress' => 'ほぼない',
            'remarks' => '頭皮が柔らかい',
            'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1600238679/forehead-65059_1280_o2aslb.jpg',
            'created_at' => new Carbon(),
            'updated_at' => new Carbon(),
            'day' => '2020-09-12',
            ],
            [
            'user_id' => 1,
            'size' => '6cm',
            'sleep_time' => '7時間',
            'care_item1' => 'サクセスシャンプー',
            'care_item2' => 'サクセススプレー',
            'care_item3' => '化粧水',
            'care_item4' => '乳液',
            'alcohol' => '1合（180ml）未満',
            'stress' => 'ほぼない',
            'remarks' => '頭皮が柔らかい',
            'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1591140117/fvwv0qxcplgserfuhnb4.png',
            'created_at' => new Carbon(),
            'updated_at' => new Carbon(),
            'day' => '2020-09-22',
            ],
            [
            'user_id' => 1,
            'size' => '6cm',
            'sleep_time' => '7時間',
            'care_item1' => 'サクセスシャンプー',
            'care_item2' => 'サクセススプレー',
            'care_item3' => '化粧水',
            'care_item4' => '乳液',
            'alcohol' => '1合（180ml）未満',
            'stress' => 'ほぼない',
            'remarks' => '頭皮が柔らかい',
            'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1591141188/kkp9y6rzam9twjo19bfk.png',
            'created_at' => new Carbon(),
            'updated_at' => new Carbon(),
            'day' => '2020-09-16',
            ],
        ]);
    }
}
