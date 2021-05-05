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
                        <div class="mt-2">
                            <p class="text-left" style="font-size: 18px; color: black">Необхідно ознайомитися з інформацією статті та відповісти на питання.</p>
                            <p class="text-left" style="font-size: 18px; color: black">Якщо ви перезавантажите сторінку то вийдете з опитування і не сможете його продовжити.</p>
                            <label class="label-slider" for="slide2">Почати</label>
                        </div>
                    </div>
                    <div class="slides slide2 align-content-center mt-3">
                        @forelse($article as $ar)
                            @php
                                $class = '';
                            @endphp
                                <h2 class="text-center mb-2">{{$ar->title}}</h2>
                                <p class="text-justify mt-2">{!!$ar->body!!}</p>
                        @empty
                            <div>
                                <h2>Помилка завантаження статті</h2>
                            </div>
                        @endforelse

                        <label class="label-slider" for="slide3">Відповісти на питання</label>
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
                                        <label class="h4">{{$questions[$key]->title}}</label>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}0"
                                                       name="arr[{{$key}}]" value="{{$qns[0]}}">
                                                <label for="contactChoice{{$key}}0"
                                                       class="form-check-label">{{$qns[0]}}</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}1"
                                                       name="arr[{{$key}}]" value="{{$qns[1]}}">
                                                <label for="contactChoice{{$key}}1"
                                                       class="form-check-label">{{$qns[1]}}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}2"
                                                       name="arr[{{$key}}]" value="{{$qns[2]}}">
                                                <label for="contactChoice{{$key}}2"
                                                       class="form-check-label">{{$qns[2]}}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}3"
                                                       name="arr[{{$key}}]" value="{{$qns[3]}}">
                                                <label for="contactChoice{{$key}}3"
                                                       class="form-check-label">{{$qns[3]}}</label>
                                            </div>
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

