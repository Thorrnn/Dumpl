@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('register.registerList.register')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>

                                @error('login')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">Sex</label>
                            <div class="col-md-6">
                                <input list="sex" class="form-control @error('sex') is-invalid @enderror"
                                       name="sex" value="{{ old('sex') }}" required autocomplete="sex" autofocus>
                                <datalist id="sex">
                                    <option value="male">Мужской
                                    <option value="female">Женский
                                </datalist>

                                @error('sex')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="education" class="col-md-4 col-form-label text-md-right">Education</label>
                            <div class="col-md-6">
                                <input list="education" class="form-control @error('education') is-invalid @enderror"
                                       name="education" value="{{ old('education') }}" required autocomplete="education" autofocus>
                                <datalist id="education">
                                    <option value="preschool">Дошкольное образование
                                    <option value="generalSecondary">Общее среднее образование
                                    <option value="out-of-school">Внешкольное образование
                                    <option value="vocational">Профессионально-техническое образование
                                    <option value="higher">Высшее образование
                                    <option value="postgraduate">Последипломное образование
                                    <option value="graduateSchool">Аспирантуру
                                    <option value="doctoralStudies">Докторантуру
                                    <option value="self-education">Самообразование
                                </datalist>
                                @error('sex')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fieldActivity" class="col-md-4 col-form-label text-md-right">fieldActivity</label>
                            <div class="col-md-6">
                                <input list="fieldActivity" class="form-control @error('fieldActivity') is-invalid @enderror"
                                       name="fieldActivity" value="{{ old('fieldActivity') }}" required autocomplete="fieldActivity" autofocus>
                                <datalist id="fieldActivity">
                                    <option value="ecology">Экология
                                    <option value="economy">Экономика
                                    <option value="medicine">Медицина
                                    <option value="physicalEducation">Физическая культура
                                    <option value="pedagogy">Образоваие
                                    <option value="management">Менеджмент
                                    <option value="art">Искусство
                                    <option value="science">Наука
                                </datalist>

                                @error('fieldActivity')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aboutMyself" class="col-md-4 col-form-label text-md-right">aboutMyself</label>
                            <div class="col-md-6">
                                <textarea name="aboutMyself" type="text" class="form-control @error('aboutMyself') is-invalid @enderror"  placeholder="Описание альбома">{{old('aboutMyself')}}</textarea>

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
                                   Reg
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
