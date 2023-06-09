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

    <!-- Replace with your content -->
    <div class="mb-4 md:mb-12 bg-gray-800 border border-gray-500 rounded-lg shadow space-y-8 px-5 py-6 sm:px-6">

      <nav class="flex" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
          <li>
            <div>
              <a href="/" class="text-gray-400 hover:text-gray-500">
                <!-- Heroicon name: solid/home -->
                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span class="sr-only">Home</span>
              </a>
            </div>
          </li>

          <li class="pointer-events-none">
            <div class="flex items-center">
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
              <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                {{ $scholar->scholar_name }}
              </a>
            </div>
          </li>
        </ol>
      </nav>

      <div class="text-center">
        <h2 class="text-gray-50 text-2xl font-bold uppercase tracking-wide">{{ $scholar->scholar_name }}</h2>
        <p class="text-gray-200 text-xl mb-2">{{ $scholar->ronin_address_formatted }}</p>
        <span class="block whitespace-nowrap py-1 font-medium text-gray-300 uppercase">
          ⚔️ MMR — {{ $scholar->mmr }}
        </span>
        <span class="block whitespace-nowrap py-1 font-medium text-gray-300 uppercase">
          🏆 RANK — {{ $scholar->rank }}
        </span>
      </div>

      <!-- [start] unclaimed summary -->
      <div>
        <h2 class="text-gray-200 text-2xl font-bold uppercase tracking-wide">STATS</h2>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              US
            </div>
            <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  In-Game SLP
                </span>

                <div id="dash-unclaimed-slp">
                  <p class="text-xl font-bold text-green-500">
                    {{ $scholar->in_game_slp }}
                  </p>
                </div>
                <div id="dash-unclaimed-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              MS
            </div>
            <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Manager Share
                </span>

                <div id="dash-unclaimed-slp-m">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-unclaimed-slp-m-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              SS
            </div>
            <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Scholar Share
                </span>

                <div id="dash-unclaimed-slp-s">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-unclaimed-slp-s-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>
      <!-- [end] unclaimed summary -->


      <!-- [start] estimated earnings-->
      <div hidden>
        <h2 class="text-gray-200 text-xl font-bold uppercase tracking-wide">
          ESTIMATED EARNINGS
          <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-pink-100 text-pink-800">
            Soon...
          </span>
        </h2>
        <dl class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <div class="px-4 py-5 bg-gray-700 border border-gray-500 rounded-lg overflow-hidden sm:p-6 animate-pulse dash-boxes">
            <dt class="text-gray-200 text-base font-medium truncate">
              Today so far
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
              <div class="h-5 bg-green-500 rounded w-3/5 mt-2"></div>
              <div class="h-3 bg-gray-300 rounded w-1/2 mt-2"></div>
            </dd>
          </div>

          <div class="px-4 py-5 bg-gray-700 border border-gray-500 rounded-lg overflow-hidden sm:p-6 animate-pulse dash-boxes">
            <dt class="text-gray-200 text-base font-medium truncate">
              Yesterday
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
              <div class="h-5 bg-green-500 rounded w-3/5 mt-2"></div>
              <div class="h-3 bg-gray-300 rounded w-1/2 mt-2"></div>
            </dd>
          </div>

          <div class="px-4 py-5 bg-gray-700 border border-gray-500 rounded-lg overflow-hidden sm:p-6 animate-pulse dash-boxes">
            <dt class="text-gray-200 text-base font-medium truncate">
              Last 7 days
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
              <div class="h-5 bg-green-500 rounded w-3/5 mt-2"></div>
              <div class="h-3 bg-gray-300 rounded w-1/2 mt-2"></div>
            </dd>
          </div>

          <div class="px-4 py-5 bg-gray-700 border border-gray-500 rounded-lg overflow-hidden sm:p-6 animate-pulse dash-boxes">
            <dt class="text-gray-200 text-base font-medium truncate">
              This month
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
              <div class="h-5 bg-green-500 rounded w-3/5 mt-2"></div>
              <div class="h-3 bg-gray-300 rounded w-1/2 mt-2"></div>
            </dd>
          </div>
        </dl>
      </div>
      <!-- [end] estiamted earnings -->

    </div>
    <!-- /End replace -->

  </div>



  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 space-y-5 sm:px-6 lg:px-8">

  <div class="rounded-md bg-yellow-50 p-4">
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
                <!-- Odd row -->

                @foreach($slp_arr as $k => $sdata)
                <tr class="@if($k % 2 == 0) bg-gray-800
                            @else bg-gray-900
                            @endif">
                  <td class="px-6 py-4 font-medium text-gray-100">
                    {{$sdata['slp_earnings']}} SLP
                  </td>
                  <td class="px-6 py-4 text-gray-200">
                    {{$sdata['scholar_slp_share']}} SLP
                  </td>
                  <td class="px-6 py-4 text-gray-200">
                    {{$sdata['manager_slp_share']}} SLP
                  </td>
                  <td class="px-6 py-4 text-center text-gray-200">
                    <!-- 69 and below - text-red-500
                      70 to 75 - text-yellow-500
                      76 to 80 - text-green-300
                      81 to 100+ - text-green-500  -->

                    @if ( (int)$sdata['qhr'] < 70 ) <span class="text-red-300">
                      @elseif ( (int)$sdata['qhr'] >= 70 && (int)$sdata['qhr'] < 76) <span class="text-yellow-500">
                        @elseif ( (int)$sdata['qhr'] >= 76 && (int)$sdata['qhr'] < 81) <span class="text-green-300">
                          @elseif ( (int)$sdata['qhr'] >= 80 )
                          <span class="text-green-500">
                            @endif
                            {{ number_format($sdata['qhr'], 2) }}
                            %
                          </span>
                  </td>
                  <td class="whitespace-nowrap text-right px-6 py-4 text-gray-200">
                    {{$sdata['date']}}
                  </td>
                </tr>
                @endforeach

                <!-- More people... -->
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
<script>
  $(function() {

    $('#trezor-link').click(function(e) {
      window.location.href = "https://shop.trezor.io/product/trezor-one-white?offer_id=14&aff_id=8771";
    });

  });
</script>
@endsection