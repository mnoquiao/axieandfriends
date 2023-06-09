<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title') | axieandfriends.com</title>
  <meta name="description" content="{{ $description ?? '' }}">
  <link rel="canonical" href="{{ $canonical ?? '' }}" />
  @yield('page_meta')
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="coinzilla" content="76e4499a6b5acb9bd87ab7235c4c99e6" />

  <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/apple-icon-57x57.png') }}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/apple-icon-60x60.png') }}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-icon-72x72.png') }}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon-76x76.png') }}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-icon-114x114.png') }}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/apple-icon-120x120.png') }}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/apple-icon-144x144.png') }}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/apple-icon-152x152.png') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-icon-180x180.png') }}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-icon-192x192.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon-96x96.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('img/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('img/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  <!-- Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> -->

  <!-- global css -->
  @include('head')
  <!--  -->
  <!--  -->

  <!-- in-page styles -->
  @yield('page_styles')
  <!--  -->
  <!--  -->

  <!-- Header Banner -->
  <script src="https://coinzillatag.com/lib/header.js"></script>
  <script>
    window.coinzilla_header = window.coinzilla_header || [];

    function czilla() {
      coinzilla_header.push(arguments);
    }
    czilla('2156113d0c9e8349782');
  </script>

  <!-- Sticky Banner (STICKY) -->
  <!-- <script src="https://coinzillatag.com/lib/sticky.js"></script>
  <script>
    window.coinzilla_sticky = window.coinzilla_sticky || [];

    function czilla() {
      coinzilla_sticky.push(arguments);
    }
    czilla('122610f60b639ab2479');
  </script> -->

</head>


<body 
  x-data="{
    'darkMode': false
  }
  "
  x-init="
    darkMode = localStorage.getItem('env_mode') == null ? false : JSON.parse(localStorage.getItem('env_mode'));
    $watch('darkMode', value => localStorage.setItem('env_mode', JSON.stringify(value)))
  "
  :class="{'dark': darkMode === true}"
  class="h-full overflow-hidden">

<div 
    class="h-full flex"
    x-data="{
      open: false,
      toggle() {
          if (this.open) {
              return this.close()
          }

          this.open = true
      },
      close(focusAfter) {
          if (! this.open) return

          this.open = false

          focusAfter && focusAfter.focus()
      }
  }"
  x-on:keydown.escape.prevent.stop="close($refs.button)"
  x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
  x-id="['dropdown-button']"
