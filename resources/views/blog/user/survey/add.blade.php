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

            </div>
        </div>
    </section>
@endsection

