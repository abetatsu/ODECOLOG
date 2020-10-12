<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->insert([
            [
                'user_id' => 21,
                'post_id' => 1,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
            [
                'user_id' => 1,
                'post_id' => 11,
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
            ],
        ]);
    }
}
