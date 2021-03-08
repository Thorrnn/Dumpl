@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Добавление вопроса опроса@endslot;
            @slot('parent')Главная@endslot;
            @slot('active')Добавление вопроса опрос@endslot;
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <form action="{{ route('blog.admin.survey_questions.store', ['id'=>1] )}} " method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
            @php $survey_id = $id @endphp

                            <div class="form-group has-feedback">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="survey_id" id="survey_id" value="@if(old('survey_id')) {{old('survey_id')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="status">Status</label>
                                <select name="status" id="request->status" class="form-control">
                                    <option value="published">published</option>
                                    <option value="unpublished" selected>unpublished</option>
                                </select>
                            </div>

                            <input type="hidden" id="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Сохранить</button>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

@endsection
