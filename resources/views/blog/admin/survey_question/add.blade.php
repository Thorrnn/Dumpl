@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Додати питання опитування @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Додавання питання опитування @endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{ route('blog.admin.survey_questions.store')}} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">


                            <div class="form-group has-feedback">
                                <label for="title">Назва</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="status">Статус</label>
                                <select name="status" id="request->status" class="form-control">
                                    <option value="published">Опубліковано</option>
                                    <option value="unpublished" selected>Неопубліковано</option>
                                </select>
                            </div>

                            <input type="hidden" name="survey_id" id="survey_id"
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
