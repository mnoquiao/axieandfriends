@extends('layouts.app')
@section('title', $page_title)

@section('page_styles')
<style>
  /* in-page style */
  .rotate {
    height: 128px;
    width: 128px;
    animation: rotation .7s infinite linear;
  }

  .rotate-sm {
    height: 24px;
    width: 24px;
    animation: rotation 1.2s infinite linear;
  }

  @keyframes rotation {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(359deg);
    }
  }

  #time-width {
    -webkit-transition: width 0.5s;
            transition: width 0.5s;
  }
</style>
@endsection



@section('content')

  @if(null == session('manager_uniqid'))
    <div class="py-10">
      <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
        <h1 class="text-3xl font-bold text-white">Axie Infinity Managers & Scholars SLP Tracker (axieandfriends.com)</h1>
        <p class="text-indigo-50">Axie Infinitiy Manager's loved our scholar tracker and Smooth Love Potion (SLP) monitoring tool.</p>
        <h2 class="text-white hidden md:block text-2xl font-bold pt-4">✨ Features</h2>
        <ul class="text-indigo-50 hidden md:block space-y-3">
          <li><strong>No Sign-up Required.</strong> You can use our Scholar Tracker without having to sign-up an account we do want to keep your privacy and security.</li>
          <li><strong>Monitor Daily SLP.</strong> We give you the power to monitor your Axie Infinity scholar's daily SLP grind use this tracker tool to encourage them and help them reach their target.</li>
          <li><strong>Retainable Data.</strong> Our solution is for you to regain, sync and maintain across any devices your scholars data for you to easily manage and track their performance.</li>
          <li><strong>Earnings Summary.</strong> View your unclaimed SLP and claimed SLP and it's local currency value gives you the ability to forecast your ROI.</li>
          <li>
            <span class="border text-gray-400 border-gray-400 rounded-sm py-0.5 px-1 text-xs font-medium mr-1">Affiliate</span>
            <strong id="trezor-link" class="text-gray-200 hover:text-blue-500 cursor-pointer">
              <div class="inline-block">🔒</div> Trezor Wallet.
            </strong> Protect your Axie Infinity assets with the best Hardware Wallet.
          </li>
        </ul>
      </div>
    </div>
  @else
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
  @endif

  @include('pages.adsense')
  
</div> <!-- [end] header -->


