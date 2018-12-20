<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user_reader;
use App\book_genre;

class user_preference extends Model
{
    protected $table='user_preference';
    public $timestamps=false;

    protected $fillable = [
        'genre_name','user_id','genre_id'
    ];

    public function user_reader()
    {
        return $this->hasMany('user_reader', 'user_id');
    }

    public function book_genre()
    {
        return $this->hasMany('book_genre', 'genre_id');
    }
}
