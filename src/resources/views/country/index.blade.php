@php
    $modelName = 'country';
    $tableName = 'countries';
    $title = 'Області';
@endphp

@extends('layouts.table')

@section('table-head')
    <th>Назва</th>
@endsection

@section('datatable-columns')
    { data: 'countries__name' }
@endsection
