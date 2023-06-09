@extends('layouts.app')
@section('title', $page_title)

@section('page_meta')
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
@endsection

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

</div> <!-- [end] header -->

<main class="-mt-32">


    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(null !== session('manager_uniqid'))
        <div class="mb-2">
            <div class="header-2156113d0c9e8349782"></div>
        </div>
        @endif

        <!-- Replace with your content -->
        <div class="mb-4 md:mb-12 bg-gray-800 border border-gray-500 rounded-lg shadow space-y-8 px-5 py-6 sm:px-6">

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <div>
                            <a href="/" class="text-gray-400 hover:text-gray-500">
                                <!-- Heroicon name: solid/home -->
                                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                        </div>
                    </li>

                    <li class="pointer-events-none">
                        <div class="flex items-center">
                            <!-- Heroicon name: solid/chevron-right -->
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">

                            </a>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- [start] unclaimed summary -->`
            <div>
                <div class="text-center">
                    <h2 class="text-gray-200 text-2xl font-medium uppercase tracking-wide">
                        Gas Price(Gwei)
                    </h2>
                    <div class="text-gray-200 block font-normal text-xl">Based On Pending Transaction of ETH Mempool</div>
                </div>
                <ul class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    <li class="col-span-1 flex shadow-sm rounded-md">
                        <div class="flex-shrink-0 flex items-center justify-center w-16 border-l border-t border-b border-gray-500 bg-gray-600 text-green-500 text-2xl font-bold rounded-l-md">
                            US
                        </div>
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <span class="text-gray-200 font-medium text-base">
                                    <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                                    In-Game SLP
                                </span>

                                <div id="dash-unclaimed-slp">
                                    <p class="text-xl font-bold text-green-500">

                                    </p>
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
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
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
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <span class="text-gray-200 font-medium text-base">
                                    <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                                    Scholar Share
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
                            SS
                        </div>
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <span class="text-gray-200 font-medium text-base">
                                    <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block">
                                    Scholar Share
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

        </div>
        <!-- /End replace -->

    </div>



    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 space-y-5 sm:px-6 lg:px-8">

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border border-gray-500 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                                        Earnings
                                    </th>
                                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                                        Scholar Earnings
                                    </th>
                                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50 uppercase tracking-wider">
                                        Manager Earnings
                                    </th>
                                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-center font-medium text-gray-50 uppercase tracking-wider">
                                        🎯 Quota Hit Ratio
                                    </th>
                                    <th scope="col" class="whitespace-nowrap px-6 py-3 text-right font-medium text-gray-50 uppercase tracking-wider">
                                        Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Odd row -->


                                <tr class="bg-gray-800 bg-gray-900">
                                    <td class="px-6 py-4 font-medium text-gray-100">

                                    </td>
                                    <td class="px-6 py-4 text-gray-200">

                                    </td>
                                    <td class="px-6 py-4 text-gray-200">

                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-200">

                                    </td>
                                    <td class="whitespace-nowrap text-right px-6 py-4 text-gray-200">

                                    </td>
                                </tr>


                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection



@section('page_scripts')
<script>
    $(function() {

        $('#trezor-link').click(function(e) {
            window.location.href = "https://shop.trezor.io/product/trezor-one-white?offer_id=14&aff_id=8771";
        });

    });
</script>
@endsection