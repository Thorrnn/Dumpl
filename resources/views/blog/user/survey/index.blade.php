@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                    @forelse($paginator as $survey)
                        @php
                            $class = '';
                        @endphp
                    <div class="{{$class}}, col-12 mb-3">
                        <h2 class="text-center">{{$survey->title}}</h2>
                        <p>{{$survey->annotation}}</p>
                        <a class="align-content-end" href="{{route('blog.user.surveys.pass_poll', $survey->id)}}" title="Пройти опитування">
                            <i class="btx btn-xs"></i>
                            <button type="submit" class="btn btn-success btn-xs">Пройти опитування</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>

                    @empty
                        <div>
                            <h2>Доступных опросов нет</h2>
                        </div>
                        @endforelse
                </div>


            </div>

    </section>
@endsection

