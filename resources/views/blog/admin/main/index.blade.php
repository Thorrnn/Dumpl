@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('blog.admin.components.breadcrumb')
            @slot('title') Панель управления @endslot
                @slot('parent') Главная @endslot
                @slot('active') Панель управления @endslot
        @endcomponent
    </section>

    <section class="content">
        <!-- Small boxes (Start box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!--small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                   <h4>Users{{$countUsers}}</h4>
                   <p>New order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{route('blog.admin.users.index')}}" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
<!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!--small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4>Users{{$countUsers}}</h4>
                    <p>New order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('blog.admin.users.index') }}" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!--small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4>Users {{$countUsers}}</h4>
                    <p>New order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!--small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4>Users{{$countUsers}}</h4>
                    <p>New order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    </section>

@endsection
