@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редактирование пользователей@endslot;
            @slot('parent')Главная@endslot;
            @slot('user')Список пользователей@endslot;
            @slot('active')Редактирование пользователей@endslot;
        @endcomponent
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <form action="{{ route('blog.admin.surveys.update', $item->id) }} " method="post" data-toggle="validator">
                                @method('PUT')
                                @csrf
                                <div class="box-body">
                                    <div class="form-group has-feedback">
                                        <label for="name">Info</label>
                                        <input type="text" class="form-control" name="info" id="info" value="@if(old('info')) {{old('info')}} @else {{$item->info ?? ""}} @endif" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    </div>


                                    <div class="form-group has-feedback">
                                        <label for="address">{{__('article.navList.status')}}</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="published" @php if ($item->status == 'published') echo 'selected' @endphp >Опубликован</option>
                                            <option value="unpublished" @php if ($item->status == 'unpublished') echo 'selected' @endphp>Неопубликован</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </section>

@endsection
