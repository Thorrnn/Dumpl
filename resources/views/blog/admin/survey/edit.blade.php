@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title')Редактирование пользователей@endslot;
            @slot('parent')Главная@endslot;
            @slot('user')Список пользователей@endslot;
            @slot('active')Редактирование пользователей@endslot;
        @endcomponent


@endsection