>

    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="fixed inset-0 flex z-40 hidden lg:hidden" role="dialog" aria-modal="true">
      <!--
        Off-canvas menu overlay, show/hide based on off-canvas menu state.
  
        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
  
      <!--
        Off-canvas menu, show/hide based on off-canvas menu state.
  
        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
      <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none">
        <!--
          Close button, show/hide based on off-canvas menu state.
  
          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="absolute top-0 right-0 -mr-12 pt-2">
          <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <span class="sr-only">Close sidebar</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
          <div class="flex-shrink-0 flex items-center justify-center px-4">
            {{-- <img class="h-10 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/e_trim/v1648102990/axieandfriends.com/logo/logo2_with_border.png" alt="axieandfriends logo"> --}}
          </div>
          <nav aria-label="Sidebar" class="mt-5">
            <div class="px-2 space-y-1">
              <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
              <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!--
                  Heroicon name: outline/home
  
                  Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
                -->
                <svg class="text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
              </a>
  
              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/calendar -->
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Calendar
              </a>
  
              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/user-group -->
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Teams
              </a>
  
              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/search-circle -->
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Directory
              </a>
  
              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/speakerphone -->
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                </svg>
                Announcements
              </a>
  
              <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                <!-- Heroicon name: outline/map -->
                <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Office Map
              </a>
            </div>
          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
          <a href="#" class="flex-shrink-0 group block">
            <div class="flex items-center">
              <div>
                <img class="inline-block h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
              </div>
              <div class="ml-3">
                <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">Whitney Francis</p>
                <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">View profile</p>
              </div>
            </div>
          </a>
        </div>
      </div>
  
      <div class="flex-shrink-0 w-14" aria-hidden="true">
        <!-- Force sidebar to shrink to fit close icon -->
      </div>
    </div>
  
    <!-- Static sidebar for desktop -->
    <div class="hidden lg:flex lg:flex-shrink-0">
      <div class="flex flex-col w-72">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex-1 flex flex-col min-h-0 border-r border-gray-600 bg-gray-900">

          <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex flex-shrink-0 px-4">
              <img class="h-10 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/e_trim/v1648102988/axieandfriends.com/logo/logo2_no_border.png" alt="axieandfriends logo">
            </div>

            <nav class="mt-5 flex-1 border-t border-gray-700" aria-label="Sidebar">

              <div class="px-4 pt-4 pb-4 space-y-1 bg-gray-800 mb-5">
                <div class="flex justify-between items-center">
                  <div>
                      <div class="flex items-center space-x-2 text-gray-200">
                      <img class="h-5 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/AXS.webp" alt="" srcset="">
                      <span class="font-bold text-lg">0.007<small class="font-thin text-xs">USD</small></span>
                      </div>
                  </div>
                  <div>
                      <div class="flex items-center space-x-2 text-gray-200">
                      <img class="h-5 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="" srcset="">
                      <span class="font-bold text-lg">0.007<small class="font-thin text-xs">USD</small></span>
                      </div>
                  </div>
                </div>
              </div>

              <div class="px-2 space-y-1">

                {{-- dashboard link --}}
                <a href="{{  route('newdash') }}" class="
                  @if ($active_menu === 'dashboard')
                    bg-gray-700 text-green-400
                  @else 
                    text-gray-400 hover:bg-gray-700
                  @endif
                   group flex items-center px-2 py-2 text-base font-medium rounded-md">
                  {{-- <svg class="text-green-400 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                  </svg> --}}
                  <span class="group-hover:text-green-400 mr-3 h-6 w-6 text-xl">📈</span>
                  Dashboard
                </a>

                {{-- tracker link --}}
                <a href="{{ route('tracker') }}" class="
                  @if ($active_menu === 'tracker')
                    bg-gray-700 text-green-400
                  @else 
                    text-gray-400 hover:bg-gray-700
                  @endif
                  group flex items-center px-2 py-2 text-base font-medium rounded-md">
                  {{-- <svg class="text-gray-400 group-hover:text-green-400 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                  </svg> --}}
                  <span class="group-hover:text-green-400 mr-3 h-6 w-6 text-xl">🔎</span>
                  Tracker
                </a>
                
                {{-- scholars link --}}
                <a href="{{ route('scholars') }}" class="
                  @if ($active_menu === 'scholars')
                    bg-gray-700 text-green-400
                  @else 
                    text-gray-400 hover:bg-gray-700
                  @endif
                  group flex items-center px-2 py-2 text-base font-medium rounded-md">
                  {{-- <svg class="text-gray-400 group-hover:text-green-400 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                  </svg> --}}
                  <span class="group-hover:text-green-400 mr-3 h-6 w-6 text-xl">🎓</span>
                  Scholars
                </a>
                                   
                {{-- tools link --}}
                <a href="{{ route('settings') }}" class="
                  @if ($active_menu === 'settings')
                    bg-gray-700 text-green-400
                  @else 
                    text-gray-400 hover:bg-gray-700
                  @endif
                  group flex items-center px-2 py-2 text-base font-medium rounded-md">
                    {{-- <svg class="text-gray-400 group-hover:text-green-400 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path d="M12 14l9-5-9-5-9 5 9 5z" />
                      <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg> --}}
                    <span class="group-hover:text-green-400 mr-3 h-6 w-6 text-xl">⚒️</span>
                    Settings
                </a>

              </div>
            </nav>
          </div>
          <div class="flex-shrink-0 flex border-t border-gray-600 p-4">
            <a href="#" class="flex-shrink-0 w-full group block">
              <div class="flex justify-between items-center">
                <div>
                    <div class="flex items-center space-x-2 text-gray-200">
                    <img class="h-5 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/AXS.webp" alt="" srcset="">
                    <span class="font-bold text-lg">0.007<small class="font-thin text-xs">USD</small></span>
                    </div>
                </div>
                <div>
                    <div class="flex items-center space-x-2 text-gray-200">
                    <img class="h-5 w-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="" srcset="">
                    <span class="font-bold text-lg">0.007<small class="font-thin text-xs">USD</small></span>
                    </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    
    <div class="flex flex-col min-w-0 flex-1 overflow-y-scroll dark:bg-gray-700">

      @include('includesv2.static-menu')

    <!--                                    -->
    <!--    main content (pages)            -->
    @yield('main_content')
    <!--                                    -->
    </div>

    {{-- alternative main content --}}
    {{-- <div class="flex flex-col min-w-0 flex-1 overflow-hidden">

      <div class="lg:hidden">
        <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5">
          <div>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
          </div>
          <div>
            <button type="button" class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900">
              <span class="sr-only">Open sidebar</span>
              <!-- Heroicon name: outline/menu -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      
      <div class="flex-1 relative z-0 flex overflow-hidden">
        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
          <!-- Start main area-->
          <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
            <div class="h-full border-2 border-gray-200 border-dashed rounded-lg">
                is this the main area?
            </div>
          </div>
          <!-- End main area -->
        </main>
        <aside class="hidden relative xl:order-first xl:flex xl:flex-col flex-shrink-0 w-96 border-r border-gray-200 overflow-y-auto">
          <!-- Start secondary column (hidden on smaller screens) -->
          <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">
            <div class="h-full border-2 border-gray-200 border-dashed rounded-lg">
                is this the secondary area?
            </div>
          </div>
          <!-- End secondary column -->
        </aside>
      </div>
    </div> --}}

  </div>
  

  <!--                                    -->
  <!--    global js scripts               -->
  @include('scripts')
  <!--                                    -->



  <!--                                    -->
  <!--    in-page js scripts              -->
  @yield('page_scripts')
  <!--                                    -->

</body>
</html>