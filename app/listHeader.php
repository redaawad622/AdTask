<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listHeader extends Model
{
    public function lists()
    {
        $this->hasMany(Lists::class);
    }
}
