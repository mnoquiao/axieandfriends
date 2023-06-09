@extends('layouts.app')
@section('title', $page_title)

@section('page_meta')
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
@endsection

@section('page_styles')
<style>
  .modal {
    transition: opacity 0.25s ease;
  }

  body.modal-active {
    overflow-x: hidden;
    overflow-y: visible !important;
  }

  #chartdiv {
    width: 100%;
    height: 100%;
  }
</style>
@endsection



@section('content')

<div class="py-2">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
    <ul class="text-indigo-50 hidden md:block space-y-3">
      <li>
        <span class="border text-gray-400 border-gray-400 rounded-sm py-0.5 px-1 text-xs font-medium mr-1">Affiliate</span>
        <strong id="trezor-link" class="text-gray-200 hover:text-blue-500 cursor-pointer">
          <div class="inline-block">🔒</div> Trezor Wallet.
        </strong> Protect your Axie Infinity assets with the best Hardware Wallet.
      </li>
    </ul>
  </div>
</div>

@include('pages.adsense')

</div> <!-- [end] header -->

<main class="-mt-32">

  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- main scholar dashboard -->
    <div class="relative mb-4 md:mb-12 text-gray-100 bg-gray-800 border border-gray-500 rounded-lg shadow space-y-4 px-5 py-6 sm:px-6">
      
      <!-- scholar info -->
      <div class="flex">
        <div class="py-5">
          <h3 class="text-3xl leading-6 font-extrabold text-green-500">
            Maxie 00
          </h3>
          <p class="mt-1.5 text-xl text-gray-400">
            {{ $ronin_addr_short }}
          </p>
        </div>
      </div>

      <!-- slp and graph -->
      <div class="flex gap-5">

        <!-- slp, mmr and ranks -->
        <div class="bg-gray-800 border border-gray-500 rounded-lg shadow px-5 py-6 sm:px-6 w-2/5">
            <div class="flex">
              <div class="text-center flex-auto truncate">
                <h3>In-Game SLP</h3>
                <div class="text-8xl font-bold text-green-500 py-2">1000323<span class="text-green-900 text-7xl">SLP</span></div>
              </div>
            </div>

            <div class="flex justify-between mt-5">
              <div class="text-center flex-auto">
                <h3>Today SLP</h3>
                <span class="text-4xl font-bold text-green-500">1250<span class="text-green-900 text-3xl">SLP</span></span>
              </div>
              <div class="text-center flex-auto">
                <h3>Yesterday SLP</h3>
                <span class="text-4xl font-bold text-green-500">53433411<span class="text-green-900 text-3xl">SLP</span></span>
              </div>
            </div>
        </div>

        <!-- graphs -->
        <div class="flex px-2 w-3/5 border border-gray-500 rounded-lg shadow">
          <div class="flex w-full">
            <div class="flex-auto">
              <div id="chartdiv"></div>
            </div>
          </div>
        </div>
      </div> 

      <!-- axies and rankings -->
      <div class="flex gap-5">

        <div class="flex-auto py-6 sm:px-6 bg-gray-800 border border-gray-500 rounded-lg shadow w-3/4">
            <h3 class="text-center">Axies</h3>

            <div class="flex gap-3">
              
              <div class="flex-auto border border-gray-500 hover:border-gray-900 rounded-lg shadow">
                <div class="flex-1 flex flex-col p-4">
                  <dd class="mb-3">
                    <span class="px-2 py-1 text-gray-50 text-sm font-bold bg-yellow-400 bg-opacity-95 rounded-md">
                      #123456790
                    </span>
                    <div class="text-sm text-white py-1">
                      <svg width="20" height="20" viewBox="0 0 16 16" style="fill: #ffb812;" class="inline-flex">
                        <path d="M7.933 4.886a1.91 1.91 0 100-3.82 1.91 1.91 0 000 3.82M12.713 2.635a1.91 1.91 0 100 3.82 1.91 1.91 0 000-3.82M5.064 4.544a1.91 1.91 0 10-3.82 0 1.91 1.91 0 003.82 0M7.916 6.11a4.487 4.487 0 100 8.972 4.487 4.487 0 000-8.973"></path>
                      </svg>
                      Axie #123456790
                    </div>
                    <div class="text-sm text-gray-400 pb-1">🍆: 0, H: 55, S: 42, M: 35, P: 99%</div>
                  </dd>
                  <img class="w-auto h-36 flex-shrink-0 mx-auto object-cover rounded-full" src="https://storage.googleapis.com/assets.axieinfinity.com/axies/1677585/axie/axie-full-transparent.png" alt="">
                  <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-gray-500 text-sm">Find Similar</dd>
                    <dt class="sr-only">Role</dt>
                  </dl>
                </div>
              </div>

              <div class="flex-auto border border-gray-500 hover:border-gray-900 rounded-lg shadow">
                <div class="flex-1 flex flex-col p-4">
                  <dd class="mb-3">
                    <span class="px-2 py-1 text-gray-50 text-sm font-bold bg-yellow-400 bg-opacity-95 rounded-md">
                      #123456790
                    </span>
                    <div class="text-sm text-white py-1">
                      <svg width="20" height="20" viewBox="0 0 16 16" style="fill: #ffb812;" class="inline-flex">
                        <path d="M7.933 4.886a1.91 1.91 0 100-3.82 1.91 1.91 0 000 3.82M12.713 2.635a1.91 1.91 0 100 3.82 1.91 1.91 0 000-3.82M5.064 4.544a1.91 1.91 0 10-3.82 0 1.91 1.91 0 003.82 0M7.916 6.11a4.487 4.487 0 100 8.972 4.487 4.487 0 000-8.973"></path>
                      </svg>
                      Axie #123456790
                    </div>
                    <div class="text-sm text-gray-400 pb-1">🍆: 0, H: 55, S: 42, M: 35, P: 99%</div>
                  </dd>
                  <img class="w-auto h-36 flex-shrink-0 mx-auto object-cover rounded-full" src="https://storage.googleapis.com/assets.axieinfinity.com/axies/1677585/axie/axie-full-transparent.png" alt="">
                  <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-gray-500 text-sm">Find Similar</dd>
                    <dt class="sr-only">Role</dt>
                  </dl>
                </div>
              </div>

              <div class="flex-auto border border-gray-500 hover:border-gray-900 rounded-lg shadow">
                <div class="flex-1 flex flex-col p-4">
                  <dd class="mb-3">
                    <span class="px-2 py-1 text-gray-50 text-sm font-bold bg-yellow-400 bg-opacity-95 rounded-md">
                      #123456790
                    </span>
                    <div class="text-sm text-white py-1">
                      <svg width="20" height="20" viewBox="0 0 16 16" style="fill: #ffb812;" class="inline-flex">
                        <path d="M7.933 4.886a1.91 1.91 0 100-3.82 1.91 1.91 0 000 3.82M12.713 2.635a1.91 1.91 0 100 3.82 1.91 1.91 0 000-3.82M5.064 4.544a1.91 1.91 0 10-3.82 0 1.91 1.91 0 003.82 0M7.916 6.11a4.487 4.487 0 100 8.972 4.487 4.487 0 000-8.973"></path>
                      </svg>
                      Axie #123456790
                    </div>
                    <div class="text-sm text-gray-400 pb-1">🍆: 0, H: 55, S: 42, M: 35, P: 99%</div>
                  </dd>
                  <img class="w-auto h-36 flex-shrink-0 mx-auto object-cover rounded-full" src="https://storage.googleapis.com/assets.axieinfinity.com/axies/1677585/axie/axie-full-transparent.png" alt="">
                  <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-gray-500 text-sm">Find Similar</dd>
                    <dt class="sr-only">Role</dt>
                  </dl>
                </div>
              </div>

            </div>
        </div>

        <div class="flex-auto w-1/4">            
            <div class="flex flex-col gap-3 h-100">
              <div class="flex-1 text-center py-6 sm:px-6 bg-gray-800 border border-gray-500 rounded-lg shadow">
                <h3>⚔️ MMR</h3>
                <span class="text-4xl font-bold">1250</span>
              </div>
              <div class="flex-1 text-center py-6 sm:px-6 bg-gray-800 border border-gray-500 rounded-lg shadow">
                <h3>🏆 Rank</h3>
                <span class="text-4xl font-bold">53433411</span>
              </div>
              <div class="flex-1 text-center py-6 sm:px-6 bg-gray-800 border border-gray-500 rounded-lg shadow">
                <h3>🏆 Rank</h3>
                <span class="text-4xl font-bold">53433411</span>
              </div>
            </div>
        </div>

      </div>


    </div>
    <!-- /End main scholar dashboard -->

  </div>



  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 space-y-5 sm:px-6 lg:px-8">

    <div class="rounded-md bg-yellow-50 p-4 hidden">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div class="ml-3">
          <h3 class="text-lg font-medium text-red-800">
            We are in the process of improving this page (please do not rely on this page for now) 🙏.
          </h3>
          <div class="mt-2 text-sm text-red-700">
            <ul role="list" class="list-disc pl-5 space-y-1">
              <li>
                This page will be revamp soon accurate display of data, additional information to evaluate your scholars will also be implemented (daily graph, axies, battle logs).
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="shadow overflow-hidden border border-gray-500 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-600">
              <thead class="bg-gray-700">
                <tr>
                  <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                    Earnings
                  </th>
                  <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                    Scholar Earnings
                  </th>
                  <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                    Manager Earnings
                  </th>
                  <th scope="col" class="whitespace-nowrap px-6 py-3 text-center font-medium text-gray-50 uppercase tracking-wider">
                    🎯 Quota Hit Ratio
                  </th>
                  <th scope="col" class="whitespace-nowrap px-6 py-3 text-right font-medium text-gray-50 uppercase tracking-wider">
                    Date
                  </th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection



