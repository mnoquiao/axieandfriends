
<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('page_styles'); ?>
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

  @keyframes  rotation {
    from {
      transform: rotate(0deg);
    }

    to {
      transform: rotate(359deg);
    }
  }
</style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="py-10">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 space-y-2">
    <h1 class="text-3xl font-bold text-white">Axie Infinity Managers & Scholars SLP Tracker (axieandfriends.com)</h1>
    <p class="text-indigo-50">Axie Infinitiy Manager's loved our scholar tracker and Smooth Love Potion (SLP) monitoring tool.</p>
    <h2 class="text-white hidden md:block  text-xl font-bold pt-4">✨ Features</h2>
    <ul class="text-indigo-50 hidden md:block space-y-3">
      <li><strong>No Sign-up Required.</strong> You can use our Scholar Tracker without having to sign-up an account we do want to keep your privacy and security.</li>
      <li><strong>Monitor Daily SLP.</strong> We give you the power to monitor your Axie Infinity scholar's daily SLP grind use this tracker tool to encourage them and help them reach their target.</li>
      <li><strong>Retainable Data.</strong> Our solution is for you to regain, sync and maintain across any devices your scholars data for you to easily manage and track their performance.</li>
      <li><strong>Earnings Summary.</strong> View your unclaimed SLP and claimed SLP and it's local currency value gives you the ability to forecast your ROI.</li>
      <li></li>
    </ul>
  </div>
</div>

</div> <!-- [end] header -->


