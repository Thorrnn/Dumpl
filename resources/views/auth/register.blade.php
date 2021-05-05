@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Реєстрація</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="login" class="col-md-4 col-form-label text-md-right">Логін</label>
                                <div class="col-md-6">
                                    <input id="login" type="text"
                                           class="form-control @error('login') is-invalid @enderror" name="login"
                                           value="{{ old('login') }}" required autocomplete="login" autofocus>

                                    @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Ім'я</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Прізвище</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                           class="form-control @error('surname') is-invalid @enderror" name="surname"
                                           value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">Стать</label>
                                <div class="col-md-6">
                                    <select name="sex" id="sex" class="form-control @error('sex') is-invalid @enderror"
                                            required>
                                        <option value="male">Чоловіча</option>
                                        <option value="female">Жіноча</option>
                                    </select>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="education" class="col-md-4 col-form-label text-md-right">Рівень
                                    освіти</label>
                                <div class="col-md-6">
                                    <select name="education" id="education" class="form-control @error('education') is-invalid @enderror"
                                            required>
                                        <option value="preschool"> Дошкільна освіта
                                        <option value="generalSecondary_start">Початкова школа (1-4 класи)
                                        <option value="generalSecondary_middle">Основна школа (5-9 класи)
                                        <option value="generalSecondary_high">Старша школа (10-11 класи)
                                        <option value="out-of-school">Позашкільна освіта
                                        <option value="vocational">Професійно-технічна освіта
                                        <option value="higher">Вища освіта
                                        <option value="postgraduate">Післядипломна освіта
                                        <option value="graduateSchool">Аспірантура
                                        <option value="doctoralStudies">Докторантура
                                        <option value="self-education">Самоосвіта
                                    </select>
                                    @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fieldActivity" class="col-md-4 col-form-label text-md-right">Сфера
                                    діяльності</label>
                                <div class="col-md-6">
                                    <select name="fieldActivity" id="fieldActivity"
                                            class="form-control @error('fieldActivity') is-invalid @enderror"
                                            required>
                                        <option value="ecology">Екологія
                                        <option value="economy">Економіка
                                        <option value="medicine">Медицина
                                        <option value="physicalEducation">Фізична культура
                                        <option value="pedagogy">Освіта
                                        <option value="management">Менеджмент
                                        <option value="art">Мистецтво
                                        <option value="science">Наука
                                    </select>
                                    @error('fieldActivity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Вік</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" max="100" min="1"
                                           class="form-control @error('age') is-invalid @enderror" name="age"
                                           value="{{ old('age') }}" required autocomplete="age" autofocus>

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

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
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Підтвердження
                                    паролю</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="aboutMyself" class="col-md-4 col-form-label text-md-right">Інформація про
                                    себе</label>
                                <div class="col-md-6">
                                    <textarea name="aboutMyself" type="text"
                                              class="form-control @error('aboutMyself') is-invalid @enderror"
                                              placeholder="Опишіть себе">{{old('aboutMyself')}}</textarea>

                                    @error('aboutMyself')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Зареєструватися
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
