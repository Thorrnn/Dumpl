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
                        <form action="{{ route('blog.user.surveys.store_surveys', $survey_id) }} " method="get" data-toggle="validator">
                            @csrf
                            <div class="box-body">

                                @forelse($questions as $key=>$qns)
                                    @php
                                        $class = '';
                                    @endphp


                                    <div class="form-group has-feedback">
                                        <label for="education">{{$qns->title}}</label>

                                        <input list="fieldsArticles"
                                               class="form-control"
                                               name="arr[{{$key}}]"  required
                                              >
                                        <datalist id="fieldsArticles">
                                            <option value="0">0
                                            <option value="1">1
                                            <option value="2">2
                                            <option value="3">3
                                            <option value="4">4
                                            <option value="5">5
                                            <option value="6">6
                                            <option value="7">7
                                            <option value="8">8
                                            <option value="9">9
                                            <option value="10">10
                                        </datalist>
                                    </div>
                                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                    <div class="form-group has-feedback">
                                        <label for="name">survey_id</label>
                                        <input type="text" class="form-control" name="survey_id" id="survey_id" value="{{$survey_id}}" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                @empty
                                    <div>
                                        <h2>Помилка завантаження питань опитування</h2>
                                    </div>
                            @endforelse
                                    <div class="box-footer">
                                        <input type="hidden" name="id" value="">
                                        <button type="submit" class="btn btn-primary">Відправити</button>
                                    </div>
                        </form>


                        <label for="slide1"></label>
                    </div>
                </div>

            </div>


        </div>



    </section>
@endsection

