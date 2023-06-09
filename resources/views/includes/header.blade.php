<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
  <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
    <div class="flex">
      <div class="flex-shrink-0">
        <!-- Heroicon name: solid/exclamation -->
        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <p class="font-bold text-sm text-yellow-700">
          <span class="underline">Public Notice:</span>
          <span class="font-medium text-yellow-700 hover:text-yellow-600">
            We are doing some maintenance and data may not be updated until 08:00 April 16, 2022 GMT+0.
          </span>
        </p>
      </div>
    </div>
  </div>
</div>

<div class="bg-gray-800 {{ ($active_page =='partners' || $active_page =='scholar-agency') ? '' : 'pb-32' }}">

  @if ($active_page == 'index')
  <nav class="bg-gray-900 hidden lg:block">

    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
      <div class="border-b border-gray-700">

        <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                    
          <div></div>

          <div class="ml-4 flex items-center md:ml-6 pr-5">
            <div class="p-1">
              <span @click="modal_timezone = true" class="inline-flex items-center py-1.5 pl-2 pr-2 rounded-md font-bold text-sm text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change timezone">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-2 mr-3 display-selected-timezone">{{ $selected_timezone_id }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </div>

            <div class="p-1">
              <span @click="modal_currency = true" class="inline-flex items-center py-1.5 pl-2 pr-2 rounded-md font-bold text-sm text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change currency">
                <span class="mr-3 display-selected-currency">{{ $selected_currency_display }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </div>
          </div>

        </div>

        {{-- coinzilla ads top --}}
        <div class="flow-root text-center justify-center mb-4">
          <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
      
          {{-- axieandfriends.com coinzilla --}}
          <div class="header-2156113d0c9e8349782"></div>
      
          </div>
        </div>

      </div>
    </div>

  </nav>
  @endif

  <nav class="bg-gray-900">
    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
      <div class="border-b border-gray-700">
        <div class="flex items-center justify-between h-auto px-2 sm:px-0">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <a class="" href="/">
                <img class="h-20 w-auto my-3" src="https://res.cloudinary.com/mnoquiao/image/upload/v1635897639/axieandfriends.com/test-logo_1.png" alt="axieandfriends.com logo">
              </a>
            </div>
            <div class="hidden lg:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="{{ $active_page === 'index' ? 'bg-gray-700' : 'hover:bg-gray-700 hover:text-white px-3'}} text-gray-300 px-3 py-2 rounded-md text-sm font-medium" alt="Managers Tool">💼🛠️ Managers Tool</a>

                <a href="/donate" class="{{ $active_page === 'donate' ? 'bg-gray-700' : 'hover:bg-gray-700 hover:text-white px-3'}} text-gray-300 px-3 py-2 rounded-md text-sm font-medium" alt="Buy Me a Coffee">❤️☕ Donate</a>

                <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" alt="Report a bug">🐞 Bug Report</a> -->
              </div>
            </div>
          </div>
          <div class="hidden lg:block">
            <div class="ml-4 flex items-center md:ml-6">
              <div class="p-1">
                <!-- ETH Price Icon -->
                <a href="https://www.coingecko.com/en/coins/ethereum" rel="noreferrer" target="_blank" class="text-gray-300 px-3 py-2 rounded-md text-base font-medium" title="Ethereum (ETH) Price">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/ETH.webp" height="24" width="24" alt="ETH" class="inline-block">
                  <span class="text-white font-bold head_eth_price">
                    ...
                  </span>
                </a>
              </div>

              <div class="p-1">
                <!-- AXS Price Icon -->
                <a href="https://www.coingecko.com/en/coins/axie-infinity" rel="noreferrer" target="_blank" class="text-gray-300 px-3 py-2 rounded-md text-base font-medium" title="Axie Infinity (AXS) Price">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/AXS.webp" height="24" width="24" alt="AXS" class="inline-block">
                  <span class="text-white font-bold head_axs_price">
                    ...
                  </span>
                </a>
              </div>

              <div class="p-1">
                <!-- SLP Price Icon -->
                <a href="https://www.coingecko.com/en/coins/smooth-love-potion" rel="noreferrer" target="_blank" class="text-gray-300 px-3 py-2 rounded-md text-base font-medium" title="Smooth Love Potion (SLP) Price">
                  <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="24" width="24" alt="SLP" class="inline-block">
                  <span class="text-white font-bold head_slp_price">
                    ...
                  </span>
                </a>
              </div>
              <!-- Profile dropdown -->
              <div class="ml-3 relative">
                <!-- <div>
                    <button type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                      <span class="sr-only">Open user menu</span>
                      <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    </button>
                  </div> -->

                <!--
                    Dropdown menu, show/hide based on menu state.

                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                <!-- <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"> -->
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                  </div> -->
              </div>
            </div>
          </div>
          <div class="-mr-2 flex lg:hidden">
            <!-- Mobile menu button -->
            <button x-on:click="menu = ! menu" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <!--
                  Heroicon name: outline/menu

                  Menu open: "hidden", Menu closed: "block"
                -->
              <svg :class="menu ? 'block' : 'hidden'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <!--
                  Heroicon name: outline/x

                  Menu open: "block", Menu closed: "hidden"
                -->
              <svg :class="menu ? 'hidden' : 'block'" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="menu ? 'hidden' : 'block'" class="border-b border-gray-700 lg:hidden" id="mobile-menu">
      <div class="px-2 py-3 space-y-1 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="/" class="{{ $active_page === 'index' ? 'bg-gray-700' : 'text-gray-300'}} text-white block px-3 py-2 rounded-md text-base font-medium" alt="Managers Tool">💼🛠️ Managers Tool</a>

        <a href="/donate" class="{{ $active_page === 'donate' ? 'bg-gray-700' : 'text-gray-300'}} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" alt="Buy Me a Coffee">❤️☕ Donate</a>

        <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" alt="Report a bug">🐞 Bug Report</a> -->
      </div>

      <div class="w-auto flex justify-between space-x-4 mb-2 px-3 py-2">

        <div class="w-6/12 relative">
          <div @click="modal_timezone = true" class="flex w-full justify-center items-center px-2 py-3 rounded-md font-bold text-base text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change currency">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-2 mr-3 display-selected-timezone">{{ $selected_timezone_id }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>

        <div class="w-6/12 relative">
          <div @click="modal_currency = true" class="flex w-full justify-center items-center px-2 py-3 rounded-md font-bold text-base text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change currency">
            <span class="mr-3 display-selected-currency">{{ $selected_currency_display }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </div>
        </div>

      </div>

      <div class="py-3 border-t border-gray-700">
        <div class="mt-1 px-2 space-y-1">

          <!-- ETH Price Icon -->
          <a href="https://www.coingecko.com/en/coins/ethereum" rel="noreferrer" target="_blank" class="text-gray-300 block px-3 py-2 rounded-md text-base font-medium" title="Ethereum (ETH) Price">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/ETH.webp" height="22" width="22" alt="ETH" class="inline-block">
            <span class="text-white font-bold head_eth_price">...</span>
          </a>

          <!-- AXS Price Icon -->
          <a href="https://www.coingecko.com/en/coins/axie-infinity" rel="noreferrer" target="_blank" class="text-gray-300 block px-3 py-2 rounded-md text-base font-medium" title="Axie Infinity (AXS) Price">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/AXS.webp" height="22" width="22" alt="AXS" class="inline-block">
            <span class="text-white font-bold head_axs_price">...</span>
          </a>

          <!-- SLP Price Icon -->
          <a href="https://www.coingecko.com/en/coins/smooth-love-potion" rel="noreferrer" target="_blank" class="text-gray-300 block px-3 py-2 rounded-md text-base font-medium" title="Smooth Love Potion (SLP) Price">
            <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="22" width="22" alt="SLP" class="inline-block">
            <span class="text-white font-bold head_slp_price">...</span>
          </a>

        </div>
      </div>
    </div>
  </nav>


























  <!-- [start] Select Visitor Timezone Modal -->
  <div x-show="modal_timezone" :class="modal_timezone ? '' : 'hidden'" class="fixed z-100 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_timezone = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div @click.away="modal_timezone = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-gray-900 rounded-lg text-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full md:max-w-4xl md:w-10/12">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl mb-1 font-bold">Select Timezone</p>

            <div @click="modal_timezone = false" class="cursor-pointer z-50">
              <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>

          </div>


          <div x-data="load_timezone()">

            <form class="relative">
              <input x-ref="searchField" x-model="search" x-on:keydown.window.prevent.slash="$refs.searchField.focus()" type="search" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-2" type="text" aria-label="Search" placeholder="Search" />
            </form>

            <div class="mt-5 md:mt-10 grid grid-cols-1 md:grid-cols-3 gap-4 h-3/6 max-h-96 overflow-y-auto">

              <template x-for="item in filteredCurrencies" :key="item.id">
                <div class="relative rounded-lg border-0 bg-white bg-opacity-20 px-2.5 py-3.5 shadow-sm flex items-center space-x-3 hover:bg-opacity-30 hover:border-gray-300 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-white">
                  <div class="flex-1 min-w-0">
                    <a href="javascript:void(0);" class="focus:outline-none change-currency" @click="
                                                                                                  modal_timezone = false 
                                                                                                  set_timezone(item.timezone_description, item.timezone_id)
                                                                                                ">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-semibold text-white" x-text="item.timezone_description"></p>
                      <p class="text-sm italic text-gray-300 truncate" x-text="item.timezone_id"></p>
                    </a>
                  </div>
                </div>
              </template>

            </div>

          </div>


          <script>
            function load_timezone() {
              return {
                search: "",
                myForData: sourceTimezone,
                get filteredCurrencies() {
                  if (this.search === "") {
                    return this.myForData;
                  }
                  return this.myForData.filter((item) => {
                    return item.timezone_description
                      .toLowerCase()
                      .includes(this.search.toLowerCase()) ||
                      item.timezone_id
                      .toLowerCase()
                      .includes(this.search.toLowerCase())

                    ;
                  });
                },
              };
            }

            function set_timezone(timezone_description, timezone_id) {

              const data = {
                __tzc: timezone_description,
                __tzi: timezone_id,
                _token: '{{ csrf_token()  }}'
              };

              fetch("{{ route('change_timezone') }}", {
                  method: 'POST', // or 'PUT'
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {

                  // fetch scholars
                  fetch_scholars();

                  // change timezone displayed
                  $('.display-selected-timezone').text(timezone_id);

                })
                .catch((error) => {
                  console.error('Error:', error);
                });


            }

            var sourceTimezone = [{
                "id": 1,
                "timezone_description": "(UTC-12:00) International Date Line West",
                "timezone_id": "Etc/GMT+12",
              },
              {
                "id": 2,
                "timezone_description": "(UTC-11:00) Coordinated Universal Time-11",
                "timezone_id": "Etc/GMT+11",
              },
              {
                "id": 3,
                "timezone_description": "(UTC-10:00) Hawaii",
                "timezone_id": "Pacific/Honolulu",
              },
              {
                "id": 4,
                "timezone_description": "(UTC-09:00) Alaska",
                "timezone_id": "America/Anchorage",
              },
              {
                "id": 5,
                "timezone_description": "(UTC-08:00) Baja California",
                "timezone_id": "America/Santa_Isabel",
              },
              {
                "id": 6,
                "timezone_description": "(UTC-08:00) Pacific Time (US and Canada)",
                "timezone_id": "America/Los_Angeles",
              },
              {
                "id": 7,
                "timezone_description": "(UTC-07:00) Chihuahua, La Paz, Mazatlan",
                "timezone_id": "America/Chihuahua",
              },
              {
                "id": 8,
                "timezone_description": "(UTC-07:00) Arizona",
                "timezone_id": "America/Phoenix",
              },
              {
                "id": 9,
                "timezone_description": "(UTC-07:00) Mountain Time (US and Canada)",
                "timezone_id": "America/Denver",
              },
              {
                "id": 10,
                "timezone_description": "(UTC-06:00) Central America",
                "timezone_id": "America/Guatemala",
              },
              {
                "id": 11,
                "timezone_description": "(UTC-06:00) Central Time (US and Canada)",
                "timezone_id": "America/Chicago",
              },
              {
                "id": 12,
                "timezone_description": "(UTC-06:00) Saskatchewan",
                "timezone_id": "America/Regina",
              },
              {
                "id": 13,
                "timezone_description": "(UTC-06:00) Guadalajara, Mexico City, Monterey",
                "timezone_id": "America/Mexico_City",
              },
              {
                "id": 14,
                "timezone_description": "(UTC-05:00) Bogota, Lima, Quito",
                "timezone_id": "America/Bogota",
              },
              {
                "id": 15,
                "timezone_description": "(UTC-05:00) Indiana (East)",
                "timezone_id": "America/Indiana/Indianapolis",
              },
              {
                "id": 16,
                "timezone_description": "(UTC-05:00) Eastern Time (US and Canada)",
                "timezone_id": "America/New_York",
              },
              {
                "id": 17,
                "timezone_description": "(UTC-04:30) Caracas",
                "timezone_id": "America/Caracas",
              },
              {
                "id": 18,
                "timezone_description": "(UTC-04:00) Atlantic Time (Canada)",
                "timezone_id": "America/Halifax",
              },
              {
                "id": 19,
                "timezone_description": "(UTC-04:00) Asuncion",
                "timezone_id": "America/Asuncion",
              },
              {
                "id": 20,
                "timezone_description": "(UTC-04:00) Georgetown, La Paz, Manaus, San Juan",
                "timezone_id": "America/La_Paz",
              },
              {
                "id": 21,
                "timezone_description": "(UTC-04:00) Cuiaba",
                "timezone_id": "America/Cuiaba",
              },
              {
                "id": 22,
                "timezone_description": "(UTC-04:00) Santiago",
                "timezone_id": "America/Santiago",
              },
              {
                "id": 23,
                "timezone_description": "(UTC-03:30) Newfoundland",
                "timezone_id": "America/St_Johns",
              },
              {
                "id": 24,
                "timezone_description": "(UTC-03:00) Brasilia",
                "timezone_id": "America/Sao_Paulo",
              },
              {
                "id": 25,
                "timezone_description": "(UTC-03:00) Greenland",
                "timezone_id": "America/Godthab",
              },
              {
                "id": 26,
                "timezone_description": "(UTC-03:00) Cayenne, Fortaleza",
                "timezone_id": "America/Cayenne",
              },
              {
                "id": 27,
                "timezone_description": "(UTC-03:00) Buenos Aires",
                "timezone_id": "America/Argentina/Buenos_Aires",
              },
              {
                "id": 28,
                "timezone_description": "(UTC-03:00) Montevideo",
                "timezone_id": "America/Montevideo",
              },
              {
                "id": 29,
                "timezone_description": "(UTC-02:00) Coordinated Universal Time-2",
                "timezone_id": "Etc/GMT+2",
              },
              {
                "id": 30,
                "timezone_description": "(UTC-01:00) Cape Verde",
                "timezone_id": "Atlantic/Cape_Verde",
              },
              {
                "id": 31,
                "timezone_description": "(UTC-01:00) Azores",
                "timezone_id": "Atlantic/Azores",
              },
              {
                "id": 32,
                "timezone_description": "(UTC+00:00) Casablanca",
                "timezone_id": "Africa/Casablanca",
              },
              {
                "id": 33,
                "timezone_description": "(UTC+00:00) Monrovia, Reykjavik",
                "timezone_id": "Atlantic/Reykjavik",
              },
              {
                "id": 34,
                "timezone_description": "(UTC+00:00) Dublin, Edinburgh, Lisbon, London",
                "timezone_id": "Europe/London",
              },
              {
                "id": 35,
                "timezone_description": "(UTC+00:00) Coordinated Universal Time",
                "timezone_id": "Etc/GMT",
              },
              {
                "id": 36,
                "timezone_description": "(UTC+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna",
                "timezone_id": "Europe/Berlin",
              },
              {
                "id": 37,
                "timezone_description": "(UTC+01:00) Brussels, Copenhagen, Madrid, Paris",
                "timezone_id": "Europe/Paris",
              },
              {
                "id": 38,
                "timezone_description": "(UTC+01:00) West Central Africa",
                "timezone_id": "Africa/Lagos",
              },
              {
                "id": 39,
                "timezone_description": "(UTC+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague",
                "timezone_id": "Europe/Budapest",
              },
              {
                "id": 40,
                "timezone_description": "(UTC+01:00) Sarajevo, Skopje, Warsaw, Zagreb",
                "timezone_id": "Europe/Warsaw",
              },
              {
                "id": 41,
                "timezone_description": "(UTC+01:00) Windhoek",
                "timezone_id": "Africa/Windhoek",
              },
              {
                "id": 42,
                "timezone_description": "(UTC+02:00) Athens, Bucharest, Istanbul",
                "timezone_id": "Europe/Istanbul",
              },
              {
                "id": 43,
                "timezone_description": "(UTC+02:00) Helsinki, Kiev, Riga, Sofia, Tallinn, Vilnius",
                "timezone_id": "Europe/Kiev",
              },
              {
                "id": 44,
                "timezone_description": "(UTC+02:00) Cairo",
                "timezone_id": "Africa/Cairo",
              },
              {
                "id": 45,
                "timezone_description": "(UTC+02:00) Damascus",
                "timezone_id": "Asia/Damascus",
              },
              {
                "id": 46,
                "timezone_description": "(UTC+02:00) Amman",
                "timezone_id": "Asia/Amman",
              },
              {
                "id": 47,
                "timezone_description": "(UTC+02:00) Harare, Pretoria",
                "timezone_id": "Africa/Johannesburg",
              },
              {
                "id": 48,
                "timezone_description": "(UTC+02:00) Jerusalem",
                "timezone_id": "Asia/Jerusalem",
              },
              {
                "id": 49,
                "timezone_description": "(UTC+02:00) Beirut",
                "timezone_id": "Asia/Beirut",
              },
              {
                "id": 50,
                "timezone_description": "(UTC+03:00) Baghdad",
                "timezone_id": "Asia/Baghdad",
              },
              {
                "id": 51,
                "timezone_description": "(UTC+03:00) Minsk",
                "timezone_id": "Europe/Minsk",
              },
              {
                "id": 52,
                "timezone_description": "(UTC+03:00) Kuwait, Riyadh",
                "timezone_id": "Asia/Riyadh",
              },
              {
                "id": 53,
                "timezone_description": "(UTC+03:00) Nairobi",
                "timezone_id": "Africa/Nairobi",
              },
              {
                "id": 54,
                "timezone_description": "(UTC+03:30) Tehran",
                "timezone_id": "Asia/Tehran",
              },
              {
                "id": 55,
                "timezone_description": "(UTC+04:00) Moscow, St. Petersburg, Volgograd",
                "timezone_id": "Europe/Moscow",
              },
              {
                "id": 56,
                "timezone_description": "(UTC+04:00) Tbilisi",
                "timezone_id": "Asia/Tbilisi",
              },
              {
                "id": 57,
                "timezone_description": "(UTC+04:00) Yerevan",
                "timezone_id": "Asia/Yerevan",
              },
              {
                "id": 58,
                "timezone_description": "(UTC+04:00) Abu Dhabi, Muscat",
                "timezone_id": "Asia/Dubai",
              },
              {
                "id": 59,
                "timezone_description": "(UTC+04:00) Baku",
                "timezone_id": "Asia/Baku",
              },
              {
                "id": 60,
                "timezone_description": "(UTC+04:00) Port Louis",
                "timezone_id": "Indian/Mauritius",
              },
              {
                "id": 61,
                "timezone_description": "(UTC+04:30) Kabul",
                "timezone_id": "Asia/Kabul",
              },
              {
                "id": 62,
                "timezone_description": "(UTC+05:00) Tashkent",
                "timezone_id": "Asia/Tashkent",
              },
              {
                "id": 63,
                "timezone_description": "(UTC+05:00) Islamabad, Karachi",
                "timezone_id": "Asia/Karachi",
              },
              {
                "id": 64,
                "timezone_description": "(UTC+05:30) Sri Jayewardenepura Kotte",
                "timezone_id": "Asia/Colombo",
              },
              {
                "id": 65,
                "timezone_description": "(UTC+05:30) Chennai, Kolkata, Mumbai, New Delhi",
                "timezone_id": "Asia/Kolkata",
              },
              {
                "id": 66,
                "timezone_description": "(UTC+05:45) Kathmandu",
                "timezone_id": "Asia/Kathmandu",
              },
              {
                "id": 67,
                "timezone_description": "(UTC+06:00) Astana",
                "timezone_id": "Asia/Almaty",
              },
              {
                "id": 68,
                "timezone_description": "(UTC+06:00) Dhaka",
                "timezone_id": "Asia/Dhaka",
              },
              {
                "id": 69,
                "timezone_description": "(UTC+06:00) Yekaterinburg",
                "timezone_id": "Asia/Yekaterinburg",
              },
              {
                "id": 70,
                "timezone_description": "(UTC+06:30) Yangon",
                "timezone_id": "Asia/Yangon",
              },
              {
                "id": 71,
                "timezone_description": "(UTC+07:00) Bangkok, Hanoi, Jakarta",
                "timezone_id": "Asia/Bangkok",
              },
              {
                "id": 72,
                "timezone_description": "(UTC+07:00) Novosibirsk",
                "timezone_id": "Asia/Novosibirsk",
              },
              {
                "id": 73,
                "timezone_description": "(UTC+08:00) Krasnoyarsk",
                "timezone_id": "Asia/Krasnoyarsk",
              },
              {
                "id": 74,
                "timezone_description": "(UTC+08:00) Ulaanbaatar",
                "timezone_id": "Asia/Ulaanbaatar",
              },
              {
                "id": 75,
                "timezone_description": "(UTC+08:00) Beijing, Chongqing, Hong Kong, Urumqi",
                "timezone_id": "Asia/Shanghai",
              },
              {
                "id": 76,
                "timezone_description": "(UTC+08:00) Perth",
                "timezone_id": "Australia/Perth",
              },
              {
                "id": 77,
                "timezone_description": "(UTC+08:00) Kuala Lumpur, Singapore",
                "timezone_id": "Asia/Singapore",
              },
              {
                "id": 78,
                "timezone_description": "(UTC+08:00) Taipei",
                "timezone_id": "Asia/Taipei",
              },
              {
                "id": 79,
                "timezone_description": "(UTC+09:00) Irkutsk",
                "timezone_id": "Asia/Irkutsk",
              },
              {
                "id": 80,
                "timezone_description": "(UTC+09:00) Seoul",
                "timezone_id": "Asia/Seoul",
              },
              {
                "id": 81,
                "timezone_description": "(UTC+09:00) Osaka, Sapporo, Tokyo",
                "timezone_id": "Asia/Tokyo",
              },
              {
                "id": 82,
                "timezone_description": "(UTC+09:30) Darwin",
                "timezone_id": "Australia/Darwin",
              },
              {
                "id": 83,
                "timezone_description": "(UTC+09:30) Adelaide",
                "timezone_id": "Australia/Adelaide",
              },
              {
                "id": 84,
                "timezone_description": "(UTC+10:00) Hobart",
                "timezone_id": "Australia/Hobart",
              },
              {
                "id": 85,
                "timezone_description": "(UTC+10:00) Yakutsk",
                "timezone_id": "Asia/Yakutsk",
              },
              {
                "id": 86,
                "timezone_description": "(UTC+10:00) Brisbane",
                "timezone_id": "Australia/Brisbane",
              },
              {
                "id": 87,
                "timezone_description": "(UTC+10:00) Guam, Port Moresby",
                "timezone_id": "Pacific/Port_Moresby",
              },
              {
                "id": 88,
                "timezone_description": "(UTC+10:00) Canberra, Melbourne, Sydney",
                "timezone_id": "Australia/Sydney",
              },
              {
                "id": 89,
                "timezone_description": "(UTC+11:00) Vladivostok",
                "timezone_id": "Asia/Vladivostok",
              },
              {
                "id": 90,
                "timezone_description": "(UTC+11:00) Solomon Islands, New Caledonia",
                "timezone_id": "Pacific/Guadalcanal",
              },
              {
                "id": 91,
                "timezone_description": "(UTC+12:00) Coordinated Universal Time+12",
                "timezone_id": "Etc/GMT-12",
              },
              {
                "id": 92,
                "timezone_description": "(UTC+12:00) Fiji, Marshall Islands",
                "timezone_id": "Pacific/Fiji",
              },
              {
                "id": 93,
                "timezone_description": "(UTC+12:00) Magadan",
                "timezone_id": "Asia/Magadan",
              },
              {
                "id": 94,
                "timezone_description": "(UTC+12:00) Auckland, Wellington",
                "timezone_id": "Pacific/Auckland",
              },
              {
                "id": 95,
                "timezone_description": "(UTC+13:00) Nuku'alofa",
                "timezone_id": "Pacific/Tongatapu",
              },
              {
                "id": 96,
                "timezone_description": "(UTC+13:00) Samoa",
                "timezone_id": "Pacific/Apia",
              }
            ];
          </script>


        </div>





      </div>
    </div>
  </div>
  <!-- [end] Select Visitor Timezone Modal -->





  <!-- [start] Select Currency Modal -->
  <div x-show="modal_currency" :class="modal_currency ? '' : 'hidden'" class="fixed z-100 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_currency = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div @click.away="modal_currency = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-gray-900 rounded-lg text-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full md:max-w-4xl md:w-10/12">
        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl mb-1 font-bold">Select Currency</p>

            <div @click="modal_currency = false" class="cursor-pointer z-50">
              <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>

          </div>


          <div x-data="load_currencies()">

            <form class="relative">
              <input x-ref="searchField" x-model="search" x-on:keydown.window.prevent.slash="$refs.searchField.focus()" type="search" class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 px-2" type="text" aria-label="Search" placeholder="Search" />
            </form>

            <div class="mt-5 md:mt-10 grid grid-cols-2 md:grid-cols-4 gap-4 h-3/6 max-h-96 overflow-y-auto">

              <template x-for="item in filteredCurrencies" :key="item.id">
                <div class="relative rounded-lg border-0 bg-white bg-opacity-20 px-3.5 py-2.5 shadow-sm flex items-center space-x-3 hover:bg-opacity-30 hover:border-gray-300 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-white">
                  <div class="flex-shrink-0">
                    <!-- <img class="h-6 w-6 rounded-full" src="" alt=""> -->
                  </div>

                  <div class="flex-1 min-w-0">
                    <a href="javascript:void(0);" class="focus:outline-none change-currency" @click="
                                                                                                  modal_currency = false 
                                                                                                  set_currency(item.currency_code, item.currency_symbol)
                                                                                                ">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-semibold text-white" x-text="item.currency_description"></p>
                      <p class="text-xs md:text-sm text-gray-300 truncate" x-text="item.currency_code.toUpperCase() + ' — ' + item.currency_symbol"></p>
                    </a>
                  </div>
                </div>
              </template>

            </div>

          </div>


          <script>
            function load_currencies() {
              return {
                search: "",
                myForData: sourceData,
                get filteredCurrencies() {
                  if (this.search === "") {
                    return this.myForData;
                  }
                  return this.myForData.filter((item) => {
                    return item.currency_code
                      .toLowerCase()
                      .includes(this.search.toLowerCase()) ||
                      item.currency_description
                      .toLowerCase()
                      .includes(this.search.toLowerCase())

                    ;
                  });
                },
              };
            }

            function set_currency(currency_code, currency_symbol) {

              // console.log(currency_code, currency_symbol);

              const data = {
                __cc: currency_code,
                __cs: currency_symbol,
                _token: '{{ csrf_token()  }}'
              };

              fetch("{{ route('change_currency') }}", {
                  method: 'POST', // or 'PUT'
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(data => {

                  // fetch coin price from coingecko api
                  fetch_coin_price();

                  // fetch scholars
                  fetch_scholars();

                  // change currency displayed
                  $('.display-selected-currency').text(currency_symbol + ' ' + currency_code.toUpperCase());

                })
                .catch((error) => {
                  console.error('Error:', error);
                });


            }
            // var sourceData2 =  fetch('http://127.0.0.1:8000/json/currencies')
            //                   .then((response) => response.json())
            //                   .then((responseData) => {
            //                     console.log ( JSON.stringify(responseData) );
            //                     return responseData;
            //                   });

            var sourceData = [{
              "id": 1,
              "currency_code": "btc",
              "currency_symbol": "₿",
              "currency_description": "Bitcoin"
            }, {
              "id": 2,
              "currency_code": "eth",
              "currency_symbol": "Ξ",
              "currency_description": "Ethereum"
            }, {
              "id": 3,
              "currency_code": "ltc",
              "currency_symbol": "Ł",
              "currency_description": "Litcoin"
            }, {
              "id": 4,
              "currency_code": "bch",
              "currency_symbol": "BCH",
              "currency_description": "Bitcoin Cash"
            }, {
              "id": 5,
              "currency_code": "bnb",
              "currency_symbol": "BNB",
              "currency_description": "Binance Coin"
            }, {
              "id": 6,
              "currency_code": "eos",
              "currency_symbol": "EOS",
              "currency_description": "EOS"
            }, {
              "id": 7,
              "currency_code": "xrp",
              "currency_symbol": "XRP",
              "currency_description": "XRP"
            }, {
              "id": 8,
              "currency_code": "xlm",
              "currency_symbol": "XLM",
              "currency_description": "Stellar"
            }, {
              "id": 9,
              "currency_code": "link",
              "currency_symbol": "LINK",
              "currency_description": "Chainlink"
            }, {
              "id": 10,
              "currency_code": "dot",
              "currency_symbol": "DOT",
              "currency_description": "Polkadot"
            }, {
              "id": 11,
              "currency_code": "yfi",
              "currency_symbol": "YFI",
              "currency_description": "yearn.finance"
            }, {
              "id": 12,
              "currency_code": "usd",
              "currency_symbol": "$",
              "currency_description": "United States Dollar"
            }, {
              "id": 13,
              "currency_code": "aed",
              "currency_symbol": "د.إ",
              "currency_description": "United Arab Emirates Dirham"
            }, {
              "id": 14,
              "currency_code": "ars",
              "currency_symbol": "$",
              "currency_description": "Argentine Peso"
            }, {
              "id": 15,
              "currency_code": "aud",
              "currency_symbol": "A$",
              "currency_description": "Australian Dollar"
            }, {
              "id": 16,
              "currency_code": "bdt",
              "currency_symbol": "৳",
              "currency_description": "Bangladeshi Taka"
            }, {
              "id": 17,
              "currency_code": "bhd",
              "currency_symbol": "BD",
              "currency_description": "Bahraini Dinar"
            }, {
              "id": 18,
              "currency_code": "bmd",
              "currency_symbol": "$",
              "currency_description": "Bermuda Dollar"
            }, {
              "id": 19,
              "currency_code": "brl",
              "currency_symbol": "R$",
              "currency_description": "Brazilian Real"
            }, {
              "id": 20,
              "currency_code": "cad",
              "currency_symbol": "$",
              "currency_description": "Canadian Dollar"
            }, {
              "id": 21,
              "currency_code": "chf",
              "currency_symbol": "CHF",
              "currency_description": "Swiss Franc"
            }, {
              "id": 22,
              "currency_code": "clp",
              "currency_symbol": "$",
              "currency_description": "Chilean Peso"
            }, {
              "id": 23,
              "currency_code": "cny",
              "currency_symbol": "¥",
              "currency_description": "Chinese Yuan"
            }, {
              "id": 24,
              "currency_code": "czk",
              "currency_symbol": "Kč",
              "currency_description": "Czech Koruna"
            }, {
              "id": 25,
              "currency_code": "dkk",
              "currency_symbol": "kr",
              "currency_description": "Danish Krone"
            }, {
              "id": 26,
              "currency_code": "eur",
              "currency_symbol": "€",
              "currency_description": "Euro"
            }, {
              "id": 27,
              "currency_code": "gbp",
              "currency_symbol": "£",
              "currency_description": "Pound Sterling"
            }, {
              "id": 28,
              "currency_code": "hkd",
              "currency_symbol": "$",
              "currency_description": "Hong Kong Dollar"
            }, {
              "id": 29,
              "currency_code": "huf",
              "currency_symbol": "Ft",
              "currency_description": "Hungarian Forint"
            }, {
              "id": 30,
              "currency_code": "idr",
              "currency_symbol": "Rp",
              "currency_description": "Indonesian Rupiah"
            }, {
              "id": 31,
              "currency_code": "ils",
              "currency_symbol": "₪",
              "currency_description": "ISraeli New Shekel"
            }, {
              "id": 32,
              "currency_code": "inr",
              "currency_symbol": "₹",
              "currency_description": "Indian Rupee"
            }, {
              "id": 33,
              "currency_code": "jpy",
              "currency_symbol": "¥",
              "currency_description": "Japanese Yen"
            }, {
              "id": 34,
              "currency_code": "krw",
              "currency_symbol": "¥",
              "currency_description": "South Korean Won"
            }, {
              "id": 35,
              "currency_code": "kwd",
              "currency_symbol": "د.ك",
              "currency_description": "Kuwaitei Dinar"
            }, {
              "id": 36,
              "currency_code": "lkr",
              "currency_symbol": "රු",
              "currency_description": "Sri Lankan Rupee"
            }, {
              "id": 37,
              "currency_code": "mmk",
              "currency_symbol": "K",
              "currency_description": "Myanmar Kyat"
            }, {
              "id": 38,
              "currency_code": "mxn",
              "currency_symbol": "Mex$",
              "currency_description": "Mexican Dollar"
            }, {
              "id": 39,
              "currency_code": "myr",
              "currency_symbol": "RM",
              "currency_description": "Malaysian Ringgit"
            }, {
              "id": 40,
              "currency_code": "ngn",
              "currency_symbol": "₦",
              "currency_description": "Nigerian Naira"
            }, {
              "id": 41,
              "currency_code": "nok",
              "currency_symbol": "kr",
              "currency_description": "Norwegian Krone"
            }, {
              "id": 42,
              "currency_code": "nzd",
              "currency_symbol": "$",
              "currency_description": "New Zealand Dollar"
            }, {
              "id": 43,
              "currency_code": "php",
              "currency_symbol": "₱",
              "currency_description": "Philippine Peso"
            }, {
              "id": 44,
              "currency_code": "pkr",
              "currency_symbol": "₨",
              "currency_description": "Pakistani Rupee"
            }, {
              "id": 45,
              "currency_code": "pln",
              "currency_symbol": "zł",
              "currency_description": "Polish złoty"
            }, {
              "id": 46,
              "currency_code": "rub",
              "currency_symbol": "₽",
              "currency_description": "Rissian Ruble"
            }, {
              "id": 47,
              "currency_code": "sar",
              "currency_symbol": "SR",
              "currency_description": "Saudi Riyal"
            }, {
              "id": 48,
              "currency_code": "sek",
              "currency_symbol": "kr",
              "currency_description": "Swedish Krona"
            }, {
              "id": 49,
              "currency_code": "sgd",
              "currency_symbol": "S$",
              "currency_description": "Singaporean Dollar"
            }, {
              "id": 50,
              "currency_code": "thb",
              "currency_symbol": "฿",
              "currency_description": "Thai Baht"
            }, {
              "id": 51,
              "currency_code": "try",
              "currency_symbol": "₺",
              "currency_description": "Turkish lira"
            }, {
              "id": 52,
              "currency_code": "twd",
              "currency_symbol": "NT$",
              "currency_description": "New Taiwan Dollar"
            }, {
              "id": 53,
              "currency_code": "uah",
              "currency_symbol": "₴",
              "currency_description": "Ukrainian hryvnia"
            }, {
              "id": 54,
              "currency_code": "vef",
              "currency_symbol": "Bs.S",
              "currency_description": "Venezualan bolívar"
            }, {
              "id": 55,
              "currency_code": "vnd",
              "currency_symbol": "₫",
              "currency_description": "Vietnamese dong"
            }, {
              "id": 56,
              "currency_code": "zar",
              "currency_symbol": "R",
              "currency_description": "South African Rand"
            }, {
              "id": 57,
              "currency_code": "xdr",
              "currency_symbol": "XDR",
              "currency_description": "Special Drawing Rights"
            }, {
              "id": 58,
              "currency_code": "xag",
              "currency_symbol": "XAG",
              "currency_description": "XAG"
            }, {
              "id": 59,
              "currency_code": "xau",
              "currency_symbol": "XAU",
              "currency_description": "XAU"
            }, {
              "id": 60,
              "currency_code": "bits",
              "currency_symbol": "$",
              "currency_description": "Bit"
            }, {
              "id": 61,
              "currency_code": "sats",
              "currency_symbol": "₿",
              "currency_description": "SAT "
            }];
          </script>


        </div>





      </div>
    </div>
  </div>
  <!-- [end] Select Currency Modal -->