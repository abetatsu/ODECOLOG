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
                'name' => 'example',
                'email' => 'test@example.com',
                'password' => Hash::make('konnitiha0840'),
                'age' => '秘密',
                'job' => '秘密',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'public_id' => 'hageprofile_linkgv',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1600220367/hageprofile_linkgv.png',
            ],
            [
                'name' => 'example2',
                'email' => 'test2@example.com',
                'password' => Hash::make('konnitiha0841'),
                'age' => '秘密',
                'job' => '秘密',
                'created_at' => new Carbon(),
                'updated_at' => new Carbon(),
                'public_id' => 'hageprofile_linkgv',
                'image_path' => 'https://res.cloudinary.com/tatsu/image/upload/v1600220367/hageprofile_linkgv.png',
            ],
        ]);
    }
}
