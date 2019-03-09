@extends('dashboard.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('messages.dashboard.stats.live.header') }}: <span id="usersOnlineCount">0</span></h3>
                    </div>
                    <div style="width: 100%">
                        <canvas id="myChart" height="500"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    @parent
    <script src="{{ asset('js/chart.js') }}"></script>
    <script>
        let config = {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: '{{ __('messages.dashboard.stats.live.chart.dataset') }}',
                    fill: false,
                    lineTension: 0,
                    borderColor: '#367fa9',
                    backgroundColor: '#367fa9',
                    data: []
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{ __('messages.dashboard.stats.live.chart.axes.x') }}'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '{{ __('messages.dashboard.stats.live.chart.axes.y') }}'
                        },
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }
        };

        let chart = new Chart(document.getElementById("myChart").getContext('2d'), config);

        $.ajax({
            method: 'GET',
            url: '/api/users/online?initialization',
            dataType: 'json',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
            },
            success: function (response) {
                response.data.forEach(function (item) {
                    config.data.labels.push(item.time);
                    config.data.datasets[0].data.push(item.count);
                });

                chart.update();

                document.querySelector('#usersOnlineCount').textContent = response.data[response.data.length - 1].count;
            }
        });

        setInterval(function () {
            $.ajax({
                method: 'GET',
                url: '/api/users/online',
                dataType: 'json',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer {{ Auth::user()->api_token }}');
                },
                success: function (response) {
                    if (config.data.labels.length >= 13) {
                        config.data.labels.shift();
                        config.data.datasets[0].data.shift();
                    }

                    config.data.labels.push(response.time);
                    config.data.datasets[0].data.push(response.count);

                    chart.update();

                    document.querySelector('#usersOnlineCount').textContent = response.count;
                }
            });
        }, 5000);
    </script>
@endsection