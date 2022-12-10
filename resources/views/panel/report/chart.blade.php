@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h6 class="hk-sec-title">Single Line Chart</h6>
        <div class="row">
            <div class="col-sm">
                <canvas id="myChart" height="100px"></canvas>
            </div>
        </div>
    </section>
@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">

        var labels =  {{ Js::from($labels) }};
       // var labels =  ['name','age','gender'];
        var users =  {{ Js::from($counts) }};
      //  var users =  [20,35,61];

        const data = {
            labels: labels,
            datasets: [{
                label: 'number of users',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: users,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {

                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
@endsection