@section('page_scripts')
<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/dark.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_dark);
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = generateChartData();

// Create axes
var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
dateAxis.renderer.minGridDistance = 50;

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.valueY = "visits";
series.dataFields.dateX = "date";
series.strokeWidth = 2;
series.minBulletDistance = 10;
series.tooltipText = "{valueY}";
series.tooltip.pointerOrientation = "vertical";
series.tooltip.background.cornerRadius = 20;
series.tooltip.background.fillOpacity = 0.5;
series.tooltip.label.padding(12,12,12,12)

// Add scrollbar
chart.scrollbarX = new am4charts.XYChartScrollbar();
chart.scrollbarX.series.push(series);

// Add cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.xAxis = dateAxis;
chart.cursor.snapToSeries = series;

function generateChartData() {
    var chartData = [];
    var firstDate = new Date();
    firstDate.setDate(firstDate.getDate() - 1000);
    var visits = 1200;
    for (var i = 0; i < 500; i++) {
        // we create date objects here. In your data, you can have date strings
        // and then set format of your dates using chart.dataDateFormat property,
        // however when possible, use date objects, as this will speed up chart rendering.
        var newDate = new Date(firstDate);
        newDate.setDate(newDate.getDate() + i);
        
        visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

        chartData.push({
            date: newDate,
            visits: visits
        });
    }
    return chartData;
}

}); // end am4core.ready()
</script>

<script>
  $(function() {

    $('#trezor-link').click(function(e) {
      window.location.href = "https://shop.trezor.io/product/trezor-one-white?offer_id=14&aff_id=8771";
    });

  });
</script>
@endsection