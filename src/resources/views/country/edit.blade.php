@php
    $title = "Редагувати область \"$country->name\"";
    $formAction = route('country.update', $country->id);
    $isUpdate = true;
@endphp

@extends('layouts.form')

@section('form-body')
    <!-- name -->
    <div class="form-group">
        <label for="name">Назва області</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Введіть назву" value="{{ $country->name }}" required>
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection
