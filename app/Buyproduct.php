<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyproduct extends Model
{
    protected $fillable = ['product_id', 'user_id', 'delete_flg'];
}
