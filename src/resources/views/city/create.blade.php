@php
    $title = 'Додати нове місто';
    $formAction = route('city.store');
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- country_id -->
    <div class="form-group">
        <label for="country_id">Область</label>
        <select class="form-control select2bs4 w-100" id="country_id" name="country_id" data-placeholder="Оберіть область" required>
            <option></option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        @error('country_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- name -->
    <div class="form-group">
        <label for="name">Назва міста</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву міста" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
