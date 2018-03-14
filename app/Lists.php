<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = [
        'item', 'header_id',
    ];
    public function listHeader()
    {
       return $this->belongsTo('App\listHeader','header_id');
    }
}
