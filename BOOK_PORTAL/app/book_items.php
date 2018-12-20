<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class book_items extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 
    protected $table = 'book_items';

    
    public $primaryKey='book_id';


    public function category()
    {
        return $this->belongsTo('App\book_category');
    }

    public function author()
    {
        return $this->hasMany('App\book_author');
    }

    public function publisher()
    {
        return $this->hasMany('App\book_publisher');
    }
}
