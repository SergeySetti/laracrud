@extends('layouts.app')
@section('content')
@include('orders.filter')
@include('orders.search')
<div class="orders-list">
@include('orders.list')
</div>
@endsection