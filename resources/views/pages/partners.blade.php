@extends('layouts.app')
@section('title', $page_title)

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

<header class="pt-28 pb-10 bg-white text-black">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
    <div class="text-center w-full max-w-full">
      <h1 class="text-5xl font-bold">💸 Site Revenue partnership.</h1>
      <div class="mt-7 text-lg mx-auto max-w-3xl space-y-3 font-normal text-gray-500">
        <p>axieandfriends.com are looking for willing individual to buy a share of our site's revenue and earn a dividend of this fast growing website.</p>
        <p>We are selling 60% of our site's current and potential revenue to interested individual, anyone can buy a minimum of 2% or maximum of 20% share per person!</p>
        <p>This is just the beginning of our multiple future projects (online public tools) for existing and upcoming NFT games!</p>
      </div>

      <a href="https://t.me/mnoquiao" target="_blank" class="mt-12 inline-flex items-center px-20 py-4  border border-transparent text-xl font-medium rounded-md text-gray-800 bg-indigo-100 hover:bg-indigo-200 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
        Become a Partner Now!
      </a>

      <span class="text-gray-400 block mt-3">
        Let's talk via Telegram ⇢ <a href="https://t.me/mnoquiao" target="_blank" class="text-gray-400 hover:text-gray-500 hover:underline">t.me/mnoquiao</a>
      </span>

      <div class="relative mt-10 mx-auto max-w-4xl mb-4">
        <div class="flex mb-2 items-center justify-between">
          <div>
            <span class="text-xs font-semibold inline-block py-1 px-2 rounded-full text-green-600 bg-green-200">
              Shares Already Sold
            </span>
          </div>
          <div class="text-right">
            <span class="text-xs font-semibold inline-block text-green-600">
              82%
            </span>
          </div>
        </div>
        <div class="overflow-hidden h-2 text-xs flex rounded bg-green-200">
          <div style="width:82%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
        </div>
        <span class="text-gray-600 mt-4">
          We are selling <strong class="text-green-600">2% a Share for 0.33 Ether</strong> <small class="text-gray-400">(unsold share 18%)</small>.
        </span>

        <div class="flex flex-col mt-6 text-left">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Owner/Partner
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ownership
                      </th>
                      <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Since
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Profile</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- Odd row -->
                    <tr class="bg-white">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Mark Anthony Noquiao
                        <span class="text-gray-500 block">
                          mnoquiao@gmail.com
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        40%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        July 15, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="https://www.linkedin.com/in/mnoquiao/" class="text-indigo-600 hover:text-indigo-900 block">LinkedIn Profile</a>
                        <a href="https://www.facebook.com/PCVMNOQUIAO" class="text-indigo-600 hover:text-indigo-900 block">Facebook Profile</a>
                      </td>
                    </tr>

                    <!-- Even row -->
                    <tr class="bg-gray-50">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Richard Chan
                        <span class="text-gray-500 block">
                          richardchan0804@gmail.com
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        10%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        September 12, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="https://www.facebook.com/richardchan0804" class="text-indigo-600 hover:text-indigo-900">Facebook Profile</a>
                      </td>
                    </tr>

                    <!-- Odd row -->
                    <tr class="bg-white">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          Anonymous
                        <span class="text-gray-500 block">
                          Silent Partner (client from Mining Rig PH)
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        16%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        September 14, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <span class="text-gray-500 block">
                          N/A
                        </span>
                      </td>
                    </tr>
                    
                    <!-- Even row -->
                    <tr class="bg-gray-50">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          George Ian & Friends
                        <span class="text-gray-500 block">
                          George Adrian DM Shih & Partners
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        6%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        September 22, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="https://www.facebook.com/shihgeorge11" class="text-indigo-600 hover:text-indigo-900">Facebook Profile</a>
                      </td>
                    </tr>

                    <!-- Odd row -->
                    <tr class="bg-white">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          Christian Rhine Rodriguez
                        <span class="text-gray-500 block">
                          christianrhinerodriguez@gmail.com
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        10%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        October 25, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <span class="text-gray-500 block">
                          <a href="https://www.facebook.com/rhnrdrgz" class="text-indigo-600 hover:text-indigo-900">Facebook Profile</a>
                        </span>
                      </td>
                    </tr>

                    <!-- Even row -->
                    <tr class="bg-gray-50">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          Ian Co
                        <span class="text-gray-500 block">
                          
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        5%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        October 26, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="https://www.facebook.com/IanXuS" class="text-indigo-600 hover:text-indigo-900">Facebook Profile</a>
                      </td>
                    </tr>

                    <!-- Odd row -->
                    <tr class="bg-white">
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                          Jed Mark Serilla
                        <span class="text-gray-500 block">
                          
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        4%
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                        November 20, 2021
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <span class="text-gray-500 block">
                          <a href="https://www.facebook.com/rhnrdrgz" class="text-indigo-600 hover:text-indigo-900">Facebook Profile</a>
                        </span>
                      </td>
                    </tr

                    <!-- More people... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>

