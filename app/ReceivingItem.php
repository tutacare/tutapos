<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model {

	public function receiving()
    {
        return $this->hasMany('App\Receiving')->orderBy('id', 'DESC');
    }

}
