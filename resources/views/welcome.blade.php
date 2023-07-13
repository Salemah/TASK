@extends('master')
@section('title', 'Customer')
@section('content')
    <h1>Customer</h1>
    <a href="{{ route('customer.create') }}" type="button" class="btn btn-primary my-2">Create</a>
    <a href="{{ route('customer.index') }}" type="button" class="btn btn-primary my-2">Customer List</a>
    <a href="{{ route('customer.show', 1) }}" type="button" class="btn btn-primary my-2">Show ALL in Map</a>
@endsection
