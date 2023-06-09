<div class="bg-yellow-300 text-center py-4 lg:px-4">
  <div class="p-2 bg-gray-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
    <span class="flex rounded-full bg-gray-500 uppercase px-2 py-1 text-xs font-bold mr-3">NOTICE</span>
    <span class="font-semibold mr-2 text-left flex-auto">This Web App is under development expect some features not to work.</span>
    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
  </div>
</div>

  <div class="bg-gray-800 pb-32">



    <nav class="bg-gray-900 hidden md:block">

      <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
        <div class="border-b border-gray-700">

          <div class="flex items-center justify-between h-16 px-4 sm:px-0">

            <div></div>

            <div class="ml-4 flex items-center md:ml-6 pr-5">
                <div class="p-1">
                  <span @click="modal_currency = true" class="inline-flex items-center py-1.5 pl-2 pr-2 rounded-md font-bold text-sm text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change currency">
                    <span class="mr-3 display-selected-currency"><?php echo e($selected_currency_display); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </span>
                </div>
            </div>
            
          </div>

          
        </div>
      </div>

    </nav>


    <nav class="bg-gray-900">
      <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
        <div class="border-b border-gray-700">
          <div class="flex items-center justify-between h-16 px-4 sm:px-0">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <a href="/">
                  <img class="h-16 w-24" height="64px" width="96" src="https://res.cloudinary.com/mnoquiao/image/upload/v1626723746/axieandfriends.com/axieandfriends.com_logo.png" alt="axieandfriends.com logo">
                </a>
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="/" class="<?php echo e($active_page === 'index' ? 'bg-gray-700' : 'text-gray-300'); ?> text-white px-3 py-2 rounded-md text-sm font-medium" alt="Managers Tool">💼🛠️ Managers Tool</a>

                  <a href="/donate" class="<?php echo e($active_page === 'donate' ? 'bg-gray-700' : 'text-gray-300'); ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" alt="Buy Me a Coffee">❤️☕ Donate</a>

                  <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" alt="Report a bug">🐞 Bug Report</a> -->
                </div>
              </div>
            </div>
            <div class="hidden md:block">
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
            <div class="-mr-2 flex md:hidden">
              <!-- Mobile menu button -->
              <button 
              x-on:click="menu = ! menu"
              type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
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
      <div 
      :class="menu ? 'hidden' : 'block'" 
      class="border-b border-gray-700 md:hidden" id="mobile-menu">
        <div class="px-2 py-3 space-y-1 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
          <a href="/" class="<?php echo e($active_page === 'index' ? 'bg-gray-700' : 'text-gray-300'); ?> text-white block px-3 py-2 rounded-md text-base font-medium" alt="Managers Tool">💼🛠️ Managers Tool</a>

          <a href="/donate" class="<?php echo e($active_page === 'donate' ? 'bg-gray-700' : 'text-gray-300'); ?> text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" alt="Buy Me a Coffee">❤️☕ Donate</a>

          <!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" alt="Report a bug">🐞 Bug Report</a> -->
        </div>
        <div class="py-3 border-t border-gray-700">
          <!-- <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">Tom Cook</div>
              <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
            </div>
            <button class="ml-auto bg-gray-800 flex-shrink-0 p-1 text-gray-400 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
            </button>
          </div> -->
          <div class="mt-1 px-2 space-y-1">
                            
            <div class="w-auto flex justify-between mb-2 px-3 py-2">
              <div class="w-6/12 relative">
                  <div @click="modal_currency = true" class="flex w-full justify-center items-center px-2 py-3 rounded-md font-bold text-base text-gray-300 bg-gray-800 hover:bg-gray-700 hover:text-white cursor-pointer" title="Click to change currency">
                    <span class="mr-3 display-selected-currency"><?php echo e($selected_currency_display); ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                  </div>
              </div>
              <div></div>
            </div>

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
    </nav><?php /**PATH C:\wamp\www\Projects\Axie-and-Friends\resources\views/includes/header.blade.php ENDPATH**/ ?>