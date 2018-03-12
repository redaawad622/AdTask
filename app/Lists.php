<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    public function listHeader()
    {
        $this->hasOne(listHeader::class);
    }
}
