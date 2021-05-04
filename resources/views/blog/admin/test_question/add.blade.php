@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Додати питання тесту @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Додавання питання тесту @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <form action="{{ route('blog.admin.test_questions.store')}} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="option_correct">Правильна відповідь</label>
                                <input type="text" class="form-control" name="option_correct" id="option_correct" value="@if(old('option_correct')) {{old('option_correct')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="option_a">Неправильна відповідь</label>
                                <input type="text" class="form-control" name="option_a" id="option_a" value="@if(old('option_a	')) {{old('option_a	')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="option_b">Неправильна відповідь</label>
                                <input type="text" class="form-control" name="option_b" id="option_b" value="@if(old('option_b')) {{old('option_b')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="option_c">Неправильна відповідь</label>
                                <input type="text" class="form-control" name="option_c" id="option_c" value="@if(old('option_c')) {{old('option_c')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>


                            <input type="hidden" name="test_id" id="test_id"
                                   value="{{$id}}" required>

                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Зберегти</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection
