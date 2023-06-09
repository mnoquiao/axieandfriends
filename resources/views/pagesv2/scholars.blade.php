@extends('layouts.appv2')
@section('title', $page_title)

@section('page_styles')
@endsection



@section('main_content')
<main class="flex-1 bg-gray-100 dark:bg-gray-900">
    <div class="py-6">

      <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">
          <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Scholars</h1>
      </div>

      <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">
        
        {{-- tracker --}}
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Scholar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            MMR/ELO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SLP TODAY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SLP YESTERDAY
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SLP AVG.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SLP IN-GAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SLP RONIN
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
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