<main x-data="{ 
        modal_add: false, 
        modal_edit: false, 
        modal_sort_filter: false 
    }" class="-mt-32">

  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

    <!-- Replace with your content -->
    <div class="mb-2 md:mb-4 bg-gray-800 border border-gray-500 rounded-lg shadow space-y-8 px-5 py-6 sm:px-6">

      <?php if(null !== $uniq_link): ?>
      <div x-data="{
            show_personal_link: true,
            hide_personal_link: false
          }" class="w-full">
        <label for="uniqlink" class="text-sm font-bold text-gray-300 md:text-sm">YOUR PERSONAL LINK</label>

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

        <div x-show="show_personal_link" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
          <div class="mt-3 relative flex items-center">
            <input type="text" name="uniqlink" id="uniqlink" class="block w-full h-12 shadow-sm text-sm lg:text-xl pr-16 sm:text-sm rounded-md text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="https://axieandfriends.com/m/<?php echo e($uniq_link); ?>" readonly>
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
      <?php else: ?>
      <div id="empty-unique-link-wrapper"></div>
      <?php endif; ?>

      <!-- [start] unclaimed summary -->
      <div>
        <h2 class="text-gray-200 text-xl font-bold uppercase tracking-wide">YOUR STATS</h2>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              US
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  In-Game SLP
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
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              MS
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
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
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Scholars Share
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

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
              TS
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-200 font-medium text-base">
                  🎓 Total Scholar
                </span>

                <div id="dash-scholars">
                  <div class="h-3 bg-green-500 rounded w-3/5 mt-2"></div>
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


      <!-- [start] claimed summary -->
      <div class="mt-10" hidden>
        <h2 class="text-gray-500 text-sm font-medium uppercase tracking-wide">Claimed Summary <br><span class="text-red-400">⚠️WARNING:</span> <em class="text-gray-400">Still on testing do not rely on this 100%.</em></h2>
        <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-lg font-bold rounded-l-md">
              US
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-900 font-medium hover:text-gray-600">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Claimed SLP
                </span>

                <div id="dash-claimed-slp">
                  <div class="h-5 bg-green-100 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-claimed-slp-curr">
                  <div class="h-3 bg-gray-100 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 bg-yellow-600 text-white text-lg font-bold rounded-l-md">
              MS
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-900 font-medium hover:text-gray-600">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Manager's SLP
                </span>

                <div id="dash-claimed-slp-m">
                  <div class="h-5 bg-green-100 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-claimed-slp-m-curr">
                  <div class="h-3 bg-gray-100 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>

          <li class="col-span-1 flex shadow-sm rounded-md">
            <div class="flex-shrink-0 flex items-center justify-center w-16 bg-green-600 text-white text-lg font-bold rounded-l-md">
              SS
            </div>
            <div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate dash-boxes">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <span class="text-gray-900 font-medium hover:text-gray-600">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                  Scholars SLP
                </span>

                <div id="dash-claimed-slp-s">
                  <div class="h-5 bg-green-100 rounded w-1/2 mt-2"></div>
                </div>
                <div id="dash-claimed-slp-s-curr">
                  <div class="h-3 bg-gray-100 rounded w-3/5 mt-2"></div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- [end] claimed summary -->

    </div>
    <!-- /End replace -->



    <div class="flex flex-col mt-10 md:mt-0 md:flex-row md:justify-end border-b border-gray-500 py-4 mb-4 md:py-10 md:mb-10">

      <div class="flex w-full sm:w-full md:w-5/12 space-x-3">

        <!-- table view select button -->
        <button @click="show_table_list = true, show_grid_list = false, localStorage.setItem('default_view', 'table');" type="button" :class="show_table_list ? 'bg-gray-300' : 'bg-gray-900'" class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300  text-sm font-medium text-gray-500 hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800">
          <span class="sr-only">Table View</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
          </svg>
        </button>

        <!-- grid view select button -->
        <button @click="show_grid_list = true, show_table_list = false, localStorage.setItem('default_view', 'grid')" type="button" :class="show_grid_list ? 'bg-gray-300' : 'bg-gray-900'" class="relative inline-flex items-center px-4 py-2 rounded-md border border-gray-300 text-sm font-medium text-gray-500 hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800">
          <span class="sr-only">Grid View</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
          </svg>
        </button>

        <div class="relative flex items-stretch flex-grow focus-within:z-10">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Heroicon name: solid/search -->
            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <input type="text" name="filter-scholar" id="filter-scholar" class="block w-full rounded-md pl-11 py-2 text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Scholar name" onkeyup="filterScho()">
        </div>

        <button @click="modal_sort_filter = true" type="button" id="btn-sort-and-filter" class="items-center px-4 py-2 text-base font-medium rounded-md border border-gray-300 text-gray-500 bg-gray-900 hover:bg-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-800 focus:border-gray-800">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
          </svg>
        </button>

      </div>



      <div x-data="{
        add_scholar_menu: false
      }" class="flex w-full md:w-auto md:inline-flex mt-4 md:mt-0 md:ml-3">

        <!-- <button @click="modal_add = true" type="button" id="btn-add-scholar" class="md:inline-flex w-full items-center px-4 py-4 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-blue-600">
          Add new Scholar
        </button> -->

        <span class="relative inline-flex shadow-sm rounded-md">
          <button @click="modal_add = true" type=" button" class="md:inline-flex w-full items-center px-4 py-3 border border-transparent text-base font-medium rounded-l-md shadow-sm text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-blue-600">
            Add new scholar
          </button>
          <span class="-ml-px relative block">
            <button @click.away="add_scholar_menu = false" @click="add_scholar_menu = !add_scholar_menu" type="button" class="md:inline-flex w-full items-center px-4 py-4 border border-transparent text-base font-medium rounded-r-md shadow-sm text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-blue-600" id="option-menu-button" aria-expanded="true" aria-haspopup="true">
              <span class="sr-only">Open options</span>
              <!-- Heroicon name: solid/chevron-down -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>

            <div x-show="add_scholar_menu" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute z-10 right-0 mt-2 -mr-1 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="option-menu-button" tabindex="-1">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="option-menu-item-0">
                  Import Scholar
                </a>

                <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="option-menu-item-2">
                  Export Scholar
                </a>
              </div>
            </div>
          </span>
        </span>

      </div>
    </div>



    <!-- View function buttons | refresh, grid/table view -->
    <div class="grid justify-items-stretch">
      <span class="relative inline-flex shadow-sm rounded-md justify-self-end">

        <button id="refresh-all" type="button" class="relative inline-flex items-center px-2 py-2 rounded-md border border-gray-300 bg-gray-900 text-sm font-medium text-gray-500 hover:bg-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
          <span class="sr-only">Table View</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
          REFRESH
        </button>

      </span>
    </div>



    <!--  -->
    <!--  -->
    <!-- MOBILE -->
    <!--  -->
    <!--  -->
    <div x-show="show_grid_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-4 max-w-screen-sm md:hidden transition-opacity relative" id="scholars-list-wrapper-mobile">


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
    <div x-show="show_table_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-4 flex flex-col rounded-md relative overflow-hidden" id="scholars-list-wrapper-table">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden border border-gray-700 sm:rounded">

            <table class="min-w-full divide-y divide-gray-600">

              <thead class="bg-gray-700">

                <tr>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-50 uppercase tracking-wider">

                  </th>
                  <th colspan="3" scope="col" class="px-4 py-2 text-center font-bold text-gray-50 bg-gray-600 uppercase tracking-wider">
                    <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-8 h-8 items-center inline-block mr-2" alt="SLP"> Smooth Love Potion (SLP)
                  </th>
                  <th colspan="4" scope="col" class="px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider">

                  </th>
                </tr>

                <tr>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-left font-bold text-gray-50 uppercase tracking-wider">
                    Scholar
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-center font-bold text-gray-50 bg-gray-600 uppercase tracking-wider">
                    In-Game
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-center font-bold text-gray-50 bg-gray-600 uppercase tracking-wider">
                    Average
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-center font-bold text-gray-50 bg-gray-600 uppercase tracking-wider">
                    Today
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider">
                    Profits
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider">
                    Ratings
                  </th>
                  <th scope="col" class="whitespace-nowrap px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider">
                    Next Claim
                  </th>
                  <th scope="col" class="whitespace-nowrap w-24 px-4 py-2 text-right font-bold text-gray-50 uppercase tracking-wider">

                  </th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-700" id="scholars-list-table">
                <tr>
                  <td colspan="8">
                    <div class="flex justify-center p-10">
                      <img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt="">
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
    <div x-show="show_grid_list" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="mt-4 hidden md:block transition-opacity" id="scholars-list-wrapper">

      <div class="flex justify-center p-10">
        <img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt="">
      </div>

    </div>


    <?php if(null !== session('timezone_id')): ?>
    <div class="flex text-sm text-gray-400 mt-10">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <p class="ml-1.5">
        Time related information are based on your timezone: <em class="text-green-300"><?php echo e(session('timezone_id')); ?></em>
      </p>
    </div>

    <div class="flex text-sm text-gray-400 mt-2 md:mt-1">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <p class="ml-1.5">
        🎯 QHR or the Quota Hit Ratio of the scholar is computed by <em class="text-green-300">AVG_SLP_DAILY percent of SET_SLP_QUOTA_DAILY = ?</em>.
      </p>
    </div>

    <?php endif; ?>





  </div>

















  <!-- [start] Sort/Filter Modal -->
  <div x-show="modal_sort_filter" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="modal_sort_filter ? '' : 'hidden'" class="fixed z-10 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_sort_filter = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-0 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
      <div @click.away="modal_sort_filter = false" class="inline-block align-bottom text-white border border-gray-500 bg-gray-700 text-left rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl font-bold">Sort and Filter</p>

            <div @click="modal_sort_filter = false" class="cursor-pointer z-50">
              <svg class="fill-current text-gray-200 hover:text-gray-50" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>

          </div>

          <!-- form -->
          <form id="sort-scholar-form">
            <?php echo csrf_field(); ?>



            <!-- sort by -->
            <fieldset>
              <legend class="sr-only">
                Sort
              </legend>

              <h3 class="text-lg text-gray-200 font-bold mb-2 mt-5">Sort by:</h3>

              <div class="flex flex-wrap">
                <div class="mr-2 mt-3">
                  <label @click="sort_by = 1, localStorage.setItem('sort_by', 1)" :class="sort_by == 1 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="1" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Scholar Name
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 2, localStorage.setItem('sort_by', 2)" :class="sort_by == 2 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="2" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Highest <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP">
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 3, localStorage.setItem('sort_by', 3)" :class="sort_by == 3 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="3" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Lowest <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP">
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 4, localStorage.setItem('sort_by', 4)" :class="sort_by == 4 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="4" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Highest QHR
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 5, localStorage.setItem('sort_by', 5)" :class="sort_by == 5 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="5" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Lowest QHR
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 6, localStorage.setItem('sort_by', 6)" :class="sort_by == 6 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="6" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Claimable Date
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 7, localStorage.setItem('sort_by', 7)" :class="sort_by == 7 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="7" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Highest ⚔️ MMR
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 8, localStorage.setItem('sort_by', 8)" :class="sort_by == 8 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="8" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          Lowest ⚔️ MMR
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>
              </div>
            </fieldset>


            <!-- filter by -->
            <fieldset class="pointer-events-none cursor-not-allowed opacity-30">
              <legend class="sr-only">
                Sort
              </legend>

              <h3 class="text-lg text-gray-200 font-bold mb-2 mt-5">Filter by:</h3>

              <div class="flex flex-wrap">
                <div class="mr-2 mt-3">
                  <select id="location" name="location" class="block w-full px-5 py-1.5 pr-10 text-lg font-semibold cursor-pointer text-gray-600 border-gray-100 bg-gray-100 hover:border-gray-400 focus:outline-none focus:ring-blue-600 rounded-3xl">
                    <option>Added today</option>
                    <option selected>Added this week</option>
                    <option>Added this month</option>
                  </select>
                </div>

                <div class="mr-2 mt-3">
                  <label class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400 focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="filterBy" value="Hobby" class="sr-only" aria-labelledby="filterBy-0-label" aria-describedby="filterBy-0-description-0 filterBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="filterBy-0-label" class="font-medium">
                          w/ Ronin Balance
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

            </fieldset>

          </form>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Sort/Filter Modal -->



  <!-- [start] Adding Scholar Modal -->
  <div x-show="modal_add" :class="modal_add ? '' : 'hidden'" class="fixed z-10 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_add = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
      <div 
      x-transition:enter="ease-out duration-300" 
      x-transition:enter-start="opacity-0" 
      x-transition:enter-end="opacity-100" 
      x-transition:leave="ease-in duration-200" 
      x-transition:leave-start="opacity-100" 
      x-transition:leave-end="opacity-0" 
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
      <div 
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      @click.away="modal_add = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">


        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl font-bold">Adding Scholar! 🚀</p>

            <div @click="modal_add = false" class="cursor-pointer z-50">
              <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>


          </div>

          <!-- form -->
          <form class="space-y-8" id="add-scholar-form">

            <?php echo csrf_field(); ?>

            <div class="space-y-5 sm:space-y-3">
              <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  About Monitoring
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  Our monitoring starts after you successfully added your scholar.
                </p>
              </div>

              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="ronin-addr" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Ronin Address<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="roninaddr" id="ronin-addr" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="ronin:4321...1234" maxlength="" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Name<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="scholarname" id="scho-name" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="e.g. John Doe" maxlength="" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Share (%)<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="number" name="schoshare" id="scho-share" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="slpquota" class="block text-sm font-medium text-gray-700">SLP Quota</label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">
                        <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                      </span>
                    </div>

                    <input type="number" name="slpquota" id="slpquota" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-20 sm:text-sm border-gray-300 rounded-md" value="0" placeholder="e.g. 150">

                    <div class="absolute inset-y-0 right-0 flex items-center">
                      <label for="quotafrequency" class="sr-only">Frequency</label>
                      <select id="quotafrequency" name="quotafrequency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option value="1">Daily</option>
                        <option value="2">7 Days</option>
                        <option value="3">14 Days</option>
                        <option value="4">30 Days</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="note" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Note
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea id="note" name="note" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" maxlength="65535"></textarea>
                    <p class="mt-2 text-sm text-gray-500">📝 Write a note for this scholar.</p>
                  </div>
                </div>

              </div>
            </div>

            <div class="pt-5 border-t	border-gray-200">
              <div role="alert" class="mb-5" id="scholar-form-err-msg-container" hidden>
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                  Error
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                  <ul id="scholar-form-err-msg"></ul>
                </div>
              </div>
            </div>

          </form>

        </div>


        <div class="px-4 pt-5 pb-4 bg-gray-50 text-right sm:p-6">
          <button @click="modal_add = false" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
          </button>
          <button type="submit" id="sbt-add-scholar-form" form="add-scholar-form" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Adding Scholar Modal -->



  <!-- [start] Editing Scholar Modal -->
  <div x-show="modal_edit" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="modal_edit ? '' : 'hidden'" class="fixed z-10 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_edit = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
      <div @click.away="modal_edit = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">


        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl font-bold">Editing Scholar! 🚀</p>

            <div @click="modal_edit = false" class="cursor-pointer z-50">
              <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>


          </div>

          <!-- form -->
          <form class="space-y-8" id="edit-scholar-form">
            <input type="hidden" name="s" value="" />
            <?php echo csrf_field(); ?>

            <div class="space-y-5 sm:space-y-3">
              <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  ✏️🎓 <span id="editing-scholar-name"></span>
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 whitespace-pre-line" id="edit-ronin-addr"></p>
              </div>

              <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="edit-scho-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Name<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="scholar_name" id="edit-scho-name" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="e.g. John Doe" maxlength="" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="edit-scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Share (%)<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="number" name="scholar_share" id="edit-scho-share" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="edit-slpquota" class="block text-sm font-medium text-gray-700">SLP Quota</label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm">
                        <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                      </span>
                    </div>

                    <input type="number" name="slp_quota" id="edit-slpquota" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-20 sm:text-sm border-gray-300 rounded-md" value="0" placeholder="e.g. 150">

                    <div class="absolute inset-y-0 right-0 flex items-center">
                      <label for="edit-quotafrequency" class="sr-only">Frequency</label>
                      <select id="edit-quotafrequency" name="slp_quota_frequency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option value="1">Daily</option>
                        <option value="2">7 Days</option>
                        <option value="3">14 Days</option>
                        <option value="4">30 Days</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="edit-note" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Note
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea id="edit-note" name="note" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" maxlength="65535"></textarea>
                    <p class="mt-2 text-sm text-gray-500">📝 Write a note for this scholar.</p>
                  </div>
                </div>

              </div>
            </div>

            <div class="pt-5 border-t	border-gray-200">
              <div role="alert" class="mb-5" id="scholar-form-err-msg-container" hidden>
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                  Error
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                  <ul id="scholar-form-err-msg"></ul>
                </div>
              </div>
            </div>

          </form>

        </div>


        <div class="px-4 pt-5 pb-4 bg-gray-50 text-right sm:p-6">
          <button @click="modal_edit = false" id="cancel-edit-scholar-form" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Cancel
          </button>
          <button type="submit" id="sbt-edit-scholar-form" form="edit-scholar-form" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Save
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Editing Scholar Modal -->




