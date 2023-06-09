  <!-- [start] Customize SLP Price Modal -->
  <div x-show="modal_customize_slp_price" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" :class="modal_customize_slp_price ? '' : 'hidden'" class="fixed z-10 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_customize_slp_price = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
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
      <div @click.away="modal_customize_slp_price = false" class="inline-block align-bottom text-white border border-gray-500 bg-gray-700 text-left rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl font-bold">
              Customize SLP Price
              <a x-show="sort_by > 0" @click="sort_by = 0, localStorage.setItem('sort_by', 0)" href="javascript:void(0)" class="font-medium text-base text-blue-500 hover:text-blue-600 inline-block">
                (Reset Default)
              </a>
            </p>

            <div @click="modal_customize_slp_price = false" class="cursor-pointer z-50">
              <svg class="fill-current text-gray-200 hover:text-gray-50" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>

          </div>

          <p class="-mt-1 text-lg text-gray-300">You can set SLP price instead of using the default current market price.</p>

          <!-- form -->
          <form id="customize-slp-price-form">
            @csrf()



            <!-- customize slp -->
            <fieldset x-data="{
                slp_currency_symbol: localStorage.getItem('curr_symbol'),
                slp_current_market_price: localStorage.getItem('current_slp_price'),
                slp_opt1_plus: null,
                slp_opt1_minus: null,
                slp_opt2: null,

              }">
              <legend class="sr-only">
                Customize SLP Price
              </legend>

              <div class="flex justify-between">
                <div class="bg-gray-600 hover:bg-gray-900 px-4 py-3 rounded-lg inline-flex mt-5">
                  Current Market Price:
                  <sub x-text="slp_currency_symbol" class="ml-1"></sub>
                  <span x-text="slp_current_market_price"></span>
                </div>

                <div class="bg-gray-600 hover:bg-gray-900 px-4 py-3 rounded-lg inline-flex mt-5">
                  Your Price:
                  <sub x-text="slp_currency_symbol" class="ml-1"></sub>
                  <span x-text="
                  (
                    (slp_opt1_plus == null && slp_opt1_minus == null && slp_opt2 == null) 
                    ? slp_current_market_price 
                    : (
                      (slp_opt2 != null && slp_opt2 > 0) 
                      ? slp_opt2.toFixed(2)
                      : (
                        ((slp_opt1_plus != null || slp_opt1_minus != null) && (slp_opt1_plus > 0 || slp_opt1_minus > 0 ))
                        ? (slp_current_market_price - slp_opt1_minus + slp_opt1_plus).toFixed(2)
                        : slp_current_market_price
                        )
                      )
                  )
                  "></span>
                </div>
              </div>

              <div class="mt-1 sm:mt-2 space-y-6 sm:space-y-5">

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-500 sm:pt-5">

                  <label for="" class="block text-base font-medium text-gray-300 sm:mt-px sm:pt-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-yellow-100 text-yellow-700">OPTION 1</span>
                    <br>Current market price<br>(<em>Add</em> or <em>Minus</em>)
                  </label>

                  <div class="mt-1 sm:mt-0 sm:col-span-2 flex justify-between">

                    <div class="mt-1 relative rounded-md shadow-sm pr-2">
                      <input x-model.number="slp_opt1_plus" @keyup="slp_opt1_minus = null, slp_opt2 = null" type="text" name="slp_market_price_plus" class="max-w-lg block w-full rounded-md px-3 pr-14 text-white bg-gray-900 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00" aria-describedby="price-currency">
                      <div class="absolute inset-y-0 right-1 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                          Add (+)
                        </span>
                      </div>
                    </div>

                    <div class="mt-1 relative rounded-md shadow-sm pr-2">
                      <input x-model.number="slp_opt1_minus" @keyup="slp_opt1_plus = null, slp_opt2 = null" type="text" name="slp_market_price_minus" class="max-w-lg block w-full rounded-md px-3 pr-16 text-white bg-gray-900 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00" aria-describedby="price-currency">
                      <div class="absolute inset-y-0 right-1 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm" id="price-currency">
                          Minus (-)
                        </span>
                      </div>
                    </div>

                  </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-500 sm:pt-5">

                  <label for="" class="block text-base font-medium text-gray-300 sm:mt-px sm:pt-2">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-yellow-100 text-yellow-700">OPTION 2</span>
                    <br>Set your own price
                  </label>

                  <div class="mt-1 sm:mt-0 sm:col-span-2 flex">

                    <div class="mt-1 relative rounded-md shadow-sm pr-2">
                      <input x-model.number="slp_opt2" @keyup="slp_opt1_plus = null, slp_opt1_minus = null" type="text" name="slp_custom_price" class="max-w-lg block w-full rounded-md px-3 py-3 text-white bg-gray-900 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="0.00" aria-describedby="price-currency">
                    </div>

                  </div>

                </div>


              </div>

            </fieldset>

          </form>
        </div>

        <div class="px-4 pt-5 pb-4 bg-gray-800 text-right sm:p-6 space-x-1.5">
          <button @click="modal_customize_slp_price = false" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Cancel
          </button>
          <button type="submit" id="sbt-customize-slp-price-form" form="customize-slp-price-form" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Save
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Customize SLP Price Modal -->



  <!-- [start] Sort/Filter Modal -->
  <div class="fixed z-10 inset-0 overflow-y-auto axie-hidden-by-default"
      x-show="modal_sort_filter" 
      x-transition:enter="transition ease-out duration-300" 
      x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
      x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
      x-transition:leave="transition ease-in duration-300" 
      x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
      x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
      :class="modal_sort_filter ? '' : 'hidden'"  
      aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_sort_filter = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100" 
        x-transition:leave="ease-in duration-200" 
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0"
        aria-hidden="true">&#8203;</span>

      <!--
        Modal panel, show/hide based on modal state.
      -->
      <div class="inline-block align-bottom text-white border border-gray-500 bg-gray-700 text-left rounded-lg overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full"
          @click.away="modal_sort_filter = false"    
          x-transition:enter="ease-out duration-300" 
          x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
          x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
          x-transition:leave="ase-in duration-200" 
          x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
          x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      ">

        <!-- Add margin if you want to see some of the overlay behind the modal-->
        <div class="modal-content text-left py-10 px-6">

          <!--Title-->
          <div class="flex justify-between items-center pb-3">

            <p class="text-2xl font-bold">
              Sort and Filter
              <a x-show="sort_by > 0" @click="sort_by = 0, localStorage.setItem('sort_by', 0)" href="javascript:void(0)" class="font-medium text-base text-blue-500 hover:text-blue-600 inline-block" id="btn-reset-sort-and-filter">
                (Reset Default)
              </a>
            </p>

            <div @click="modal_sort_filter = false" class="cursor-pointer z-50">
              <svg class="fill-current text-gray-200 hover:text-gray-50" xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 18 18">
                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
              </svg>
            </div>

          </div>

          <!-- form -->
          <form id="sort-scholar-form">
            @csrf()



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
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> In-Game
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
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> In-Game
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 9, localStorage.setItem('sort_by', 9)" :class="sort_by == 9 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="9" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Avg.
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 10, localStorage.setItem('sort_by', 10)" :class="sort_by == 10 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="10" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Avg.
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 11, localStorage.setItem('sort_by', 11)" :class="sort_by == 11 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="11" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Today
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 12, localStorage.setItem('sort_by', 12)" :class="sort_by == 12 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="12" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Today
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 13, localStorage.setItem('sort_by', 13)" :class="sort_by == 13 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="13" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Yesterday
                        </p>
                      </div>
                    </div>
                    <!-- Checked: "border-indigo-500", Not Checked: "border-transparent" -->
                    <div class="border-transparent absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                  </label>
                </div>

                <div class="mr-2 mt-3">
                  <label @click="sort_by = 14, localStorage.setItem('sort_by', 14)" :class="sort_by == 14 ? 'text-white border-blue-500  bg-blue-600 hover:border-gray-400' : 'text-gray-600 border-gray-100  bg-gray-100 hover:border-gray-400'" class="inline-flex items-center px-5 py-1.5 border text-sm font-medium rounded-3xl shadow-sm cursor-pointer focus:outline-none focus-within:ring-blue-500 focus-within:bg-blue-600 focus-within:text-white">
                    <input type="radio" name="sortBy" value="14" class="sr-only" aria-labelledby="sortBy-0-label" aria-describedby="sortBy-0-description-0 sortBy-0-description-1">
                    <div class="flex items-center">
                      <div class="text-lg">
                        <p id="sortBy-0-label" class="font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                          </svg>
                          <img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" class="w-6 h-6 items-center inline-block" alt="SLP"> Yesterday
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
  <div x-show="modal_add" :class="modal_add ? '' : 'hidden'" class="fixed z-100 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_add = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

      <div x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="modal_add = false" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">


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

            @csrf()

            <div x-data="{ scholar_share: 0, investor_share: 0, manager_share: 100 }" class="space-y-5 sm:space-y-3">
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
                    <input type="text" name="roninaddr" id="ronin-addr" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="ronin:xxxx" maxlength="46" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Scholar Name<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <input type="text" name="scholarname" id="scho-name" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="e.g. John Doe" maxlength="255" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    🎓 Scholar Share (%)
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input x-model.number="scholar_share" type="number" name="schoshare" id="scho-share" min="0" max="100" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="invs-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    🤝 Investor Share (%)
                    <em class="text-gray-600 block text-xs"><strong>Optional:</strong> You can allocate share if you have partner or investor.</em>
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input x-model.number="investor_share" type="number" name="invshare" id="invs-share" min="0" max="100" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    👨‍💼 Manager Share (%)
                    <em class="text-gray-600 block text-xs"><strong>(Auto Compute)</strong></em>
                  </label>
                  <div class="mt-1 relative">
                    <span x-text="manager_share - (scholar_share + investor_share) + '%'" :class="(manager_share - (scholar_share + investor_share)) < 0 ? 'text-red-500' : ''" class="font-medium"></span>
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


        <div class="px-4 pt-5 pb-4 bg-gray-50 text-right sm:p-6 space-x-1.5">
          <button @click="modal_add = false" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Cancel
          </button>
          <button type="submit" id="sbt-add-scholar-form" form="add-scholar-form" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Save
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Adding Scholar Modal -->



  <!-- [start] Editing Scholar Modal -->
  <div x-show="modal_edit" :class="modal_edit ? '' : 'hidden'" class="fixed z-100 inset-0 overflow-y-auto axie-hidden-by-default" aria-labelledby="modal-title" role="dialog" aria-modal="true" hidden>

    <div @click.away="modal_edit = false" class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

      <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

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
            @csrf()

            <div x-data="{ scholar_share: 0, investor_share: 0, manager_share: 100 }" class="space-y-5 sm:space-y-3">
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
                    <input type="text" name="scholar_name" id="edit-scho-name" min="0" max="100" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="e.g. John Doe" maxlength="" required="required">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="edit-scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    🎓Scholar Share (%)<span class="text-red-500">*</span>
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input x-model.number="scholar_share" type="number" name="scholar_share" id="edit-scho-share" min="0" max="100" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="invs-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    🤝 Investor Share (%)
                    <em class="text-gray-600 block text-xs"><strong>Optional:</strong> You can allocate share if you have partner or investor.</em>
                  </label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <input x-model.number="investor_share" type="number" name="investor_share" id="edit-invs-share" min="0" max="100" autocomplete="off" class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md" placeholder="%">
                  </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                  <label for="scho-share" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    👨‍💼 Manager Share (%)
                    <em class="text-gray-600 block text-xs"><strong>(Auto Compute)</strong></em>
                  </label>
                  <div class="mt-1 relative">
                    <span id="edit-manager-share" x-text="manager_share - (scholar_share + investor_share) + '%'" :class="(manager_share - (scholar_share + investor_share)) < 0 ? 'text-red-500' : ''" class="font-medium"></span>
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


        <div class="px-4 pt-5 pb-4 bg-gray-50 text-right sm:p-6 space-x-1.5">
          <button @click="modal_edit = false" id="cancel-edit-scholar-form" type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Cancel
          </button>
          <button type="submit" id="sbt-edit-scholar-form" form="edit-scholar-form" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Save
          </button>
        </div>

      </div>
    </div>
  </div>
  <!-- [end] Editing Scholar Modal -->