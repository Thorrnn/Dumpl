@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
                <div class="wrapper row">

                    <input type="radio" name="point" id="slide1" checked>
                    <input type="radio" name="point" id="slide2">
                    <input type="radio" name="point" id="slide3">
                    <div class="slider col-12">
                        <div class="slides slide1">
                            <p>test test</p>

                            <label for="slide2"></label>

                        </div>
                        <div class="slides slide2">
                            @forelse($article as $ar)
                                @php
                                    $class = '';
                                @endphp
                                <div>
                                    <h2 class="text-center">{{$ar->title}}</h2>
                                    <p class="text-justify">{!!$ar->body!!}</p>
                                </div>
                            @empty
                                <div>
                                    <h2>Помилка завантаження статті</h2>
                                </div>
                            @endforelse

                                <label for="slide3"></label>
                        </div>
                        <div class="slides slide3">
                            @forelse($questions as $qns)
                                @php
                                    $class = '';
                                @endphp
                                <div class="form-group row">
                                    <label for="age"
                                           class="col-md-4 col-form-label text-md-right">{{$qns->title}}</label>

                                    <div class="col-md-6">
                                        <input id="age" type="text"
                                               class="form-control @error('age') is-invalid @enderror"
                                               name="age" value="{{ old('age') }}" required autocomplete="age"
                                               autofocus>

                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @empty
                                <div>
                                    <h2>Помилка завантаження питань опитування</h2>
                                </div>
                            @endforelse

                                <label for="slide1"></label>
                        </div>
                    </div>

                </div>



        </div>




        </div>
    </section>
@endsection

