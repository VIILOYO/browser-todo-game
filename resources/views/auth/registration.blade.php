@extends('layouts.main')

<form action="{{ route('auth.accept-registration') }}" method="POST">
    @csrf

    @if($errors->has('auth-error'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('auth-error') }}
        </div>
    @endif

    <div class="form-group">
        <label for="name">ФИО</label>
        <input type="text" name="name" placeholder="фИО" value="{{ old('name') ?? '' }}">
        @if ($errors->has('name'))
            <small id="nameHelp" class="form-text text-muted">{{ $errors->first('name') }}</small>
        @else
            <small id="nameHelp" class="form-text text-muted">Фамилия Имя Отчество</small>
        @endif
    </div>

    <div class="form-group">
        <label for="email">Почта</label>
        <input type="email" name="email" placeholder="Почта" value="{{ old('email') ?? '' }}">
        @if ($errors->has('email'))
            <small id="emailHelp" class="form-text text-muted">{{ $errors->first('email') }}}</small>
        @else
            <small id="emailHelp" class="form-text text-muted">Необходимо указать действующую почту</small>
        @endif
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="Пароль" value="{{ old('password') ?? '' }}">
        @if ($errors->has('password'))
            <small id="passwordHelp" class="form-text text-muted">{{ $errors->first('password') }}}</small>
        @else
            <small id="passwordHelp" class="form-text text-muted">Укажите сложный пароль</small>
        @endif
    </div>

    <div class="form-group">
        <label for="password_confirmation">Подтверждение пароля</label>
        <input type="password" name="password_confirmation" placeholder="Подтверждение пароля" value="{{ old('password_confirmation') ?? '' }}">
        @if ($errors->has('password_confirmation'))
            <small id="passwordHelp" class="form-text text-muted">{{ $errors->first('password_confirmation') }}}</small>
        @else
            <small id="passwordHelp" class="form-text text-muted">Подтвердите указанный пароль</small>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
