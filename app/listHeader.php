<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listHeader extends Model
{
    protected $fillable = [
        'header', 'date',
    ];
    public function lists()
    {


       return  $this->hasMany('App\Lists','header_id');
    }
}
