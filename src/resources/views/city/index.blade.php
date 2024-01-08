@php
    $modelName = 'city';
    $tableName = 'cities';
    $title = 'Міста';
@endphp

@extends('layouts.table')

@section('table-head')
    <th>Назва</th>
    <th>Область</th>
@endsection

@section('datatable-columns')
    { data: 'cities__name' },
    { data: 'countries__name' }
@endsection
