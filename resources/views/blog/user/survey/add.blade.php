@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                @forelse($article as $ar)
                    @php
                        $class = '';
                    @endphp
                    <div class="col-12">
                        <h2 class="text-center">{{$ar->title}}</h2>
                        <p class="text-justify">{!!$ar->body!!}</p>
                    </div>
                @empty
                    <div class="col-12">
                        <h2>Помилка завантаження статті</h2>
                    </div>
                @endforelse
                <div class="col-12">
                    @forelse($questions as $qns)
                        @php
                            $class = '';
                        @endphp
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{$qns->title}}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror"
                                       name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <h2>Помилка завантаження питань опитування</h2>
                        </div>
                    @endforelse


                </div>


                <div class="wrapper">
                    <input type="radio" name="point" id="slide1" checked>
                    <input type="radio" name="point" id="slide2">
                    <input type="radio" name="point" id="slide3">
                    <div class="slider">
                        <div class="slides slide1"></div>
                        <div class="slides slide2"></div>
                        <div class="slides slide3"></div>
                    </div>
                    <div class="controls">
                        <label for="slide1"></label>
                        <label for="slide2"></label>
                        <label for="slide3"></label>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

