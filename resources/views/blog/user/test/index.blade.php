@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    @forelse($paginator as $survey)
                                        @php
                                        $class = '';
                                        @endphp
                                        <tr class="{{$class}}">
                                            <td>{{$survey->info}}</td>
                                            <td>
                                                <a onClick="return window.confirm('Пройти опитування можливо тільки один раз. Почати?');" href="{{}}" title="Пройти опрос">
                                                    <i class="btx btn-xs"></i>
                                                    <button type="submit" class="btn btn-success btn-xs">Пройти</button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center"><h2>Доступних тестів немає</h2></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>

            </div>

        </div>
        </div>
    </section>
    @endsection

