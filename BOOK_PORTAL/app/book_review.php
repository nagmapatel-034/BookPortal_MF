<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_review extends Model
{
    protected $table='book_review';
    public $primaryKey='review_id';
    public $timestamps=true;

    public function book()
    {
        return $this->belongsTo('App\Models\book_items');
    }
    
}
