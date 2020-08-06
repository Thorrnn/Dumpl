@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Панель управления @endslot
                @slot('parent') Главная @endslot
                @slot('active') Панель управления @endslot
        @endcomponent
    </section>
0
@endsection
