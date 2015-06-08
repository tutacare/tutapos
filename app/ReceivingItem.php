<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model {
	
    public function item()
    {
        return $this->belongsTo('App\Item');
    }

}
