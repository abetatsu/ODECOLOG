<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id', 'size', 'sleep_time', 'care_item1', 'care_item2',
        'care_item3', 'care_item4', 'alcohol', 'stress', 'remarks',
        'image_path', 'public_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