</div> <!-- [end] header -->

<div class="bg-gray-100">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Why becdome a partner? -->
    <div class="mb-12 pt-20 px-5 py-6 sm:px-6 text-center">
      <h1 class="text-3xl font-bold text-gray-700">Why become a partner?</h1>
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mt-20">
        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-green-300">
            <span class="text-xl font-medium leading-none text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            You can earn 2%-20%<br>
            profit share of all our sites revenue.
          </p>
          <span class="text-gray-400 text-lg">Ads Revenue, Donations, and Affiliates.</span>
        </div>

        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-yellow-300">
            <span class="text-xl font-medium leading-none text-yellow-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            Quarterly payouts<br>
            via wire/bank transfer or Crypto.
          </p>
          <span class="text-gray-400 text-lg">Wire or Bank Transfer, or Bitcoin, Ethereum.</span>
        </div>
        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-yellow-300">
            <span class="text-xl font-medium leading-none text-yellow-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            You can ask us anything,<br>
            We care about our partnership.
          </p>
          <span class="text-gray-400 text-lg">Ask for daily, weekly or monthly reports of the revenue.</span>
        </div>
      </div>
    </div>
    <!-- /End  Why becdome a partner? -->

  </div>
</div>

<div class="bg-white">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Revenue sources? -->
    <div class="mb-10 pt-20 px-5 py-6 sm:px-6 text-center">
      <h1 class="text-3xl font-bold text-gray-700">Source of Revenue.</h1>
      <div class="mt-7 text-lg mx-auto max-w-3xl space-y-3 font-normal text-gray-500">
        <p>Just like most of the free websites online the majority of income are coming from <strong>Display Ads</strong>, <strong>Affiliates</strong> and <strong>Sponsorship</strong>.</p>
      </div>

      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mt-20">
        <div>
          <span class="inline-flex items-center justify-center h-auto w-auto">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1634741094/axieandfriends.com/coinzilla-logo.svg" height="40" width="243" alt="Coinzilla ad network logo" srcset="">
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            coinzilla.com<br>
            one of the top network ad for crypto.
          </p>
          <span class="text-gray-400 text-lg">coinzilla is paying us average of<br>€1.60/eCPM (per 1000 views).</span>

          <a href="https://ibb.co/3CzbDzR" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download Earnings Report (Aug. 2021)
          </a>
          <a href="https://ibb.co/GkZ9vQR" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download Earnings Report (Sep. 1-21, 2021)
          </a>
        </div>

        <div>
          <span class="inline-flex items-center justify-center h-auto w-auto">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1634741043/axieandfriends.com/cointraffic-logo.svg" height="40" width="243" alt="Coinzilla ad network logo" srcset="">
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            cointraffic.io<br>
            one of the top network ad for crypto.
          </p>
          <span class="text-gray-400 text-lg">cointraffic is paying us average of<br>€1.60/eCPM (per 1000 views).</span>

          <a href="https://ibb.co/3CzbDzR" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download Earnings Report (Aug. 2021)
          </a>
          <a href="https://ibb.co/GkZ9vQR" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-flex" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
            Download Earnings Report (Sep. 1-21, 2021)
          </a>
        </div>

        <div>
          <span class="inline-flex items-center justify-center h-10 w-auto">
            <span class="text-4xl">🎁</span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            Donations and Gifts<br>
            SLP|AXS|WETH|AXS, BTC, ETH, and USDT.
          </p>
          <span class="text-gray-400 text-lg">The site accepts generous gifts from our loyal visitors.</span>
          
          <a href="https://explorer.roninchain.com/address/0x974dc746b320bb1c046f3956ab95c239a90fd8e9" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
            SLP Donation History
          </a>

          <a href="https://etherscan.io/address/0x3f39C0B421bDDb7Db222e0eB36276E4D8748854f" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
          <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/ETH.webp" height="16" width="16" alt="ETH" class="inline-block">
            ETH Donation History
          </a>

          <a href="https://tronscan.org/#/address/TCoqpuDKuVz1stcENM8mdDRUWh4u7znTin" class="hidden text-blue-500 hover:text-blue-600 hover:underline" target="_blank">
          <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1626720130/axieandfriends.com/USDT.png" height="16" width="16" alt="ETH" class="inline-block">
            USDT (Tron) Donation History
          </a>
        </div>
      </div>
    </div>
    <!-- /End Revenue sources? -->

    <hr class="mb-16" />

    <div class="sm:flex justify-center">
      <div class="mb-4 flex-shrink-0 sm:mb-0 sm:mr-4 text-left">
        <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1629106894/axieandfriends.com/Google-Analytics-logo.png" alt="" srcset="" class="h-16 object-contain sm:object-cover sm:h-32 w-full ">
      </div>
      <div>
        <h4 class="text-2xl font-bold text-green-700">Our Realtime Traffic</h4>
        <p class="mt-1">
          You can check our live traffic on Google Analytics:<br>
          Let's talk via Telegram ⇢ <a href="https://t.me/mnoquiao" class="text-gray-400 hover:text-gray-500 hover:underline">
            t.me/mnoquiao
          </a>
        </p>
      </div>
    </div>

    <div class="mt-16 mx-auto max-w-3xl">
      <h3 class="text-lg leading-6 font-medium text-gray-400">
        Updated Site Stats
      </h3>
      <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Managers
          </dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900" id="stat-total-manager">
            ..
          </dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Total Ronin Address
          </dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900" id="stat-total-ronin">
            ..
          </dd>
        </div>

        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
          <dt class="text-sm font-medium text-gray-500 truncate">
            Site's Age
          </dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900">
            <span id="stat-days-old">..</span> Days
          </dd>
        </div>
      </dl>
    </div>




    <div class="mb-5 pt-32 px-5 py-6 sm:px-6 text-center">
      <h1 class="text-4xl font-bold">⛰️ This is just the beginning.</h1>
      <div class="mt-1 text-4xl italic font-light mx-auto max-w-4xl text-gray-500">
        "axieandfriends.com is just the beginning of our partnership, I believe there are more Opportunities in creating great online tools to help crypto enthusiast like us! The best part of this is we can earn by giving value to our visitors."
      </div>

      <div class="text-lg mt-10">
        <img class="inline-block h-14 w-14 text-center rounded-full object-cover" src="https://res.cloudinary.com/mnoquiao/image/upload/v1628768240/axieandfriends.com/IMG_20190425_182448.jpg" height="250" width="250" alt="Photo of Mark Anthony Noquiao">
        <p>
          <a href="https://t.me/mnoquiao" target="_blank" class="text-gray-400 hover:text-gray-500 hover:underline">
            Mark Anthony Noquiao
          </a>
          <span class="text-gray-400 text-sm block">Founder of axieandfriends.</span>
        </p>
      </div>

      <a href="https://t.me/mnoquiao" target="_blank" class="mt-12 inline-flex items-center px-20 py-4  border border-transparent text-xl font-medium rounded-md text-gray-800 bg-indigo-100 hover:bg-indigo-200 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
        Become a Partner Now!
      </a>

      <span class="text-gray-400 block mt-3">
        Let's talk via Telegram ⇢ <a href="https://t.me/mnoquiao" target="_blank" class="text-gray-400 hover:text-gray-500 hover:underline">t.me/mnoquiao</a>
      </span>
    </div>

  </div>
</div>
@endsection



@section('page_scripts')
<script>
  // fetch site lives
  fetch("{{ route('site_stats') }}")
    .then(res => res.json())
    .then((data) => {

      $('#stat-total-manager').html(data['tot_managers']);
      $('#stat-total-ronin').html(data['tot_scholars']);
      $('#stat-days-old').html(data['days']);

    }).catch();
</script>
@endsection