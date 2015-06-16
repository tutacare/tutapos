<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemKit extends Model
{
    public function itemkititem()
    {
        return $this->hasMany('App\ItemKitItem');
    }
}
