<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '田中太郎',
                'email' => 'test@example.com',
                'password' => Hash::make('konnitiha0840'),
                'age' => '20-29歳',
                'job' => '官公庁・自治体',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'public_id' => 'hageprofile_linkgv',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1600220367/hageprofile_linkgv.png',
            ],
            [
                'name' => '山田次郎',
                'email' => 'test2@example.com',
                'password' => Hash::make('konnitiha0841'),
                'age' => '20-29歳',
                'job' => '教育・研究機関',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'public_id' => 'mask',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1601097996/mask.png',
            ],
        ]);
    }
}
