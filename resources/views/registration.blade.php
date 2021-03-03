@extends('app')

@section('title') Регистрация @endsection('title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Регистрация</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.registration') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" required autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patronymic" class="col-md-4 col-form-label text-md-right">Отчество</label>

                                <div class="col-md-6">
                                    <input id="patronymic" type="text" class="form-control" name="patronymic"
                                           value="{{ old('patronymic') }}" required autofocus>

                                    @error('patronymic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{old('email')}}" placeholder="email@gmail.com" required
                                           autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>

                                <div class="col-md-6">
                                    <input id="phone" type="tel"
                                           class="form-control bfh-phone @error('phone') is-invalid @enderror"
                                           name="phone" value="+7" placeholder="+79999998989" required>

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">Повторите пароль</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Регистрация
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
