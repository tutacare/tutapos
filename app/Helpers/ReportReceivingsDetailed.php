<?php

use App\ReceivingItem;

class ReportReceivingsDetailed {

    public static function receiving_detailed($receiving_id)
    {
        $receivingitems = ReceivingItem::where('receiving_id', $receiving_id)->get();
        return $receivingitems;
    }

}