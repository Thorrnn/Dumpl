@extends('layouts.app')

@section('content')
    <section class="content">

        <div class="wrapper container">

            <input type="radio" name="point" id="slide1" checked>
            <input type="radio" name="point" id="slide2">
            <input type="radio" name="point" id="slide3">
            <div class="slider row">
                <div class="slides slide1" style="max-width: 60%">
                    <p>Вам необхідно переглянути статтю та дати бальну оцінку від 0 до 10 запропонованим явищам</p>
                    <label class="label-slider" for="slide2">Почати</label>
                </div>
                <div class="slides slide2 align-content-center" style="max-width: 60%">
                    @forelse($article as $ar)
                        @php
                            $class = '';
                        @endphp
                        <div style="justify-content: center">
                            <h2 class="text-center">{{$ar->title}}</h2>
                            <p>{!!$ar->body!!}</p>
                        </div>
                    @empty
                        <div>
                            <h2>Помилка завантаження статті</h2>
                        </div>
                    @endforelse

                    <form action="{{ route('blog.user.surveys.store_surveys', $survey_id) }} " method="get"
                          data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <h3>Дайте бальну оцінку від 0 до 10</h3>
                            @forelse($questions as $key=>$qns)
                                @php
                                    $class = '';
                                @endphp


                                <div class="form-group has-feedback">

                                    <label for="education">{{$qns->title}}</label>
                                    <button type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                                    <input type="number" min="0" max="10" value="1" readonly name="arr[{{$key}}]"
                                           required class="input_number_read_only">
                                    <button type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                                </div>
                                <input type="hidden" id="_token" value="{{ csrf_token() }}">
                            @empty
                                <div>
                                    <h2>Помилка завантаження питань опитування</h2>
                                </div>
                            @endforelse

                            <input type="hidden" name="survey_id" id="survey_id"
                                   value="{{$survey_id}}" required>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="">
                                <button type="submit" class="btn btn-primary">Відправити</button>
                            </div>
                        </div>
                    </form>
                    <!--<label class="label-slider" for="slide3">Далі</label>-->
                </div>
            </div>
        </div>

    </section>
@endsection

