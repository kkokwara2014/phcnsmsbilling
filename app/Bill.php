<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable=['user_id','billnumber','currentreading','previousreading','totalkwh','totalecharge','finalbill'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
