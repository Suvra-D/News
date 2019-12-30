<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function creator() {
        return $this->belongsTo('App\User','created_by','id');
    }
}
