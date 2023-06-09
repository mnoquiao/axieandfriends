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
      <div class="bg-gray-800 py-60 rounded-3xl space-y-2 relative overflow-hidden">
        <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1629302490/axieandfriends.com/03e9d92e3785ce27ac0378788977c70e.png" class="absolute opacity-10 md:opacity-60 -right-5" alt="" srcset="">
        <h1 class="text-8xl font-bold text-white">Axie and Friends</h1>
        <h2 class="text-7xl font-bold text-green-500">Scholar Agency</h2>
        <h2 class="text-2xl font-normal pt-16 text-white">Get a top-tier, well-trained, and always monitored scholar from us.</h2>
      </div>
      <div class="mt-7 text-lg mx-auto max-w-3xl space-y-3 font-normal text-gray-500">
        <p>If you are a Manager that is looking for an agency that will provide you with a fully-trained Scholar.</p>
        <p>Here at axieandfriends, we offer you full management including training and monitoring of all our available scholars no need to look online and found untrusted ones!</p>
      </div>

      <a href="https://t.me/mnoquiao" target="_blank" class="mt-12 inline-flex items-center px-20 py-4  border border-transparent text-xl font-medium rounded-md text-gray-800 bg-indigo-100 hover:bg-indigo-200 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
        Become a Partner Now!
      </a>

      <span class="text-gray-400 block mt-3">
        Let's talk via Telegram ⇢ <a href="https://t.me/mnoquiao" target="_blank" class="text-gray-400 hover:text-gray-500 hover:underline">t.me/mnoquiao</a>
      </span>

      <div class="mt-16 mx-auto max-w-3xl">
        <h3 class="text-lg leading-6 font-medium text-gray-400">
          Agency Stats
        </h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
              Scholars
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900" id="stat-total-manager">
              185
            </dd>
          </div>

          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
              Axie Inventory
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900" id="stat-total-ronin">
              555
            </dd>
          </div>

          <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
            <dt class="text-sm font-medium text-gray-500 truncate">
              Total SLP Earned
            </dt>
            <dd class="mt-1 text-3xl font-semibold text-gray-900">
              <span id="stat-days-old">2,603,615+</span>
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</header>

</div> <!-- [end] header -->

<div class="bg-gray-100">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Why becdome a partner? -->
    <div class="mb-12 pt-20 px-5 py-6 sm:px-6 text-center">
      <h1 class="text-3xl font-bold text-gray-700">Why get Scholar from us?</h1>
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mt-20">
        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-green-300">
            <span class="text-xl font-medium leading-none text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            Scholar will be ready<br>
            within a the day.
          </p>
          <span class="text-gray-400 text-lg">We will make sure that we have<br> already trained a scholar for you.</span>
        </div>

        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-green-300">
            <span class="text-xl font-medium leading-none text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            Internally Managed by Us<br>
            and with internal rewards.
          </p>
          <span class="text-gray-400 text-lg">You don't need to worry about rewarding the scholar</span>
        </div>
        <div>
          <span class="inline-flex items-center justify-center h-14 w-14 rounded-full bg-green-300">
            <span class="text-xl font-medium leading-none text-green-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </span>
          </span>

          <p class="font-bold text-gray-700 mt-5 mb-3 text-lg">
            Scholars are monitored<br>
            and subject for re-evaluation every payouts.
          </p>
          <span class="text-gray-400 text-lg">We do all the hard work from training, monitoring and evaulation the Scholar</span>
        </div>
      </div>
    </div>
    <!-- /End  Why becdome a partner? -->

  </div>
</div>

<div class="bg-white">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <div class="mb-5 pt-32 px-5 py-6 sm:px-6 text-center">
      <h1 class="text-4xl font-bold">💼 Let us manage it for you.</h1>
      <div class="mt-1 text-4xl italic font-light mx-auto max-w-4xl text-gray-500">
        "Before the PANDEMIC my experienced in the Cybercafe industry has accumulated for almost 12 years+ as a professional business manager, I'm also a game-addict in my younger days. Gaming is part of my life!<br><br>
        here at axieandfriends.com Agency, we'll make sure that we don't just give your game-addict but well-oriented and professionally trained scholar."
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
  // fetch("{{ route('site_stats') }}")
  //   .then(res => res.json())
  //   .then((data) => {

  //     $('#stat-total-manager').html(data['tot_managers']);
  //     $('#stat-total-ronin').html(data['tot_scholars']);
  //     $('#stat-days-old').html(data['days']);

  //   }).catch();
</script>
@endsection