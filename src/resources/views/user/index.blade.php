@php
    $modelName = 'user';
    $tableName = 'users';
    $title = 'Користувачі';
@endphp

@extends('layouts.table')

@section('table-head')
    <th>Photo</th>
    <th></th>
    <th></th>
    <th></th>
    <th>ПІБ</th>
    <th>E-mail</th>
    <th>Стать</th>
    <th>День народження</th>
    <th>Місто</th>
@endsection

@section('datatable-columns')
    {
        data: 'users__photo',
        visible: true,
        render: function(data, type, full, meta) {
        return '<div style="width: 70px; height: 70px; overflow: hidden;">' +
        '<img src="'+ data +'" alt="User Photo" style="width: 100%; height: 100%; object-fit: cover;" />' +
        '</div>'
        }
    },
    {
        data: 'users__last_name',
        visible: false
    },

    {
        data: 'users__first_name',
        visible: false
    },

    {
        data: 'users__middle_name',
        visible: false
    },

    {
        data: null,
        render: function (data, type, row, meta) {
        let firstName = data['users__first_name']
        let middleName = data['users__middle_name'] === null ? '' : data['users__middle_name']
        let lastName = data['users__last_name']

        return `${lastName} ${firstName} ${middleName}`
        }
    },
    { data: 'users__email' },
    { data: 'genders__name' },
    {
        data: 'users__birth_day',
        render: function (data, type, row, meta) {
            let date = new Date(data)
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`
        }
    },
    { data: 'cities__name' }
@endsection
