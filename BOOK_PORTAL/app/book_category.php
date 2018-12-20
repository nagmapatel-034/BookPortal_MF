<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_category extends Model
{
    protected $table='book_category';
    public $primaryKey='category_id';
    public $timestamps=true;

    public function book()
    {
        return $this->hasMany('App\book_items');
    }
}
