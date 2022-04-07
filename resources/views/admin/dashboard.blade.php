@extends('layouts.admin')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> ড্যাশবোর্ড</h1>
        {{-- <p>A free and open source Bootstrap 4 admin template</p> --}}
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{route('home')}}">ড্যাশবোর্ড</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
          <div class="info">
            <h4>ব্যবহারকারীরা</h4>
            <p><b>@php echo App\Models\User::all()->count(); @endphp</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <h4>মোট সুবিধাভোগী</h4>
            <p><b>@php echo App\Models\ElectionSurvey::all()->count(); @endphp</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-male fa-3x"></i>
          <div class="info">
            <h4>পুরুষ সুবিধাভোগী</h4>
            <p><b>@php echo App\Models\ElectionSurvey::where('gender', 'm')->count(); @endphp</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-female fa-3x"></i>
          <div class="info">
            <h4>মহিলা সুবিধাভোগী</h4>
            <p><b>@php echo App\Models\ElectionSurvey::where('gender', 'f')->count(); @endphp</b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">জেলা ভিত্তিক সুবিধাভোগী</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">পুরুষ, মহিলা সুবিধাভোগী</h3>
          <div class="embed-responsive embed-responsive-16by9">
            <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>
<script type="text/javascript">
  var data = {
    labels: ["January", "February", "March", "April", "May"],
    datasets: [
      {
        label: "My First dataset",
        fillColor: "rgba(220,220,220,0.2)",
        strokeColor: "rgba(220,220,220,1)",
        pointColor: "rgba(220,220,220,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: [65, 59, 80, 81, 56]
      },
      {
        label: "My Second dataset",
        fillColor: "rgba(151,187,205,0.2)",
        strokeColor: "rgba(151,187,205,1)",
        pointColor: "rgba(151,187,205,1)",
        pointStrokeColor: "#fff",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(151,187,205,1)",
        data: [28, 48, 40, 19, 86]
      }
    ]
  };
  var pdata = [
    {
      value: @php echo App\Models\ElectionSurvey::where('gender', 'm')->count(); @endphp,
      color: "#46BFBD",
      highlight: "#5AD3D1",
      label: "পুরুষ সুবিধাভোগী"
    },
    {
      value: @php echo App\Models\ElectionSurvey::where('gender', 'f')->count(); @endphp,
      color:"#F7464A",
      highlight: "#FF5A5E",
      label: "মহিলা সুবিধাভোগী"
    }
  ]
  
  var ctxl = $("#lineChartDemo").get(0).getContext("2d");
  var lineChart = new Chart(ctxl).Line(data);
  
  var ctxp = $("#pieChartDemo").get(0).getContext("2d");
  var pieChart = new Chart(ctxp).Pie(pdata);
</script>
<!-- Google analytics script-->
<script type="text/javascript">
  if(document.location.hostname == 'pratikborsadiya.in') {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-72504830-1', 'auto');
    ga('send', 'pageview');
  }
</script>
@endsection
