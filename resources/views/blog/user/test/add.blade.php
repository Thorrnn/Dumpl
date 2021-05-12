@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container">
            <div class="wrapper row">

                <input type="radio" name="point" id="slide1" checked>
                <input type="radio" name="point" id="slide2">
                <input type="radio" name="point" id="slide3">
                <div class="slider col-12">
                    <div class="slides slide1" style="max-width: 60%">
                        <div class="mt-2">
                            <p class="text-left" style="font-size: 16px; color: black">Необхідно ознайомитися з
                                інформацією статті та відповісти на питання за змістом.</p>
                            <p class="text-left" style="font-size: 16px; color: black">Якщо ви перезавантажите сторінку
                                то вийдете з опитування і не сможете його продовжити.</p>
                            <label class="label-slider" onClick="stopwatch.start();" for="slide2">Почати</label>
                        </div>
                    </div>
                    <div class="slides slide2 mt-3" style="max-width: 88%">
                        <div class="hidden">
                            <p class="stopwatch hidden "style="color: white"></p>
                            <ul class="results hidden" style="color: whitesmoke"></ul>
                        </div>
                        <div  style="justify-content: center">
                            @forelse($article as $ar)
                                @php
                                    $class = '';
                                @endphp
                                <h2 class="text-center mb-2">{{$ar->title}}</h2>
                                <p class="text-justify mt-2">{!!$ar->body!!}</p>
                            @empty
                                <div>
                                    <h2>Помилка завантаження статті</h2>
                                </div>
                            @endforelse

                            <label class="label-slider" onClick="stopwatch.lap();" for="slide3">Відповісти на питання</label>
                        </div>

                    </div>
                    <div class="slides slide3" style="max-width:65%">
                        <form action="{{ route('blog.user.surveys.store_tests', $test_id) }} " method="get"
                              data-toggle="validator">
                            @csrf
                            <div class="box-body">
                                <input class="form-check-input" type="hidden" id="time"
                                       name="time" value="time">
                                @forelse($quertAnswer as $key=>$qns)
                                    @php
                                        $class = '';
                                    @endphp
                                    <div class="form-group has-feedback">
                                        <label class="h4">{{$questions[$key]->title}}</label>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" checked id="contactChoice{{$key}}0"
                                                       name="arr[{{$key}}]" value="{{$qns[0]}}">
                                                <label for="contactChoice{{$key}}0"
                                                       class="form-check-label">{{$qns[0]}}</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}1"
                                                       name="arr[{{$key}}]" value="{{$qns[1]}}">
                                                <label for="contactChoice{{$key}}1"
                                                       class="form-check-label">{{$qns[1]}}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}2"
                                                       name="arr[{{$key}}]" value="{{$qns[2]}}">
                                                <label for="contactChoice{{$key}}2"
                                                       class="form-check-label">{{$qns[2]}}</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="contactChoice{{$key}}3"
                                                       name="arr[{{$key}}]" value="{{$qns[3]}}">
                                                <label for="contactChoice{{$key}}3"
                                                       class="form-check-label">{{$qns[3]}}</label>
                                            </div>

                                        </div>

                                    </div>


                                    <input type="hidden" id="_token" value="{{ csrf_token() }}">
                                @empty
                                    <div>
                                        <h2>Помилка завантаження питань тесту</h2>
                                    </div>
                                @endforelse


                                <input type="hidden" name="test_id" id="test_id"
                                       value="{{$test_id}}" required>
                                <input type="hidden" name="test_answer_id" id="test_answer_id"
                                       value="{{$test_answer_id}}" required>
                                <div class="box-footer">
                                    <input type="hidden" name="id" value="">

                                    <button type="submit" class="btn btn-primary">Відправити</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>

        <script>
            class Stopwatch {
                constructor(display, results) {
                    this.running = false;
                    this.display = display;
                    this.results = results;
                    this.laps = [];
                    this.reset();
                    this.print(this.times);
                }

                reset() {
                    this.times = [0, 0, 0];
                }

                start() {
                    if (!this.time) this.time = performance.now();
                    if (!this.running) {
                        this.running = true;
                        requestAnimationFrame(this.step.bind(this));
                    }
                }

                lap() {
                    /*let times = this.times;
                    let li = document.createElement('p');
                    li.innerText = this.format(times);*/
                    document.getElementById('time').value = this.times[1];
                 /*   this.results.appendChild(li);*/

                }

                stop() {
                    this.running = false;
                    this.time = null;
                }

                restart() {
                    if (!this.time) this.time = performance.now();
                    if (!this.running) {
                        this.running = true;
                        requestAnimationFrame(this.step.bind(this));
                    }
                    this.reset();
                }

                clear() {
                    clearChildren(this.results);
                }

                step(timestamp) {
                    if (!this.running) return;
                    this.calculate(timestamp);
                    this.time = timestamp;
                    this.print();
                    requestAnimationFrame(this.step.bind(this));
                }

                calculate(timestamp) {
                    var diff = timestamp - this.time;
                    // Hundredths of a second are 100 ms
                    this.times[2] += diff / 10;
                    // Seconds are 100 hundredths of a second
                    if (this.times[2] >= 100) {
                        this.times[1] += 1;
                        this.times[2] -= 100;
                    }
                    // Minutes are 60 seconds
                  /*  if (this.times[1] >= 60) {
                        this.times[0] += 1;
                        this.times[1] -= 60;
                    }*/
                }

                print() {
                    this.display.innerText = this.format(this.times);
                }

                format(times) {
                    return `\
${pad0(times[0], 2)}:\
${pad0(times[1], 2)}:\
${pad0(Math.floor(times[2]), 2)}`;
                }
            }

            function pad0(value, count) {
                var result = value.toString();
                for (; result.length < count; --count)
                    result = '0' + result;
                return result;
            }

            function clearChildren(node) {
                while (node.lastChild)
                    node.removeChild(node.lastChild);
            }

            let stopwatch = new Stopwatch(
                document.querySelector('.stopwatch'),
                document.querySelector('.results'));
        </script>
    </section>
@endsection

