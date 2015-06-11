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
            Supplier: {{ $receivings->supplier->company_name}}<br />
            Receiving ID:{{$receivingItemsData->receiving_id}}<br />
            Employee: {{$receivings->user->name}}<br />
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
                @foreach($receivingItems as $value)
                <tr>
                    <td>{{$value->item->item_name}}</td>
                    <td>{{$value->cost_price}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->total_cost}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Payment Type: {{$receivings->payment_type}}
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
            <a href="{{ url('/receivings') }}" type="button" class="btn btn-info pull-right hidden-print">New Receiving</a>
        </div>
    </div>
</div>
<script>
function printInvoice() {
    window.print();
}
</script>
@endsection