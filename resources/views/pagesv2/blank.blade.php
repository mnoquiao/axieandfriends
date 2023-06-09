@extends('layouts.appv2')
@section('title', $page_title)

@section('page_styles')
@endsection



@section('main_content')
<main class="flex-1 bg-gray-100 dark:bg-gray-900">
    <div class="py-6">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Blank</h1>
    </div>
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div class="py-4">
        <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">

        </div>
        </div>
        <!-- /End replace -->
    </div>
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