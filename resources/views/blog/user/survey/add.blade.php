@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                @forelse($article as $ar)
                    @php
                        $class = '';
                    @endphp
                    <div class="col-12">
                        <h2 class="text-center">{{$ar->title}}</h2>
                        <p class="text-justify">{!!$ar->body!!}</p>
                    </div>
                @empty
                    <tr>
                        <td colspan="3" class="text-center"><h2>Помилка завантаження статті</h2></td>
                    </tr>
                @endforelse

            </div>
        </div>
    </section>
@endsection

