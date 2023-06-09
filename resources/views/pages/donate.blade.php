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

<header class="py-10">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
    <h1 class="text-3xl font-bold text-white">🎁 Donate to axieandfriends.com</h1>
    <p class="text-indigo-50">Your generosity will help us improve and maintain this free web application. We will continue and to listen to your request, add more helpful features and exciting tools to help Axie Community Grow.</p>
  </div>
</header>

</div> <!-- [end] header -->

<main class="-mt-32">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Replace with your content -->
    <div class="mb-12 bg-gray-800 border border-gray-500 rounded-lg shadow px-5 py-6 sm:px-6">


      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-200">
          Our available addresses for donation
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-300">
          Thank you and much love from us!
        </p>
      </div>
      <div class="mt-5">
        <dl class="divide-y divide-gray-600">



          <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-base font-medium text-gray-200">
              <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" height="40" width="40" alt="USDT" class="inline-block">
                </div>
                <div>
                  <h4 class="text-justify font-medium">RONIN</h4>
                  <p class="text-sm text-gray-500">
                    SLP, WETH, AXS or Axie are accepted.
                  </p>
                </div>
              </div>
            </dt>
            <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <span class="flex-grow">
                <input readonly type="text" class="bg-transparent  text-gray-200 focus:ring-0 focus:border-0 block w-full sm:text-sm border-0" value="ronin:974dc746b320bb1c046f3956ab95c239a90fd8e9" id="donate-ronin" />
              </span>
              <span class="ml-4 flex-shrink-0">
                <button type="button" id="btn-donate-ronin" onClick="copyDonateAddr('donate-ronin');" class="bg-transparent rounded-md font-medium text-yellow-400 hover:text-green-200 focus:outline-none">
                  📋 Copy
                </button>
              </span>
            </dd>
          </div>



          <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-base font-medium text-gray-200">
              <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1626720131/axieandfriends.com/BTC.png" height="40" width="40" alt="USDT" class="inline-block">
                </div>
                <div>
                  <h4 class="text-justify font-medium">BTC</h4>
                  <p class="text-sm text-gray-500">
                    Bitcoin
                  </p>
                </div>
              </div>
            </dt>
            <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <span class="flex-grow">
                <input readonly type="text" class="bg-transparent  text-gray-200 focus:ring-0 focus:border-0 block w-full sm:text-sm border-0" value="bc1qaynf7xaqus5j6sjhn72rnar8v96504cpgjc36w" id="donate-btc" />
              </span>
              <span class="ml-4 flex-shrink-0">
                <button type="button" id="btn-donate-btc" onClick="copyDonateAddr('donate-btc');" class="bg-transparent rounded-md font-medium text-yellow-400 hover:text-green-200 focus:outline-none">
                  📋 Copy
                </button>
              </span>
            </dd>
          </div>



          <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-base font-medium text-gray-200">
              <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/ETH.webp" height="40" width="40" alt="USDT" class="inline-block">
                </div>
                <div>
                  <h4 class="text-justify font-medium">ETH</h4>
                  <p class="text-sm text-gray-500">
                    Ethereum
                  </p>
                </div>
              </div>
            </dt>
            <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <span class="flex-grow">
                <input readonly type="text" class="bg-transparent  text-gray-200 focus:ring-0 focus:border-0 block w-full sm:text-sm border-0" value="0x3f39C0B421bDDb7Db222e0eB36276E4D8748854f" id="donate-eth" />
              </span>
              <span class="ml-4 flex-shrink-0">
                <button type="button" id="btn-donate-eth" onClick="copyDonateAddr('donate-eth');" class="bg-transparent rounded-md font-medium text-yellow-400 hover:text-green-200 focus:outline-none">
                  📋 Copy
                </button>
              </span>
            </dd>
          </div>



          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-base font-normal text-gray-200">
              <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1626720130/axieandfriends.com/USDT.png" height="40" width="40" alt="USDT" class="inline-block">
                </div>
                <div>
                  <h4 class="text-justify font-medium">USDT <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-indigo-600 text-indigo-100">
                      ETH
                    </span></h4>
                  <p class="text-sm text-gray-500">
                    Tether USD
                  </p>
                </div>
              </div>
            </dt>
            <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <span class="flex-grow">
                <input readonly type="text" class="bg-transparent  text-gray-200 focus:ring-0 focus:border-0 block w-full sm:text-sm border-0" value="0x3f39C0B421bDDb7Db222e0eB36276E4D8748854f" id="donate-usdt-eth" />
              </span>
              <span class="ml-4 flex-shrink-0">
                <button type="button" id="btn-donate-usdt-eth" onClick="copyDonateAddr('donate-usdt-eth');" class="bg-transparent rounded-md font-medium text-yellow-400 hover:text-green-200 focus:outline-none">
                  📋 Copy
                </button>
              </span>
            </dd>
          </div>



          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
            <dt class="text-base font-normal text-gray-200">
              <div class="flex">
                <div class="mr-4 flex-shrink-0 self-center">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1626720130/axieandfriends.com/USDT.png" height="40" width="40" alt="USDT" class="inline-block">
                </div>
                <div>
                  <h4 class="text-justify font-medium">USDT <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium bg-red-600 text-red-100">
                      TRX
                    </span></h4>
                  <p class="text-sm text-gray-500">
                    Tether USD
                  </p>
                </div>
              </div>
            </dt>
            <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <span class="flex-grow">
                <input readonly type="text" class="bg-transparent  text-gray-200 focus:ring-0 focus:border-0 block w-full sm:text-sm border-0" value="TCoqpuDKuVz1stcENM8mdDRUWh4u7znTin" id="donate-usdt" />
              </span>
              <span class="ml-4 flex-shrink-0">
                <button type="button" id="btn-donate-usdt" onClick="copyDonateAddr('donate-usdt');" class="bg-transparent rounded-md font-medium text-yellow-400 hover:text-green-200 focus:outline-none">
                  📋 Copy
                </button>
              </span>
            </dd>
          </div>



        </dl>
      </div>

    </div>
    <!-- /End replace -->


  </div>
</main>

@endsection



@section('page_scripts')
<script>
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