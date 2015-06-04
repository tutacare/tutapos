<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingTemp extends Model {

	public function item()
    {
        return $this->belongsTo('App\Item');
    }

}
