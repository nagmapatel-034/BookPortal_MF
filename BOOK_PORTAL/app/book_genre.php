<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_genre extends Model
{
    protected $table='book_genre';
    public $primaryKey='genre_id';
    public $timestamps=true;

    public function book()
    {
        return $this->belongsTo('App\Models\book_items');
    }

    public function user_preference()
    {
        return $this->belongsTo('user_preference', 'genre_id');
    }
}
