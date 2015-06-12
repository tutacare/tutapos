@extends('app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/app.js', array('type' => 'text/javascript')) !!}
<style>
table td {
    border-top: none !important;
}
</style>
<div class="container-fluid">
   <div class="row">
        <div class="col-md-12" style="text-align:center">
            TutaPOS - Tuta Point of Sale           
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Customer: {{ $sales->customer->name}}<br />
            Sale ID: SALE{{$saleItemsData->sale_id}}<br />
            Employee: {{$sales->user->name}}<br />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
           <table class="table">
                <tr>
                    <td>Item</td>
                    <td>Price</td>
                    <td>Qty</td>
                    <td>Total</td>
                </tr>
                @foreach($saleItems as $value)
                <tr>
                    <td>{{$value->item->item_name}}</td>
                    <td>{{$value->selling_price}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->total_selling}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Payment Type: {{$sales->payment_type}}
        </div>
    </div>
    <hr class="hidden-print"/>
    <div class="row">
        <div class="col-md-8">
            &nbsp;
        </div>
        <div class="col-md-2">
            <button type="button" onclick="printInvoice()" class="btn btn-info pull-right hidden-print">Print</button> 
        </div>
        <div class="col-md-2">
            <a href="{{ url('/sales') }}" type="button" class="btn btn-info pull-right hidden-print">New Sale</a>
        </div>
    </div>
</div>
<script>
function printInvoice() {
    window.print();
}
</script>
@endsection