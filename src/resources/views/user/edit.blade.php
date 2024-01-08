@php
    $title = "Редагувати користувача \"" . $user->getFullName() . "\"";
    $formAction = route('user.update', $user->id);
    $isUpdate = true;
@endphp

@extends('layouts.form')

@section('form-body')
    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" placeholder="Choose photo" value="{{ $user->photo }}" required>
    </div>

    <!-- last_name -->
    <div class="form-group">
        <label for="last_name">Прізвище</label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введіть прізвище" value="{{ $user->last_name }}" required>
        @error('last_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- first_name -->
    <div class="form-group">
        <label for="first_name">Ім'я</label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введіть ім'я" value="{{ $user->first_name }}" required>
        @error('first_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- middle_name -->
    <div class="form-group">
        <label for="middle_name">По батькові</label>
        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Введіть по батькові" value="{{ $user->middle_name }}">
        @error('middle_name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- email -->
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введіть e-mail" value="{{ $user->email }}" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- password -->
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Введіть пароль">
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- gender -->
    <div class="form-group">
        <label for="gender_id">Стать</label>
        <select class="form-control select2bs4 w-100" id="gender_id" name="gender_id" data-placeholder="Оберіть стать" required>
            @foreach ($genders as $gender)
                <option value="{{ $gender->id }}" {{ $user->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
            @endforeach
        </select>
        @error('gender_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- birth_day -->
    <div class="form-group">
        <label for="birth_day">День народження</label>
        <div class="input-group">
            <div class="input-group-prepend" data-target="#birth_day">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="birth_day" name="birth_day" value="{{ $user->birth_day->format('d/m/Y') }}" required>
        </div>
        @error('birth_day')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- city_id -->
    <div class="form-group">
        <label>Місто</label>
        <select class="form-control select2bs4 w-100" id="city_id" name="city_id" data-placeholder="Оберіть місто" required>
            <option></option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }} ({{ $city->country->name }})</option>
            @endforeach
        </select>
        @error('city_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
@endsection

@push('scripts')
    <!-- InputMask -->
    <script src="{{ asset('/adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Script -->
    <script>
        $(function () {
            $('#birth_day').inputmask(
                'dd/mm/yyyy',
                {
                    'placeholder': 'дд/мм/рррр'
                }
            )
        })
    </script>
@endpush
