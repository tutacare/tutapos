<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model {

	public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

}