<main x-data="{ 
        modal_add: false, 
        modal_edit: false, 
        modal_sort_filter: false,
        modal_customize_slp_price: false,
        
        sliderover_scholar_axie: false,
        sliderover_mgmt_settings: false,

        shareable_link: '{{ $uniq_link }}',
        collapsed_table: localStorage.getItem('minimal_view') === 'true'
    }" 
    x-init="$watch('collapsed_table', val => localStorage.setItem('minimal_view', val))"
    x-bind:class="{ 'minimal_view': collapsed_table }"
    class="-mt-32">

  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Summary dashboard -->
    <div class="mb-2 bg-gray-800 border border-gray-500 rounded-lg shadow space-y-8 px-5 py-6 sm:px-6">

      @if (null !== $uniq_link)
      <div x-data="{
            show_personal_link: false,
            hide_personal_link: true
          }" class="w-full">
        <label for="uniqlink" class="flex items-center text-sm font-bold text-gray-300 md:text-sm space-x-1">
        
          <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500 tooltips" data-tippy-content="Use this link to open your dashboard and scholars information on other devices, ⚠️ please note that you cannot share this to anyone you do not trust." xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>

          <span>YOUR SHAREABLE LINK</span>

          <span x-show="show_personal_link" @click="show_personal_link = false, hide_personal_link = true" class="inline-flex select-none justify-end ml-2 cursor-pointer align-middle  bg-gray-50 rounded-full px-2.5 py-1 font-bold text-sm text-gray-900 hover:bg-gray-400" title="Hide my personal link.">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            Hide
          </span>

          <span x-show="hide_personal_link" @click="show_personal_link = true, hide_personal_link = false" class="inline-flex select-none justify-end ml-2 cursor-pointer align-middle  bg-gray-50 rounded-full px-2.5 py-1 font-bold text-sm text-gray-900 hover:bg-gray-400" title="Show my personal link.">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center mr-1" self-center fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
            Show
          </span>

        </label>

        <div x-show="show_personal_link" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
          <div class="mt-3 relative flex items-center">
            <input type="text" name="uniqlink" id="uniqlink" class="block w-full h-12 shadow-sm text-sm lg:text-xl pr-16 sm:text-sm rounded-md text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="https://axieandfriends.com/m/{{ $uniq_link }}" readonly>
            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
              <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400 cursor-pointer" id="btn-uniqlink" onclick="copyUniqLink('uniqlink');">
                Copy
              </kbd>
            </div>
          </div>
          <p class="mt-1 text-xs md:text-sm text-gray-300">⛔ Never share your link to anyone you do not trust.</p>
        </div>

      </div>
      <script>
        function copyUniqLink(input_field) {
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
          document.getElementById("btn-" + input_field).innerHTML = 'Copied';

          setTimeout(() => {

            /* change button text */
            document.getElementById("btn-" + input_field).innerHTML = 'Copy';

          }, 3000);
        }
      </script>
      @else
      <div id="empty-unique-link-wrapper"></div>
      @endif

      <!-- [start] unclaimed summary -->
      <div>
        <h2 class="text-gray-200 text-xl font-bold uppercase tracking-wide">YOUR STATS</h2>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4">
                                            
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              🎮
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  In-Game SLP <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">
                </span>

                <div id="dash-unclaimed-slp">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-unclaimed-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" height="36" width="36" alt="Ronin Wallet Logo" class="inline-block">
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Ronin Wallet SLP <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">
                </span>

                <div id="dash-ronin-slp">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-ronin-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              📈
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Total Avg. SLP <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">
                </span>

                <div id="dash-avg-slp">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-avg-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              👪
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Total Scholar
                </span>

                <div id="dash-scholars">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>
      <!-- [end] unclaimed summary -->



      <!-- [start] profit summary -->
      <div>
        <h2 class="text-gray-200 text-xl font-bold uppercase tracking-wide">
          PROFITS SHARING
        </h2>

        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4">
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              👨‍💼
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Manager Share <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">
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
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">
              🎓
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Scholars Share <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">
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

          <li class="col-span-1 flex shadow-sm rounded-md" id="your-stats-ul">

          </li>

        </ul>
      </div>
      <!-- [end] profit summary -->



      <!-- [start] estimated earnings-->
      <div>
        <h2 class="text-gray-200 text-xl font-bold uppercase tracking-wide">
          PROFITS SUMMARY
        </h2>

        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4">
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="animate-pulse flex-1 flex items-center justify-between border border-gray-500 bg-gray-700 rounded-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Today so far
                </span>

                <div id="dash-estimated-today-slp">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-estimated-today-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="animate-pulse flex-1 flex items-center justify-between border border-gray-500 bg-gray-700 rounded-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  Yesterday
                </span>

                <div id="dash-estimated-yesterday-slp">
                  <div class="h-5 bg-green-500 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-estimated-yesterday-slp-curr">
                  <div class="h-3 bg-gray-300 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- [end] estiamted earnings -->


    </div>
    <!-- /End Summary dashboard -->

    <!-- data explanation -->
    <div class="flex text-xs text-gray-400 mb-6 md:mb-10 text-justify md:text-left">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <p class="ml-1.5">
        The daily information we display on this Dashboard are based on Axie Infinity's Server time:
        {{ Carbon\Carbon::now()->toDateTimeString() }}.
      </p>
    </div>
    
    @if ( $total_scholars >= 22 && $total_scholars < 300 )
    
    <div class="hidden md:flex md:items-center md:justify-center gap-1.5 mb-1.5 text-center bg-gray-700 bg-opacity-60 px-2 py-2 rounded-lg text-gray-100">
      <small class="text-xs border text-gray-400 border-gray-400 rounded-sm py-0.5 px-1.5 font-medium text-center">
        Offer
      </small>
      <strong class="text-red-300 mr-2">
        Are you looking 🕵️ for Scholar 🧑‍🎓👨‍🎓?
      </strong> 
      <small> Try our Agency talk this guy ➜</small>
      <a href="https://t.me/mnoquiao" target="_blank" class="hover:text-yellow-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
        </svg>
        t.me/mnoquiao
      </a>
    </div>

    @elseif ( $total_scholars >= 300 )
    
    <div class="hidden md:flex md:items-center md:justify-center gap-1.5 mb-1.5 text-sm text-center bg-gray-700 bg-opacity-60 px-2 py-2 rounded-lg text-gray-100">
      <strong class="text-yellow-300">
        Do you find axieandfriends.com useful?
      </strong> 
      We spent almost $1.5K / month running this site
      <a href="/donate" target="_blank" class="hover:text-yellow-300">
        🎁 DONATE
      </a>
    </div>

    @endif


    <div class="relative overflow-hidden border-b border-l border-r border-gray-500 rounded-lg">

      <!-- main function buttons -->
      <div class="bg-gray-800 border border-gray-500 rounded-lg shadow space-y-8 px-6 py-4">
        
        <div class="flex flex-col-reverse md:flex-row md:justify-end relative">
          
          @if(null !== session('manager_uniqid'))
          <!-- this will search box is for mobile view only -->
          <div class="relative flex md:items-stretch md:flex-grow md:hidden mt-4">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <!-- Heroicon name: solid/search -->
              <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <input type="text" name="filter-scholar-mobile" id="filter-scholar-mobile" class="block w-full rounded-md pl-11 py-2 text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Scholar name" onkeyup="filterSchoMobile()">
          </div>   

          <div class="flex space-x-2">

            <!-- to show remove hidden add ineline-flex -->
            <button id="refresh-all" type="button" class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-300 hover:text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
              <span class="sr-only">Table View</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg>
              <span class="hidden xl:block">SYNC</span>
              <span class="sr-only">Sync Scholar Data</span>
            </button>

            <span class="relative z-0 inline-flex shadow-sm rounded-md">
              <!-- table view select button -->
              <button type="button" @click="show_table_list = true, show_grid_list = false, localStorage.setItem('default_view', 'table');" :class="show_table_list ? 'bg-gray-300' : 'bg-gray-900'" class="tooltips relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300  text-sm font-medium text-gray-500 hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800" data-tippy-content="Toggle table view">
                <span class="sr-only">Table View</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <span class="sr-only">Select Table View</span>
              </button>

              <!-- grid view select button -->
              <button type="button" @click="show_grid_list = true, show_table_list = false, localStorage.setItem('default_view', 'grid')" :class="show_grid_list ? 'bg-gray-300' : 'bg-gray-900'" class="tooltips relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 text-sm font-medium text-gray-500 hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800" data-tippy-content="Toggle grid view">
                <span class="sr-only">Grid View</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
                <span class="sr-only">Select Grid View</span>
              </button>
            </span>

            <div class="hidden relative md:flex md:flex-grow">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <input type="text" name="filter-scholar" id="filter-scholar" class="block w-full rounded-md pl-11 py-2 text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Scholar name" onkeyup="filterSchoDesktop()">
            </div>

            <span class="relative z-0 inline-flex shadow-sm rounded-md">
              <button @click="modal_sort_filter = true" type="button" id="btn-sort-and-filter" class="tooltips inline-flex px-4 py-2 text-base font-medium rounded-l-md border border-gray-300 text-gray-500 bg-gray-900 hover:bg-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800" data-tippy-content="Open Sort & Filter">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
                <span class="sr-only">Sort & Filter</span>
              </button>
              
              <button disabled @click="sliderover_mgmt_settings = true" type="button" id="btn-sort-and-filter" class="tooltips inline-flex px-4 py-2 text-base font-medium rounded-r-md border border-gray-300 text-gray-500 bg-gray-900 hover:bg-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800" data-tippy-content="Open Settings">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="sr-only">Settings</span>
              </button>
            </span>

          </div>
          @endif

          <div 
              x-data="{
                add_scholar_menu: false
              }" 
              class="flex w-full mb-4 md:mb-0 md:w-auto md:inline-flex md:ml-3">

            <button @click="modal_add = true" type="button" id="btn-add-scholar" class="md:inline-flex w-full px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-blue-600">
              <span class="hidden xl:block">Add new</span> 
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block xl:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              &nbsp;Scholar
              <span class="sr-only">Add new Scholar</span>
            </button>

            <span class="relative shadow-sm rounded-md hidden"><!--  inline-flex  -->
              <button @click="modal_add = true" type=" button" class="md:inline-flex w-full items-center px-4 py-3 border border-transparent text-base font-medium rounded-l-md shadow-sm text-white bg-blue-600 hover:bg-blue-500">
                Add new scholar
              </button>
              <span class="-ml-px relative block">
                <button @click.away="add_scholar_menu = false" @click="add_scholar_menu = !add_scholar_menu" type="button" class="md:inline-flex w-full items-center px-4 py-4 border border-transparent text-base font-medium rounded-r-md shadow-sm text-white bg-blue-600 hover:bg-blue-500" id="option-menu-button" aria-expanded="true" aria-haspopup="true">
                  <span class="sr-only">Open options</span>
                  <!-- Heroicon name: solid/chevron-down -->
                  <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>

                <div x-show="add_scholar_menu" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute z-10 right-0 mt-2 -mr-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="option-menu-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="option-menu-item-0">
                      Import Scholar
                    </a>

                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white" role="menuitem" tabindex="-1" id="option-menu-item-2">
                      Export Scholar
                    </a>
                  </div>
                </div>
              </span>
            </span>

          </div>

        </div>
      
      </div>
      <!-- END main function buttons -->

      @if(null !== session('manager_uniqid'))
      <!-- View function buttons | refresh, grid/table view -->
      <div> <!-- class="relative mt-10 mx-auto max-w-3xl mb-4" -->
        
        <!-- refresh data indicator/loader/loading -->
        <div class="absolute bottom-0 left-0 flex w-full overflow-hidden h-1 text-xs bg-gray-400 z-10">
          <div id="time-width" style="width:0%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-800"></div>
        </div>
      
      </div>
      @endif

    </div>


    <!-- View function buttons | refresh, grid/table view -->
    <div class="grid justify-items-stretch mt-2">

      <span class="relative inline-flex shadow-sm rounded-md justify-self-end">

        @if (
        session('selected_timezone_id') == null
        && session('sess_slp_current_market_price_manipulate') == null
        && session('sess_slp_custom_price') == null
        )

        <!-- <button @click="modal_customize_slp_price = true" type="button" class="relative inline-flex items-center px-2 py-2 mr-2 rounded-md border border-gray-300 bg-gray-900 text-sm font-medium text-gray-300 hover:bg-gray-300 hover:text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
          <span class="sr-only">Table View</span>
          SET
          <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="SLP" class="inline-block mx-1.5" width="16" height="16">
          PRICE
        </button>

        <span id="custom-slp-price-display" class="hidden"></span>  -->
        <!-- this will avoid js error is non custom slp price is set -->

        @else

        <!-- <a @click.prevent="modal_customize_slp_price = true" href="javascript:void(0)" class="relative inline-flex items-center px-2 py-2 mr-2 rounded-md bg-green-100 bg-opacity-90 hover:bg-opacity-100 text-sm text-green-800 hover:text-green-900 hover:underline">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          You set <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="SLP" class="inline-block mx-2" width="16" height="16"> price to
          <span class="ml-1" id="custom-slp-price-display">
            ...
          </span>
        </a> -->

        @endif

      </span>
    </div>



  <!-- <div class="rounded-md bg-blue-100 p-4 mt-2">
    <div class="flex">
      <div class="flex-shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="ml-3">
        <h3 class="text-lg font-medium text-gray-800">
          A newly discovered bug(🐞) is fixed and newly added ronin addr. are needed to be wiped.
        </h3>
        <div class="mt-2 text-sm text-gray-700">
          Earlier we need to fix a bug(🐞) and some of the newest ronin addr. that has been added from <strong>9/17/2021 3:00pm - 5:10pm (UTC)</strong> are deleted. We are sorry, kindly add it again.
        </div>
      </div>
    </div>
  </div> -->




    <!--  -->
    <!--  -->
    <!-- MOBILE -->
    <!--  -->
    <!--  -->
    <div x-show="show_grid_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-2 max-w-screen-sm md:hidden transition-opacity relative" id="scholars-list-wrapper-mobile">


      <div class="flex flex-shrink-0 justify-center mt-5">
        <img class="rotate" src="https://res.cloudinary.com/mnoquiao/image/upload/h_124,w_124/v1627154657/axieandfriends.com/puff-loading.png" alt="Loading Image from axieinfinity.com">
      </div>

      <!-- <ul class="divide-y divide-gray-200 relative" id="scholars-list-mobile">
      </ul> -->

    </div>





    <!--  -->
    <!--  -->
    <!-- DESKTOP -->
    <!--  -->
    <!--  -->
    <!-- TABLE VIEW -->
    <div x-show="show_table_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-2 flex flex-col rounded-md relative overflow-hidden" id="scholars-list-wrapper-table">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden border border-gray-700 sm:rounded">

            <table class="min-w-full divide-y divide-gray-600">

              <thead class="bg-gray-700">

                <tr class="font-mono">
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-50 uppercase tracking-wider">
                    
                    <div class="flex items-center">
                      <button 
                        @click="collapsed_table = !collapsed_table, localStorage.setItem('minimal_view', collapsed_table)"
                        type="button" :class="collapsed_table ? 'bg-green-300' : ''" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
                        <span aria-hidden="true" :class="collapsed_table ? 'translate-x-5' : ''" class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-gray-50 shadow transform ring-0 transition ease-in-out duration-200"></span>
                      </button>
                      <span 
                        @click="collapsed_table = !collapsed_table, localStorage.setItem('minimal_view', collapsed_table)"
                        class="ml-3 cursor-pointer opacity-80 hover:opacity-100" id="annual-billing-label">
                        <span class="text-sm font-medium capitalize select-none text-gray-50">Minimal View </span>
                      </span>
                    </div>
                  </th>
                  <th colspan="1" scope="col" class="px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider"></th>
                  <th colspan="5" scope="col" class="px-4 py-2 text-center font-bold text-gray-50 bg-gray-600 uppercase tracking-wider">
                    <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-8 h-8 items-center inline-block mr-2" alt="SLP"> Smooth Love Potion (SLP)
                  </th>
                  <th colspan="1" scope="col" class="px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider"></th>
                </tr>

                <tr class="font-mono uppercase">
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-50 tracking-wider">
                    Scholar
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider hidden">
                    Last Claimed
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 tracking-wider">
                    <div x-show="!collapsed_table">
                      Profits
                    </div>
                    <div x-show="collapsed_table" class="text-center">
                      ⚔️ MMR
                    </div>
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider">
                    Today
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider">
                    Yesterday
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider">
                    Average
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider">
                    In-Game
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 bg-gray-600 tracking-wider">
                    <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" height="24" width="24" alt="Ronin Wallet" class="inline-block" title="Ronin Wallet Balance">
                    Wallet
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 tracking-wider">
                    Next Claim
                  </th>
                  <!-- <th scope="col" class="whitespace-nowrap w-24 px-4 py-2 text-right font-bold text-gray-50 tracking-wider">

                  </th> -->
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-700" id="scholars-list-table">
                <tr>
                  <td colspan="8">
                    <div class="flex justify-center p-10">
                      <img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt="Loader image">
                    </div>
                  </td>
                </tr>
              </tbody>

            </table>

          </div>
        </div>
      </div>
    </div>

    <!-- GRID VIEW -->
    <div x-show="show_grid_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-2 hidden md:block transition-opacity" id="scholars-list-wrapper">

      <div class="flex justify-center p-10">
        <img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt="Loader image">
      </div>

    </div>


    @if(null !== session('manager_uniqid'))
    <!-- NOTICE -->
    <div class="rounded-md bg-yellow-100 px-5 py-2 mt-4">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
          </svg>
        </div>
        <div class="ml-3">
          <h3 class="text-base font-medium text-gray-800">
            Do you find axieandfriends.com useful?
          </h3>
          <div class="mt-2 text-sm text-gray-700">
              Your donation helps us to keep axieandfriends.com free of charge. All donations will be used for development and server expenses. Thank you for your support! 💕😘
          </div>
          <div class="mt-2">
              <a href="/donate" class="relative inline-flex items-center px-2 py-1 rounded-md border border-red-400 bg-red-500 text-base font-medium text-gray-100 hover:bg-red-600  focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                <span class="sr-only">Table View</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                &nbsp;Donate
              </a>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>



  @if(null !== session('manager_uniqid'))
  <div class="py-5 -mt-14">
    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
      <h2 class="text-white text-2xl font-bold pt-4">✨ Features</h2>
      <ul class="text-indigo-50 space-y-3">
        <li><strong>No Sign-up Required.</strong> You can use our Scholar Tracker without having to sign-up an account we do want to keep your privacy and security.</li>
        <li><strong>Monitor Daily SLP.</strong> We give you the power to monitor your Axie Infinity scholar's daily SLP grind use this tracker tool to encourage them and help them reach their target.</li>
        <li><strong>Retainable Data.</strong> Our solution is for you to regain, sync and maintain across any devices your scholars data for you to easily manage and track their performance.</li>
        <li><strong>Earnings Summary.</strong> View your unclaimed SLP and claimed SLP and it's local currency value gives you the ability to forecast your ROI.</li>
        <li>
          <span class="border text-gray-400 border-gray-400 rounded-sm py-0.5 px-1 text-xs font-medium mr-1">Affiliate</span>
          <strong id="trezor-link" class="text-gray-200 hover:text-blue-500 cursor-pointer">
            <div class="inline-block">🔒</div> Trezor Wallet.
          </strong> Protect your Axie Infinity assets with the best Hardware Wallet.
        </li>
      </ul>


      <div class="flex text-sm text-gray-400 mt-2 md:mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 self-center flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <p class="ml-1.5">
          🎯 QHR or the Quota Hit Ratio of the scholar is computed by <em class="text-green-300">AVG_SLP_DAILY percent of SET_SLP_QUOTA_DAILY = ?</em>.
        </p>
      </div>

    </div>
  </div>
  @endif














