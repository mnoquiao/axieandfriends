@extends('layouts.appv2')
@section('title', $page_title)

@section('page_styles')
@endsection



@section('main_content')
<main class="flex-1 bg-gray-100 dark:bg-gray-900">
    <div class="py-6">

      <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">
          <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
      </div>

      <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">

          <div class="bg-white shadow rounded-lg overflow-hidden items-center mt-5 dark:bg-gray-800">
              <div class="flex p-4">
                  <span class="text-base font-semibold dark:text-white">SLP EARNED</span>
              </div>

              <div class="flex p-4">
                <div class="w-full text-center">
                    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                    <div class="px-4 py-5 rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">TODAY</dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">71,897</dd>
                    </div>
                
                    <div class="px-4 py-5 rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">LAST 7D</dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">100,500</dd>
                    </div>
                
                    <div class="px-4 py-5 rounded-lg overflow-hidden sm:p-6">
                        <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">LAST 30D</dt>
                        <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">300,655</dd>
                    </div>
                    </dl>
                </div>
              </div>

              <div>
                  <div id="wrapper">
                      <div id="chart-area">
                  
                      </div>
                      <div id="chart-bar">
                      
                      </div>
                  </div>
              </div>


          </div>


          {{-- stats --}}
          <div class="bg-white shadow rounded-lg overflow-hidden items-center mt-5 dark:bg-gray-800">
              <div class="flex items-center justify-center py-4">
                  <span class="text-2xl font-semibold dark:text-white">Stats</span>
              </div>
              <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3 border-t border-gray-200 dark:border-gray-600">
                  <div class="text-center p-6 border-r border-gray-200 dark:border-gray-600">
                      <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">TOTAL RONIN ADDR.</dt>
                      <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">71,897</dd>
                  </div>
                  <div class="text-center p-6 border-r border-gray-200 dark:border-gray-600">
                      <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">TOTAL AXIE</dt>
                      <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">71,897</dd>
                  </div>
                  <div class="text-center p-6">
                      <dt class="text-sm font-medium text-gray-500 truncate dark:text-gray-300">SLP IN-GAME</dt>
                      <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">71,897</dd>
                  </div>
              </dl>    
          </div>


          {{-- ranking --}}
          <div class="mt-5">
            <div class="mx-auto">

              <div class="pb-2">
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">Ranking</h1>
              </div>

              <div class="flex flex-col mt-2">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="whitespace-nowrap text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider dark:text-white dark:bg-gray-700">NAME</th>
                        <th class="px-6 py-3 bg-gray-50 text-left whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider dark:text-white dark:bg-gray-700">RONIN ADDR</th>
                        <th class="px-6 py-3 bg-gray-50 text-right whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider dark:text-white dark:bg-gray-700">MMR/ELO</th>
                        <th class="px-6 py-3 bg-gray-50 text-right whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider dark:text-white dark:bg-gray-700">SLP IN-GAME</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    
                        @for($x = 1; $x < 10; $x++)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 w-1/3 whitespace-nowrap text-sm">
                                <div class="flex">
                                    <a href="#" class="group inline-flex space-x-2 text-sm">
                                        <p class="text-gray-500 truncate group-hover:text-gray-900 dark:text-white dark:group-hover:text-gray-400">
                                            43432984y324873264783264783264738264327846237846237832648723647832647832647823 AAF 00{{ $x }}
                                        </p>
                                    </a>
                                </div>
                                </td>

                                <td class="px-6 py-4 text-left w-1/3 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                    ronin:53495c9ab4d0057b78f858a92945cf3d4eca5400
                                </td>

                                <td class="hidden px-6 py-4 text-right w-2/12 whitespace-nowrap text-sm text-gray-500 md:block dark:text-white">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 capitalize">
                                        {{ rand(1000,10000) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 text-right w-2/12 whitespace-nowrap text-sm text-gray-500 dark:text-white">
                                <time datetime="2020-07-11">{{ rand(1000,10000) }}</time>
                                </td>
                            </tr>
                        @endfor

                      <!-- More transactions... -->
                    </tbody>
                  </table>
                  
                  <!-- Pagination -->
                  <nav class="bg-white px-4 py-3 flex items-center justify-between dark:bg-gray-800" aria-label="Pagination">
                    <div class="hidden sm:block">
                      <p class="text-sm text-gray-700 dark:text-white">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">10</span>
                        of
                        <span class="font-medium">20</span>
                        results
                      </p>
                    </div>
                    <div class="flex-1 flex justify-between sm:justify-end">
                      <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-800 dark:hover:border-white"> Previous </a>
                      <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-800 dark:hover:border-white"> Next </a>
                    </div>
                  </nav>

                </div>
              </div>

            </div>
          </div>

      </div>

    </div>
</main>
@endsection



@section('page_scripts')
<script>
var data = generateDayWiseTimeSeries(new Date("22 Apr 2017").getTime(), 115, {
  min: 30,
  max: 90
});
var options1 = {
  chart: {
    id: "chart2",
    type: "area",
    height: 230,
    foreColor: "#ccc",
    toolbar: {
      autoSelected: "pan",
      show: false
    }
  },
  colors: ["#d203fc"],
  stroke: {
    width: 3
  },
  grid: {
    borderColor: "#555",
    clipMarkers: false,
    yaxis: {
      lines: {
        show: false
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  fill: {
    gradient: {
      enabled: true,
      opacityFrom: 0.55,
      opacityTo: 0
    }
  },
  markers: {
    size: 5,
    colors: ["#d203fc"],
    strokeColor: "#22135c",
    strokeWidth: 3
  },
  series: [
    {
      data: data
    }
  ],
  tooltip: {
    theme: "dark"
  },
  xaxis: {
    type: "datetime"
  },
  yaxis: {
    min: 0,
    tickAmount: 4
  }
};

var chart1 = new ApexCharts(document.querySelector("#chart-area"), options1);

chart1.render();

var options2 = {
  chart: {
    id: "chart1",
    height: 130,
    type: "bar",
    foreColor: "#ccc",
    brush: {
      target: "chart2",
      enabled: true
    },
    selection: {
      enabled: true,
      fill: {
        color: "#fff",
        opacity: 0.4
      },
      xaxis: {
        min: new Date("27 Jul 2017 10:00:00").getTime(),
        max: new Date("14 Aug 2017 10:00:00").getTime()
      }
    }
  },
  colors: ["#d203fc"], // chartbar color
  series: [
    {
      data: data
    }
  ],
  stroke: {
    width: 2
  },
  grid: {
    borderColor: "#444"
  },
  markers: {
    size: 0
  },
  xaxis: {
    type: "datetime",
    tooltip: {
      enabled: false
    }
  },
  yaxis: {
    tickAmount: 2
  }
};

var chart2 = new ApexCharts(document.querySelector("#chart-bar"), options2);

chart2.render();

function generateDayWiseTimeSeries(baseval, count, yrange) {
  var i = 0;
  var series = [];
  while (i < count) {
    var x = baseval;
    var y =
      Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

    series.push([x, y]);
    baseval += 86400000;
    i++;
  }
  return series;
}





  function copyDonateAddr(input_field) {
    /* Get the text field */
    var copyText = document.getElementById(input_field);

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    console.log("Copied the text: " + copyText.value);

    /* change button text */
    document.getElementById("btn-" + input_field).innerHTML = '✓ Copied';

    setTimeout(() => {

      /* change button text */
      document.getElementById("btn-" + input_field).innerHTML = '📋 Copy';

    }, 3000);
  }
</script>
@endsection