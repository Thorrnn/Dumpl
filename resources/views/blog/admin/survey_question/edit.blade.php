@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редагування питань @endslot;
            @slot('parent')Головна @endslot;
            @slot('active')Редагування питання @endslot;
        @endcomponent
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <form action="{{ route('blog.admin.survey_questions.update', $item->id) }} " method="post"
                              data-toggle="validator">
                            @method('PUT')
                            @csrf
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="name">Назва</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                           value="@if(old('title')) {{old('title')}} @else {{$item->title ?? ""}} @endif"
                                           required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-primary">Зберегти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

@endsection
