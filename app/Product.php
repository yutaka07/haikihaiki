<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','comment', 'expiration_date', 'price', 'photofile','admin_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
