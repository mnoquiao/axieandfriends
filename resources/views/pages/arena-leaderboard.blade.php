@extends('layouts.app')
@section('title', $page_title)

@section('page_meta')
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

    @include('pages.adsense')
</div> <!-- [end] header -->

<main class="-mt-32">


    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Replace with your content -->
        <div class="mb-4 md:mb-12 bg-gray-800 border text-gray-50 border-gray-500 rounded-lg shadow py-6 px-5 sm:px-6">

            <!-- [start] title summary -->
            <div class="space-y-2">
                <h1 class="text-gray-50 text-2xl font-medium mb-2">
                    ⚔️ Axie Infinity Arena Leaderboard
                </h1>
                <div class="text-gray-200 block font-normal">
                    Listed here are the official top 1000 ranked players of Axie Infinity Arena Battle or PVP.
                </div>
                <div>
                    <span class="font-bold">NEXT SEASON 19:</span> No announcement yet.
                </div>
            </div>
            <!-- [end] title summary -->

        </div>
        <!-- /End replace -->

    </div>



    <div class="max-w-screen-sm md:max-w-screen-2xl mx-auto pb-12 px-4 space-y-5 sm:px-6 lg:px-8">

         <div class="grid justify-items-end mt-2">
            <div class="relative inline-flex shadow-sm rounded-md justify-self-end">
                <span class="text-gray-200 text-sm mt-2">
                    Last update: <strong>{{ $last_update }}</strong>
                </span>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border border-gray-500 sm:rounded-lg">
                        <table class="relative min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="sticky top-0 whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50">
                                        🏆 Rank
                                    </th>
                                    <th scope="col" class="sticky top-0 whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50">
                                        IGN
                                    </th>
                                    <th scope="col" class="sticky top-0 whitespace-nowrap px-6 py-3 text-left font-medium text-gray-50">
                                        ⚔️ Elo
                                    </th>
                                    <th scope="col" class="sticky top-0 whitespace-nowrap px-6 py-3 text-center font-medium text-gray-50">
                                        Total Wins
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($leaderboard as $k => $player)
                                <!-- Odd/Even row -->
                                <tr class="{{ ($k % 2 == 0) ? 'bg-gray-800' : 'bg-gray-900' }}">
                                    <td class="px-6 py-4 font-medium text-gray-100">
                                        #{{ $k + 1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ $player->axie_marketplace_link }}" target="_blank" class="font-bold text-gray-200 hover:text-gray-100 hover:underline" title="View on Axie Marketplace">
                                            {{ $player->ign }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-gray-200">
                                        {{ $player->mmr }}
                                    </td>
                                    <td class="px-6 py-4 text-center text-gray-200">
                                        {{ $player->win_total }}
                                    </td>
                                </tr>
                                <!-- More people... -->
                                @endforeach
                                
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


    $('#example').DataTable();
});
</script>
@endsection