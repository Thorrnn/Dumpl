@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                @forelse($paginator as $test)
                    @php
                        $class = '';
                    @endphp
                    <div class="{{$test}}, col-12 mb-3 mt-4">
                        <h2 class="text-center">{{$test->title}}</h2>
                        <p>{!! $test->annotation!!}</p>
                        <a class="ml-5" onClick="return window.confirm('Пройти тест можливо лише один раз. Почати?');" href="{{route('blog.user.tests.pass_poll_test', $test->id)}}" title="Пройти тестування">
                            <i class="btx btn-xs"></i>
                            <button type="submit" class="btn btn-success btn-xs" style="font-size: 18px">Пройти тест</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                        </a>
                    </div>
                @empty
                    <div>
                        <h2 class="text-center" >Доступних тестів немає</h2>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
