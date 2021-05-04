@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Редагування тестів @endslot;
            @slot('parent') Головна @endslot;
            @slot('active') Редагування тесту @endslot;
        @endcomponent
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <form action="{{ route('blog.admin.tests.update', $item->id) }} " method="post" data-toggle="validator">
                                @method('PUT')
                                @csrf
                                <div class="box-body">
                                    <div class="form-group has-feedback">
                                        <label for="title">Назва</label>
                                        <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else {{$item->title ?? ""}} @endif" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label for="annotation">Опис</label>
                                        <input type="text" class="form-control" name="annotation" id="annotation" value="@if(old('annotation')) {{old('annotation')}} @else {{$item->annotation ?? ""}} @endif" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>


                                    <div class="form-group has-feedback">
                                        <label for="status">Статус</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="published" @php if ($item->status == 'published') echo 'selected' @endphp >Опублікован</option>
                                            <option value="unpublished" @php if ($item->status == 'unpublished') echo 'selected' @endphp>Неопублікован</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-primary">Зберегти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <a href="{{route('add_question', $item->id)}}" title="Додати питання">
                                <i class="btx btn-xs"></i>
                                <button type="submit" class="btn btn-success btn-xs">Додати питання</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                        </div>
                        <h3>Список питань</h3>
                        <div class="box">
                            <div class="box-body">
                                @if($count)
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Назва</th>
                                                <th>Дія</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($questions as $question)
                                                <tr>
                                                    <td>{{$question->id}}</td>
                                                    <td>{{$question->title}}</td>
                                                    <td><a href="{{route('blog.admin.test_questions.edit', $question->id)}}"><i class="fa fa-fw fa-eye"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-danger">Питань немає</p>
                                @endif
                            </div>

                        </div>
                    </div>

                </div>

            </section>

@endsection
