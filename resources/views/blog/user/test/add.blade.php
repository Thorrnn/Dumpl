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
                        <label class="label-slider" for="slide2">Почати</label>
                    </div>
                    <div class="slides slide2 align-content-center">
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

                        <label class="label-slider" for="slide3">Далі</label>
                    </div>
                    <div class="slides slide3">
                        <form action="{{ route('blog.user.surveys.store_tests', $test_id) }} " method="get"
                              data-toggle="validator">
                            @csrf
                            <div class="box-body">

                                @forelse($quertAnswer as $key=>$qns)
                                    @php
                                        $class = '';
                                    @endphp
                                    <div class="form-group has-feedback">
                                        <label for="education">{{$questions[$key]->title}}</label>
                                        <div>
                                            <input type="radio" id="contactChoice1"
                                                   name="arr[{{$key}}]" value="{{$qns[0]}}">
                                            <label>{{$qns[0]}}</label>

                                            <input type="radio" id="contactChoice2"
                                                   name="arr[{{$key}}]" value="{{$qns[1]}}">
                                            <label>{{$qns[1]}}</label>

                                            <input type="radio" id="contactChoice3"
                                                   name="arr[{{$key}}]" value="{{$qns[2]}}">
                                            <label>{{$qns[2]}}</label>

                                            <input type="radio" id="contactChoice4"
                                                   name="arr[{{$key}}]" value="{{$qns[3]}}">
                                            <label>{{$qns[3]}}</label>
                                        </div>

                                    </div>


                                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                @empty
                                    <div>
                                        <h2>Помилка завантаження питань тесту</h2>
                                    </div>
                                @endforelse


                                <input type="hidden" name="test_id" id="test_id"
                                       value="{{$test_id}}" required>
                                    <input type="hidden" name="test_answer_id" id="test_answer_id"
                                           value="{{$test_answer_id}}" required>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="">

                                    <button type="submit" class="btn btn-primary">Відправити</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>


    </section>
@endsection