@include('pages.index-modal')
@include('pages.index-slideovers')



</main>
@endsection



@section('page_scripts')
<script>
  $(function() {

    // init tooltip
    tippy('.tooltips', {
      placement: 'top',
    });

    $('#trezor-link').click(function(e) {
      window.location.href = "https://shop.trezor.io/product/trezor-one-white?offer_id=14&aff_id=8771";
    });

    setTimeout(() => {

      // remove default hidden attributes of the following modals
      $('.axie-hidden-by-default').removeAttr('hidden');

    }, 1000);



    // fetch scholars (if exist)
    fetch_scholars();



    // adding scho form submitted
    $('#add-scholar-form').on('submit', function(e) {

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-add-scholar-form');

      /* this form data */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "{{ route('add_scholar') }}",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          // hidde error message wrapper
          if ($('#scholar-form-err-msg-container').is(':visible')) {
            $('#scholar-form-err-msg-container').attr("hidden", "hidden");
          }

          // make the submit button in loading state
          $(submit_btn).attr('disabled', 'disabled');
          $(submit_btn).addClass('cursor-wait');
          $(submit_btn).empty();
          $(submit_btn).html('Please wait...');

          if (xhr != null) {
            xhr.abort();
          }

        },
        success: function(data) {

          if (data.errors) {

            $errors = data.errors;
            $err_msg = '';

            for (const key in $errors) {
              $err_msg += '<li>⚠️ ' + $errors[key] + '</li>';
            }

            // display error message
            $('#scholar-form-err-msg-container').removeAttr("hidden");
            $('#scholar-form-err-msg').html($err_msg);

          } else {

            // reset form
            document.querySelector("#add-scholar-form").reset();

            // fetch scholars (fresh data)
            fetch_scholars();

            // trigger clicking open modal button to close the modal
            $('#btn-add-scholar').trigger('click');

            // show success message
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Scholar Added.',
              showConfirmButton: false,
              timer: 1800
            })

          }

          // return submit button to normal state
          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        },
        error: function(data) {

          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        }
      });

    });



    // trigger form submit
    $('input[name="sortBy"]').on('change', function(e) {

      $('#sort-scholar-form').trigger('submit');

    });



    // on sort and filter form reset
    $('#btn-reset-sort-and-filter').on('click', function(e) {

      e.preventDefault();

      // reset form
      document.querySelector("#sort-scholar-form").reset();

      // trigger submit
      $("#sort-scholar-form").trigger('submit');

    });



    // sort and filter submitted  
    $('#sort-scholar-form').on('submit', function(e) {

      $('#scholars-list-wrapper-mobile, #scholars-list-wrapper').html('<div class="flex flex-shrink-0 justify-center mt-5"><img class="rotate" src="https://res.cloudinary.com/mnoquiao/image/upload/h_124,w_124/v1627154657/axieandfriends.com/puff-loading.png" alt="Loading Image from axieinfinity.com"></div>');
      $('#scholars-list-table').html('<tr><td colspan="8"><div class="flex justify-center p-10"><img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt="Loader image"></div></td></tr>');

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-sort-scholar-form');

      /* this form data */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "{{ route('sort_and_filter') }}",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          // hidde error message wrapper
          if ($('#scholar-form-err-msg-container').is(':visible')) {
            $('#scholar-form-err-msg-container').attr("hidden", "hidden");
          }

          // make the submit button in loading state
          $(submit_btn).attr('disabled', 'disabled');
          $(submit_btn).addClass('cursor-wait');
          $(submit_btn).empty();
          $(submit_btn).html('Please wait...');

          if (xhr != null) {
            xhr.abort();
          }

        },
        success: function(data) {

          if (data.errors) {



          } else {

            // fetch scholars (fresh data)
            fetch_scholars();

          }

          // return submit button to normal state
          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        },
        error: function(data) {

          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        }
      });

    });



    // slp custom price submitted
    $('#customize-slp-price-form').on('submit', function(e) {

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-customize-slp-price-form');

      /* this form data */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "{{ route('set_custom_slp_price') }}",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          // hidde error message wrapper
          if ($('#scholar-form-err-msg-container').is(':visible')) {
            $('#scholar-form-err-msg-container').attr("hidden", "hidden");
          }

          // make the submit button in loading state
          $(submit_btn).attr('disabled', 'disabled');
          $(submit_btn).addClass('cursor-wait');
          $(submit_btn).empty();
          $(submit_btn).html('Please wait...');

          if (xhr != null) {
            xhr.abort();
          }

        },
        success: function(data) {

          if (data.errors) {



          } else {

            // fetch scholars (fresh data)
            fetch_scholars();

          }

          // return submit button to normal state
          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        },
        error: function(data) {

          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).html('Save');

        }
      });

    });



    // on refresh all
    $('#refresh-all').on('click', function(e) {

      // clear present interval
      clearInterval(insideTimer);

      // prevent default button default action
      e.preventDefault();

      // get submit button
      let submit_btn = $(this);

      // initiate new form
      var formData = new FormData();

      // papulate form data
      formData.append("_token", "{{ csrf_token() }}");

      xhr = $.ajax({
        url: "{{ route('refresh_scholar_data') }}",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          $(submit_btn).attr('disabled', 'disabled');
          $(submit_btn).toggleClass('cursor-wait');
          $(submit_btn).toggleClass('animate-pulse');
          $(submit_btn).find('svg').toggleClass('rotate-sm');

          if (xhr != null) {
            xhr.abort();
          }

        },
        success: function(data) {

          if (data.success == false) {

            console.log('failed');

          }

          // fetch scholars (if exist)
          fetch_scholars();

          // add 1 sec delay to re-enable this button
          setTimeout(() => {
            // return refresh button to normal state
            $(submit_btn).removeAttr('disabled');
            $(submit_btn).toggleClass('cursor-wait');
            $(submit_btn).toggleClass('animate-pulse');
            $(submit_btn).find('svg').toggleClass('rotate-sm');
          }, 1000);


        },
        error: function(data) {

          // return refresh button to normal state
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).toggleClass('cursor-wait');
          $(submit_btn).toggleClass('animate-pulse');
          $(submit_btn).find('svg').toggleClass('rotate-sm');

        }
      });


    });

  });



  var timer;
  var insideTimer

  function startRefreshTimer(duration) {

    timer = duration;
    let minutes, seconds;
    let total_seconds, remaining_seconds, remaining_seconds_deci, perc_remaining;

    // clear present interval
    clearInterval(insideTimer);

    insideTimer = setInterval(function() {
      minutes = parseInt(timer / 60, 10)
      seconds = parseInt(timer % 60, 10);

      // get remaining seconds
      remaining_seconds      = (minutes * 60) + seconds;

      // divide remaining seconds to actual duration
      remaining_seconds_deci = remaining_seconds / duration;

      // get the absolute value as percentage value
      perc_remaining         = Math.abs((remaining_seconds_deci * 100) - 100);
                            // console.log(remaining_seconds);

      // select the element where width's dynamically changging.
      display                = document.querySelector('#time-width');

      // change width relative to the ellapsed seconds
      display.style.width    = (Math.round(perc_remaining) + 1) +'%'; 
                            
      if (--timer < 0) {

        timer = duration;

      } else if (timer == 0) {

        $('#refresh-all').trigger('click');

      }

    }, 1000);

  }

  // window.onload = function() {
  //     // run timer with 90 secs countdown
  //     startRefreshTimer(90);
  // };

</script>
@endsection