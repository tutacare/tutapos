<?php

use App\SaleItem;

class ReportSalesDetailed {

    public static function sale_detailed($sale_id)
    {
        $SaleItems = SaleItem::where('sale_id', $sale_id)->get();
        return $SaleItems;
    }

}