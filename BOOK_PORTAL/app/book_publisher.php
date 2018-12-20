<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_publisher extends Model
{
    protected $table='book_publisher';
    public $primaryKey='publisher_id';
    public $timestamps=true;

    public function book()
    {
        return $this->belongsTo('App\book_items');
    }
}