</main>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('page_scripts'); ?>
<script>
  $(function() {

    setTimeout(() => {

      // remove default hidden attributes of the following modals
      $('.axie-hidden-by-default').removeAttr('hidden');

      // call mmr and rank update once
      /*       fetch("<?php echo e(route('cron_update_scholar_mmr_rank')); ?>")
            .then(response => response.json())
            .then(data => console.log(data)); */

    }, 1000);

    // fetch scholars (if exist)
    fetch_scholars();



    // adding scho form submitted
    $('#add-scholar-form').on('submit', function(e) {

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-add-scholar-form');

      /* contracts submitted form data key/value pairs */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "<?php echo e(route('add_scholar')); ?>",
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

    // sort and filter submitted  
    $('#sort-scholar-form').on('submit', function(e) {

      $('#scholars-list-wrapper-mobile, #scholars-list-wrapper').html('<div class="flex flex-shrink-0 justify-center mt-5"><img class="rotate" src="https://res.cloudinary.com/mnoquiao/image/upload/h_124,w_124/v1627154657/axieandfriends.com/puff-loading.png" alt="Loading Image from axieinfinity.com"></div>');
      $('#scholars-list-table').html('<tr><td colspan="8"><div class="flex justify-center p-10"><img class="rotate animate-spin h-60 w-60 rounded-full object-cover border-1" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627154657/axieandfriends.com/puff-loading.png" alt=""></div></td></tr>');

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-sort-scholar-form');

      /* contracts submitted form data key/value pairs */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "<?php echo e(route('sort_and_filter')); ?>",
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

      // prevent default button default action
      e.preventDefault();

      // get submit button
      let submit_btn = $(this);

      // initiate new form
      var formData = new FormData();

      // papulate form data
      formData.append("_token", "<?php echo e(csrf_token()); ?>");

      xhr = $.ajax({
        url: "<?php echo e(route('refresh_scholar_data')); ?>",
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp\www\Projects\Axie-and-Friends\resources\views/pages/index.blade.php ENDPATH**/ ?>