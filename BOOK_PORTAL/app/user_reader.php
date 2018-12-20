<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class user_reader extends Eloquent  implements Authenticatable
{
    use AuthenticableTrait;
    protected $table='user_reader';
    protected $primaryKey='user_id';

    protected $user_category = ['user_category' => 'array'];
    protected $fillable = [
        'user_id','user_fname','user_lname','user_dob','user_phone','username','user_category','user_address','user_state','user_city', 'user_email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function user_preference()
    {
        return $this->belongsTo('user_preference', 'user_id');
    }
}
