@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <p>{{$survey->info}}</p>
                    <input type="text" class="form-control" name="title" id="title" value="@if(old('title')) {{old('title')}} @else {{$item->title ?? ""}} @endif" required>
                </div>
            </div>
        </div>
    </section>
@endsection

