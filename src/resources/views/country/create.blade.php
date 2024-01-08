@php
    $title = 'Додати нову область';
    $formAction = route('country.store');
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- name -->
    <div class="form-group">
        <label for="name">Назва області</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву області" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
