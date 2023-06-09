@extends('layouts.appv2')
@section('title', $page_title)

@section('page_styles')
@endsection



@section('main_content')
<main class="flex-1 bg-gray-100 dark:bg-gray-900">
    <div class="py-6">

      <div class="mx-auto px-4 sm:px-6 md:px-8">
          <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tracker</h1>
      </div>

      <div class="mx-auto px-4 sm:px-6 md:px-8">
        
        {{-- tags picker --}}
        <div class="mt-5">
            <div class="flex items-center justify-between">
                <div class="w-4/5">
                    @for ($i = 1; $i <= 10; $i++)
                        <span class="inline-flex items-center px-2.5 py-0.5 shadow rounded-md text-sm font-medium bg-gray-100 text-gray-800
                        dark:text-white dark:bg-gray-700 dark:border-gray-800
                        ">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-indigo-400" fill="currentColor" viewBox="0 0 8 8">
                            <circle cx="4" cy="4" r="3" />
                            </svg>
                            Tag {{ $i }}
                        </span>
                    @endfor
                </div>
                <div class="pl-2 flex flex-shrink-0 whitespace-nowrap text-right border-l border-dashed border-gray-300 dark:border-gray-500">

                    <button type="button" class="space-x-1 inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none dark:text-white dark:bg-gray-700 dark:border-gray-800 dark:hover:border-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span>Export (15000) on the list</span>
                    </button>

                </div>
            </div>
        </div>

        {{-- tracker --}}
        <div 
            x-data="{
            }
            "
            class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="whitespace-nowrap text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th colspan="4">
                        </th>
                        <th colspan="5" class="px-6 py-3 text-center border-dashed border-b border-l border-gray-200 dark:border-gray-600">
                            <div class="">SLP</div>
                        </th>
                        <th colspan="2" class="px-6 py-3 text-center border-dashed border-b border-l border-gray-200 dark:border-gray-600">
                            <div classs="">CLAIMS</div>
                        </th>
                    </tr>

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>SCHOLAR</span>

                                <div 
                                    x-data="{
                                        dm_scholars: false,
                                        toggle() {
                                            if (this.dm_scholars) {
                                                return this.close()
                                            }
                            
                                            this.$refs.button.focus()
                            
                                            this.dm_scholars = true
                                        },
                                        close(focusAfter) {
                                            if (! this.dm_scholars) return
                            
                                            this.dm_scholars = false
                            
                                            focusAfter && focusAfter.focus()
                                        }
                                    }"
                                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                    x-id="['dropdown-button']"
                                    class="relative inline-block text-left font-normal">
                                    <div
                                        x-ref="button"
                                        x-on:click="toggle()"
                                        :aria-expanded="dm_scholars"
                                        :aria-controls="$id('dropdown-button')" 
                                        class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                        </svg>
                                    </div>

                                    {{-- drop menu --}}
                                    <div 
                                        x-ref="panel"
                                        x-show="dm_scholars"
                                        x-transition.origin.top.left
                                        x-on:click.outside="close($refs.button)"
                                        :id="$id('dropdown-button')"
                                        style="display: none;"
                                        class="origin-top-right absolute right-0 mt-2 w-72 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100  focus:outline-none border dark:border-gray-700 dark:divide-gray-700 dark:bg-gray-800" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                        <div class="py-1" role="none">
                                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" role="menuitem" tabindex="-1" id="menu-item-0">Sort A ⇾ Z</a>
                                            <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" role="menuitem" tabindex="-1" id="menu-item-1">Sort Z ⇾ A</a>
                                        </div>

                                        {{-- filter by condition && value --}}
                                        <div 
                                            x-data="{ 
                                                filter_condition: false,
                                                filter_values: true,
                                                condition_from: false,
                                                condition_to: false,
                                            }"
                                            class="py-1" role="none">
                                            
                                            <a x-on:click="filter_condition = ! filter_condition" href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" role="menuitem" tabindex="-1" id="menu-item-2">
                                                <span x-show="!filter_condition">▷</span><span x-show="filter_condition">▽</span> Filter by condition
                                            </a>
                                            <div
                                                x-show="filter_condition"
                                                x-transition
                                                class="px-3 py-2">
                                                <select 
                                                    x-on:change="
                                                        if(parseInt($event.target.value) === 1) {
                                                            condition_from = true;
                                                            condition_to = false;
                                                        }
                                                        else if(parseInt($event.target.value) === 2) {
                                                            condition_from = true;
                                                            condition_to = true;
                                                        }
                                                        else {
                                                            condition_from = false;
                                                            condition_to = false;
                                                        }
                                                    "
                                                    id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md dark:text-white dark:bg-gray-600">
                                                    <optgroup>
                                                        <option value="0" data-condition="0">None</option>
                                                    </optgroup>
                                                    <optgroup>
                                                        <option value="1" data-condition="1">Greater than</option>
                                                        <option value="1" data-condition="2">Greater than or equal to</option>
                                                        <option value="1" data-condition="3">Less than</option>
                                                        <option value="1" data-condition="4">Less than or equal to</option>
                                                        <option value="1" data-condition="5">Is equal to</option>
                                                        <option value="1" data-condition="6">Is not equal to</option>
                                                        <option value="2" data-condition="7">Is between</option>
                                                        <option value="2" data-condition="8">Is not between</option>
                                                    </optgroup>
                                                </select>
                                                <div class="mt-2 hidden" :class="{ 'hidden': ! condition_from }">
                                                    <label for="condition_filter" class="sr-only">Filter by condition</label>
                                                    <input type="text" name="condition_filter" id="condition_filter" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md dark:text-white dark:bg-gray-600" placeholder="Value for condition">
                                                </div>
                                                <div class="mt-3 space-y-4 hidden" :class="{ 'hidden': ! condition_to }">
                                                    <p>and</p>
                                                    <label for="condition_filter2" class="sr-only">Filter by condition</label>
                                                    <input type="text" name="condition_filter2" id="condition_filter2" class="shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm border-gray-300 rounded-md dark:text-white dark:bg-gray-600" placeholder="Value for condition">
                                                </div>
                                            </div>

                                            <a x-on:click="filter_values = ! filter_values" href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600" role="menuitem" tabindex="-1" id="menu-item-2">
                                                <span x-show="!filter_values">▷</span><span x-show="filter_values">▽</span> Filter by values
                                            </a>
                                            <div
                                                x-show="filter_values"
                                                x-transition
                                                class="px-3 py-2">
                                                <div class="mt-1 relative rounded-md shadow-sm">
                                                    <input type="text" name="account-number" id="account-number" class="focus:ring-green-500 focus:border-green-500 block w-full pr-10 sm:text-sm border-gray-300 rounded-md dark:text-white dark:bg-gray-600" placeholder="">
                                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                        <!-- Heroicon name: outline/search -->
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                          </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-4 py-5">
                                            <div class="flex-1 flex justify-between sm:justify-end space-x-3">
                                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-base font-normal rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-800 dark:hover:border-white">Cancel</a>
                                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:text-white dark:bg-gray-700 dark:border-gray-800 dark:hover:border-white">OK</a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>AXIE</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>⚡</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>MMR</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>TODAY</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>YESTERDAY</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>AVG.</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>IN-GAME</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>RONIN</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>LAST</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center justify-between">
                                <span>NEXT</span>
                                <div class="px-0.5 py-1 rounded-sm hover:bg-gray-200 dark:hover:bg-gray-400 dark:text-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @for ($x = 1; $x < 10; $x++)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <div class="space-y-1">
                                <div class="">
                                    <span class="">AAF 00{{ $x }} - ABP | John Alchambert G. Lipata (👑 Lazo)</span>
                                </div>
                                <div class="text-gray-600 dark:text-gray-400 inline-flex space-x-1">
                                    <a href="#">
                                        {{ str_replace('ronin:', '0x', substr_replace('ronin:53495c9ab4d0057b78f858a92945cf3d4eca5400', '...', 9, 32)); }}
                                    </a>
                                    <div class="">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800"> Badge </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"> Badge </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> Badge </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800"> Badge </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-pink-100 text-pink-800"> Badge </span>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ rand(20,40) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(20,40) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ rand(1000,10000) }}
                        </td>
                        <td class="px-6 py-4">
                            14-Aug, 03:15 PM
                        </td>
                        <td class="px-6 py-4">
                            14-Sep, 03:15 PM
                        </td>                        
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>

      </div>

    </div>
</main>
@endsection



@section('page_scripts')
<script>
    $(document).ready( function () {
        // $('#tracker').DataTable();
    } );

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