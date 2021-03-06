@extends('layouts.app')


    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class="text-center">Добрий день!</h1>
                <p style="font-size: 22px">Цей сайт є моєю дипломною роботу. Будь-ласка зареєструйтесь та пройдіть тести та опитування.
                Це дуже допоможе мені у написанні роботи.</p>
                <h3 class="text-center">Дуже дякую!</h3>
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
            this.times = [ 0, 0, 0 ];
        }

        start() {
            if (!this.time) this.time = performance.now();
            if (!this.running) {
                this.running = true;
                requestAnimationFrame(this.step.bind(this));
            }
        }

        lap() {
            let times = this.times;
            let li = document.createElement('p');
            li.innerText = this.format(times);
            this.results.appendChild(li);
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
            if (this.times[1] >= 60) {
                this.times[0] += 1;
                this.times[1] -= 60;
            }
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



@endsection
