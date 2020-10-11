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
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1602425173/6fXf2SZFVUnsWnV1602424945_1602424986_zzpkhi.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-1-12',
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
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1602425275/tPFrbK3WTQIozB81602425189_1602425200_iaqtbm.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-5-16',
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
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1602425270/0UKAGPryCqxo95I1602425065_1602425085_wngifl.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-10-22',
            ],
            [
                'user_id' => 2,
                'size' => '6cm',
                'sleep_time' => '7時間',
                'care_item1' => 'サクセスシャンプー',
                'care_item2' => 'サクセススプレー',
                'care_item3' => '化粧水',
                'care_item4' => '乳液',
                'alcohol' => '1合（180ml）未満',
                'stress' => 'ほぼない',
                'remarks' => '頭皮が柔らかい',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601344276/2150325_s_putyyg.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-10-23',
            ],
            [
                'user_id' => 2,
                'size' => '6cm',
                'sleep_time' => '7時間',
                'care_item1' => 'サクセスシャンプー',
                'care_item2' => 'サクセススプレー',
                'care_item3' => '化粧水',
                'care_item4' => '乳液',
                'alcohol' => '1合（180ml）未満',
                'stress' => 'ほぼない',
                'remarks' => '頭皮が柔らかい',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601344276/2150325_s_putyyg.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-10-24',
            ],
            [
                'user_id' => 2,
                'size' => '6cm',
                'sleep_time' => '7時間',
                'care_item1' => 'サクセスシャンプー',
                'care_item2' => 'サクセススプレー',
                'care_item3' => '化粧水',
                'care_item4' => '乳液',
                'alcohol' => '1合（180ml）未満',
                'stress' => 'ほぼない',
                'remarks' => '頭皮が柔らかい',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601344276/2150325_s_putyyg.jpg',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'day' => '2020-10-25',
            ],
        ]);
    }
}
