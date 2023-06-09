<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!--                -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- global script will run here -->
<script>
  var xhr;

  // fetching scho
  function fetch_scholars() {

    // fetch scholars
    fetch("{{ route('fetch_scholars') }}")
      .then(res => res.json())
      .then((data) => {

        // var handles
        var scholars_loaded_data = '',
          scholars_loaded_data_mobile = '',
          scholars_loaded_data_table = '',
          claimable_notice;

        // display this if manager/visitor has no scholar
        function alert_no_scholar() {

          scholars_loaded_data = '<div class="text-center">' +
            '<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />' +
            '</svg>' +
            '<h3 class="mt-2 text-lg font-medium text-gray-400">No Scholars</h3>' +
            '<p class="mt-1 text-base text-gray-500">' +
            'Get started by adding a new scholar.' +
            '</p>' +
            '</div>';

          scholars_loaded_data_mobile = scholars_loaded_data;
          scholars_loaded_data_table = scholars_loaded_data;

          document.querySelector('#dash-scholars').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';

          document.querySelector('#dash-avg-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-avg-slp-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';
          document.querySelector('#dash-unclaimed-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-unclaimed-slp-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';

          // profits
          document.querySelector('#dash-unclaimed-slp-m').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-unclaimed-slp-m-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';
          document.querySelector('#dash-unclaimed-slp-s').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-unclaimed-slp-s-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';
          document.querySelector('#dash-ronin-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-ronin-slp-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';

          // Profits Summary
          document.querySelector('#dash-estimated-today-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-estimated-today-slp-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';
          document.querySelector('#dash-estimated-yesterday-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">0</p>';
          document.querySelector('#dash-estimated-yesterday-slp-curr').innerHTML = '<p class="text-sm text-gray-400">N/A</p>';

          // load scholars display
          document.querySelector('#scholars-list-wrapper').innerHTML = scholars_loaded_data;
          document.querySelector('#scholars-list-wrapper-mobile').innerHTML = scholars_loaded_data_mobile;
          document.querySelector('#scholars-list-table').innerHTML = '<tr><td colspan="8"><div class="flex justify-center p-10">' + scholars_loaded_data_table + '</div></td></tr>';

        }


        // check for blank scholars
        if (data.hasOwnProperty('failed')) {

          alert_no_scholar();

        }
        // check for blank scholars (for existing manager's)
        else if (data.sch_d.length == 0) {

          alert_no_scholar();

        } else {

          // console.log('Output: ', data);

          // clear scholars list
          document.querySelector('#scholars-list-wrapper').innerHTML = "";
          document.querySelector('#scholars-list-wrapper-mobile').innerHTML = "";
          document.querySelector('#scholars-list-table').innerHTML = "";

          // iterate scholar results
          Object.entries(data.sch_d).forEach(([key, resobj]) => {

            let qhr_classes;
            if (resobj.qhr < 70) {
              qhr_classes = "bg-red-500 text-white";
            } else if (resobj.qhr >= 70 && resobj.qhr < 76) {
              qhr_classes = "bg-red-300 text-red-900";
            } else if (resobj.qhr >= 76 && resobj.qhr < 80) {
              qhr_classes = "bg-yellow-400 text-gray-700";
            } else if (resobj.qhr >= 80 && resobj.qhr < 90) {
              qhr_classes = "bg-green-400";
            } else if (resobj.qhr >= 90) {
              qhr_classes = "bg-green-500 text-white";
            }

            let today_classes;
            if (resobj.today_slp <= 0) {
              today_classes = "text-gray-400";
            } else if (resobj.today_slp < 70) {
              today_classes = "text-red-300";
            } else if (resobj.today_slp < 100) {
              today_classes = "text-yellow-300";
            } else if (resobj.today_slp >= 100) {
              today_classes = "text-green-300";
            }

            let yesterday_classes;
            if (resobj.yesterday_slp <= 0) {
              yesterday_classes = "text-gray-400";
            } else if (resobj.yesterday_slp < 70) {
              yesterday_classes = "text-red-300";
            } else if (resobj.yesterday_slp < 100) {
              yesterday_classes = "text-yellow-300";
            } else if (resobj.yesterday_slp >= 100) {
              yesterday_classes = "text-green-300";
            }

            let avg_slp_classes;
            if (resobj.avg_slp <= 0) {
              avg_slp_classes = "text-gray-400";
            } else if (resobj.avg_slp < 70) {
              avg_slp_classes = "text-red-300";
            } else if (resobj.avg_slp < 100) {
              avg_slp_classes = "text-yellow-300";
            } else if (resobj.avg_slp >= 100) {
              avg_slp_classes = "text-green-300";
            }

            let mmr_classes;
            if (resobj.mmr <= 1000) {
              mmr_classes = "text-red-400";
            } else if (resobj.mmr <= 1100) {
              mmr_classes = "text-yellow-300";
            } else if (resobj.mmr <= 1200) {
              mmr_classes = "text-gray-300";
            } else if (resobj.mmr <= 1500) {
              mmr_classes = "text-green-200";
            } else if (resobj.mmr <= 2000) {
              mmr_classes = "text-green-300";
            } else if (resobj.mmr <= 2500) {
              mmr_classes = "text-green-400";
            } else if (resobj.mmr > 2500) {
              mmr_classes = "text-green-500 text-xl";
            }
            
            
            // usually if the unique link is copy & paste localstorage file of manager's unique id is not yet present
            // we do this once so have it save on the user's browser local storage
            if (localStorage.getItem(`m_uniqid`) == null) {

              // set manager's locstorage identifier
              localStorage.setItem(`m_uniqid`, resobj.m_uniqid);

              // set page url
              window.history.pushState("", "📜 Scholar Tracker — Axie Infinity | axieandfriends.com", "/m/" + data['mng_d']['unique_identifier']);

              $('#empty-unique-link-wrapper').html('<div x-data="{show_personal_link: true, hide_personal_link: false }" class="w-full">' +
                '<label for="uniqlink" class="text-xs font-medium  text-gray-500 md:text-sm">YOUR SHAREABLE LINK</label>' +

                '<span x-show="show_personal_link" @click="show_personal_link = false, hide_personal_link = true" class="inline-flex select-none justify-end ml-2 cursor-pointer align-middle  bg-gray-50 rounded-full px-2.5 py-1 font-bold text-sm text-gray-900 hover:bg-gray-400" title="Hide my personal link.">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />' +
                  '</svg>' +
                  'Hide' +
                '</span>' +

                '<span x-show="hide_personal_link" @click="show_personal_link = true, hide_personal_link = false" class="inline-flex select-none justify-end ml-2 cursor-pointer align-middle  bg-gray-50 rounded-full px-2.5 py-1 font-bold text-sm text-gray-900 hover:bg-gray-400 " title="Show my personal link.">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 self-center mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />' +
                  '</svg>' +
                  'Show' +
                '</span>' +

                '<div x-show="show_personal_link">' +

                '<div class="mt-3 relative flex items-center">' +
                  '<input type="text" name="uniqlink" id="uniqlink" class="block w-full h-12 shadow-sm text-sm lg:text-xl pr-16 sm:text-sm rounded-md text-white bg-gray-900 border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="https://axieandfriends.com/m/' + data['mng_d']['unique_identifier'] + '" readonly>' +
                    '<div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">' +
                      '<kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400 cursor-pointer" id="btn-uniqlink">' +
                        'Copy' +
                      '</kbd>' +
                    '</div>' +
                '</div>' +
                '<p class="mt-1 text-xs md:text-sm text-gray-300">⛔ Never share your link to anyone you do not trust.</p>' +

                '</div>' +
                '</div>');

              $('#btn-uniqlink').on('click', function() {

                /* Get the text field */
                var copyText = document.getElementById('uniqlink');

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                document.execCommand("copy");

                /* Alert the copied text */
                console.log("Copied the text: " + copyText.value);

                /* change button text */
                document.getElementById("btn-uniqlink").innerHTML = 'Copied';

                setTimeout(() => {

                  /* change button text */
                  document.getElementById("btn-uniqlink").innerHTML = 'Copy';

                }, 3000);

              });

            }

            // fetch fresh mmr
            // var resobj.mmr = 0;
            // fetch('https://api.lunaciarover.com/stats/' + resobj.ronin_address_0x)
            //   .then(response => response.json())
            //   .then(resdata => {
            //     resobj.mmr = resdata.mmr;
            //     console.log(resobj.mmr); // JSON data parsed by `data.json()` call
            //   });

            if ( window.screen.width < 768 ) {
            // scholars display on card - mobile
            scholars_loaded_data_mobile +=  '<li class="relative overflow-x-scroll bg-gray-800 border border-gray-700 hover:border-gray-400 rounded-md p-3">' +

                                            '<div class="flex space-x-3">' +

                                              '<div class="mt-1.5 flex flex-col text-center">' +
                                                '<a href="#" class="cursor-default relative px-1.5 py-0.5 mb-2 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-base text-gray-400 hover:bg-gray-300 hover:text-gray-700" title="Axie Count: 0">' +
                                                  'N/A' +
                                                  '<br><img loading="lazy" class="h-4 w-4 mx-auto rounded-full object-cover" src="https://explorer.roninchain.com/contract-icon/axie.png" alt="Axies Pet Logo"> ' +
                                                '</a>' +

                                                '<span class="cursor-default relative px-1.5 py-0.5 mb-2 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-base text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  resobj.mmr +
                                                  '<br>⚔️' + 
                                                '</span>' +

                                                '<span class="cursor-default relative px-1.5 py-0.5 mb-2 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-base text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  resobj.rank +
                                                  '<br>🏆' + 
                                                '</span>' +

                                                '<span class="cursor-default relative px-1.5 py-0.5 mb-2 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-base text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  resobj.qhr + '%' +
                                                  '<br>🎯' + 
                                                '</span>' +
                                              '</div>' +

                                              '<div class="flex-1 space-y-1">' +

                                                '<div class="flex items-baseline justify-between">' +
                                                  
                                                  '<div class="w-3/5">' +
                                                    '<a href="' + resobj.scho_url + '" class="block text-lg text-gray-300 font-bold truncate" title="' + resobj.scholar_name + '">' +
                                                      resobj.scholar_name +
                                                    '</a>' +
                                                    
                                                    '<div class="space-x-1.5 whitespace-nowrap">' +
                                                      '<a href="' + resobj.ronin_explorer_link + '" target="_blank" class="whitespace-nowrap text-xs font-medium text-gray-400 hover:text-gray-700 bg-gray-700 hover:bg-gray-300 px-1.5 py-1 rounded-md" title="View on Ronin Explorer">' +
                                                        '<img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" alt="Ronin Wallet Logo" class="h-4 w-4 inline-flex"> ' +
                                                        resobj.ronin_address_formatted +
                                                      '</a>' +

                                                      (
                                                        (resobj.note !== null)
                                                        ? '<button role="button" data-tippy-content="' + resobj.note + '" class="tippy-popovers cursor-pointer text-xs font-medium text-gray-700 hover:text-gray-700 bg-yellow-100 hover:bg-yellow-400 px-1.5 py-1 rounded-md" title="Read notes"> 📝 Notes </button>'
                                                        : '<button role="button" data-tippy-content="blank" class="tippy-popovers cursor-pointer text-xs font-medium text-gray-700 hover:text-gray-700 bg-yellow-100 hover:bg-yellow-400 px-1.5 py-1 rounded-md opacity-0" title="Read notes"> 📝 Blank Notes </button>' 
                                                      ) +
                                                    '</div>' +
                                                  '</div>' +

                                                  '<div class="text-right w-2/5 whitespace-nowrap">' +
                                                    '<span class="space-x-2">' +
                                                      '<a href="' + resobj.scho_url + '" class="inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none" title="View daily stats">' +
                                                        '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />' +
                                                        '</svg>' +
                                                      '</a>' +
                                                      
                                                      '<a href="' + resobj.axie_marketplace_link + '"  target="_blank" class="inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none" title="View ' + resobj.scholar_name + ' on Axie Infinity Marketplace.">' +
                                                        '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />' +
                                                        '</svg>' +
                                                      '</a>' +

                                                      '<a href="javascript:void(0)" @click="modal_edit = true" data-id="' + resobj.h_sid + '" data-scho-ronin="' + resobj.ronin_address + '" data-scho="' + resobj.scholar_name + '" data-scho-share="' + resobj.scholar_share + '" data-invs-share="' + resobj.investor_share + '" data-set-quota="' + resobj.set_slp_quota + '" data-set-quota-frequency="' + resobj.set_quota_frequency + '" data-note="' + resobj.note + '" class="edit-modal-open bg-transparent inline-flex text-green-300 rounded-full hover:text-gray-500 focus:outline-none" title="[Edit scholar] ' + resobj.scholar_name + '">' +
                                                        '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />' +
                                                        '</svg>' +
                                                      '</a>' +

                                                      '<a href="javascript:void(0)" data-id="' + resobj.h_sid + '" data-scho="' + resobj.scholar_name + '" class="delete-scholar bg-transparent inline-flex text-green-300 rounded-full hover:text-red-500 focus:outline-none" title="[Delete scholar] ' + resobj.scholar_name + '">' +
                                                        '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />' +
                                                        '</svg>' +
                                                      '</a>' +
                                                    '</span>' +

                                                    // '<p class="flex-shrink w-full text-sm text-gray-500 mt-1.5" title="date & time to claim SLP.">‎‍' +
                                                    //   '<span data-ronin="' + resobj.h_sid + '" class="leading-snug select-none font-normal text-green-500 float-right cursor-pointer __claim_d_' + resobj.h_sid + ' click_click_date hidden">' + resobj.claimable_date + 
                                                    //     '<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                    //   '</span>' +
                                                    //   '<span data-ronin="' + resobj.h_sid + '" class="leading-snug select-none font-normal text-green-500 float-right cursor-pointer __claim_d_h' + resobj.h_sid + ' click_click_date ">' + resobj.claimable_date_human + 
                                                    //     '<svg xmlns="http://www.w3.org/2000/svg" class="ml-2 inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                    //   '</span>' +
                                                    // '</p>' +
                                                  '</div>' +
                                                '</div>' +

                                                '<div class="text-base text-gray-500 pt-2">' +

                                                  '<div class="flex items-center justify-between">' +
                                                    '<div>' +
                                                      '<img class="h-5 w-5 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="">' +
                                                      '<span class="text-xl text-green-300 font-bold"> ' + 
                                                        resobj.in_game_slp + ' SLP' +
                                                      '</span>' +
                                                    '</div>' +

                                                    '<span class="text-sm text-gray-400">' + resobj.in_game_slp_in_curr + '</span>' +
                                                  '</div>' +

                                                  // next claim section
                                                  '<div class="w-full h-auto max-h-full relative pt-2">' +
                                                    '<div class="bg-gray-900 hover:bg-gray-700 p-2 space-y-1 rounded-lg relative">' +
                                                      '<p class="text-gray-50">' +
                                                        ((resobj.claimable_date_ellapsed_s <= 0)  ? '<span class="absolute flex -mt-1.5 -mr-1.5 top-0 right-0 h-4 w-4 opacity-75"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span><span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span></span>' : '') +
                                                        '<span class="truncate">' +
                                                        ((resobj.claimable_date_ellapsed_s <= 0)  ? ' Claimable: ' : ' Next Claim: ') +
                                                        '</span>' +
                                                        '<span data-ronin="' + resobj.h_sid + '" class="select-none font-medium text-green-500 hover:text-green-400 float-right cursor-pointer __claim_d_' + resobj.h_sid + ' click_click_date hidden">' + resobj.claimable_date +
                                                          '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline-flex align-baseline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                        '</span>' +
                                                        '<span data-ronin="' + resobj.h_sid + '" class="select-none font-medium text-green-500 hover:text-green-400 float-right cursor-pointer __claim_d_h' + resobj.h_sid + ' click_click_date ">' + resobj.claimable_date_human +
                                                          '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline-flex align-baseline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                        '</span>' +
                                                      '</p>' +
                                                    '</div>' +
                                                  '</div>' +

                                                  // profit sharing section
                                                  '<div class="bg-gray-900 hover:bg-gray-700 p-2 mt-2 rounded-lg">' +
                                                    '<div class="flex items-center justify-between">' +
                                                      '<div class="text-gray-400">' +
                                                        '🎓 Sch. — ' +
                                                        '<span class="text-green-300 font-medium">' +
                                                          '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                          resobj.slp_scholar_share +
                                                        '</span>' +
                                                      '</div>' +
                                                      '<span class="text-xs text-gray-400">' + resobj.in_game_slp_scho_curr + '</span>' +
                                                    '</div>' +

                                                    '<div class="flex items-center justify-between">' +
                                                      '<div class="text-gray-400">' +
                                                        '👨‍💼 MGr. — ' +
                                                        '<span class="text-green-300 font-medium">' +
                                                          '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                          resobj.slp_manager_share +
                                                        '</span>' +
                                                      '</div>' +
                                                      '<span class="text-xs text-gray-400">' + resobj.in_game_slp_mng_curr + '</span>' +
                                                    '</div>' +

                                                    '<div class="flex items-center justify-between ' + ((resobj.investor_share > 0) ? '' : 'hidden') + '">' +
                                                      '<div class="text-gray-400">' +
                                                        '🤝 Inv. — <span class="text-green-300 font-medium">' +
                                                          '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                          resobj.slp_investor_share +
                                                        '</span>' +
                                                      '</div>' +
                                                      '<span class="text-xs text-gray-400">' + resobj.in_game_slp_inv_curr + '</span>' +
                                                    '</div>' +
                                                  '</div>' +

                                                  '<div class="mt-2 flex items-center justify-between">' +
                                                    '<div>' +
                                                      '<span class="text-gray-400 font-medium">' +
                                                        'Today — ' +
                                                        '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo">' +
                                                        '<span class="' + today_classes + '"> ' + 
                                                          resobj.today_slp +
                                                        '</span>' +
                                                      '</span>' +
                                                    '</div>' +

                                                    '<span class="text-sm text-gray-400">' + resobj.today_slp_in_curr + '</span>' +
                                                  '</div>' +
                                                  
                                                  '<div class="flex items-center justify-between">' +
                                                    '<div>' +
                                                      '<span class="text-gray-400 font-medium">' +
                                                        'Yesterday — ' +
                                                        '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo">' +
                                                        '<span class="' + yesterday_classes + '"> ' + 
                                                          resobj.yesterday_slp +
                                                        '</span>' +
                                                      '</span>' +
                                                    '</div>' +

                                                    '<span class="text-sm text-gray-400">' + resobj.yesterday_slp_in_curr + '</span>' +
                                                  '</div>' +

                                                  '<div class="flex items-center justify-between">' +
                                                    '<div>' +
                                                      '<span class="text-gray-400 font-medium">' +
                                                        'Average — ' +
                                                        '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo">' +
                                                        '<span class="' + avg_slp_classes + '"> ' + 
                                                          resobj.avg_slp +
                                                        '</span>' +
                                                      '</span>' +
                                                    '</div>' +

                                                    '<span class="text-sm text-gray-400">' + resobj.avg_slp_in_curr + '</span>' +
                                                  '</div>' +

                                                '</div>' +
                                              
                                              '</div>' +

                                            '</div>' +

                                            '</li>';
            }





            // scholar display on table - desktop
            scholars_loaded_data_table += '<tr class="bg-gray-800 hover:bg-gray-900 transition-all font-mono">' +

                                            '<td class="px-4 py-2 whitespace-nowrap">' +
                                              '<div>' +

                                                  '<div>' +
                                                    '<a class="font-bold text-lg text-gray-100 hover:underline" href="' + resobj.scho_url + '" title="[View scholar] ' + resobj.scholar_name + '">' +
                                                      resobj.scholar_name +
                                                    '</a>' +
                                                    
                                                    '<span x-show="collapsed_table" class="space-x-2 md:space-x-1.5 ml-2.5">' +
                                                      '<a href="javascript:void(0)" @click="modal_edit = true" data-id="' + resobj.h_sid + '" data-scho-ronin="' + resobj.ronin_address + '" data-scho="' + resobj.scholar_name + '" data-scho-share="' + resobj.scholar_share + '" data-invs-share="' + resobj.investor_share + '" data-set-quota="' + resobj.set_slp_quota + '" data-set-quota-frequency="' + resobj.set_quota_frequency + '" data-note="' + resobj.note + '" data-tippy-content="Edit" class="tooltips edit-modal-open bg-transparent inline-flex text-green-300 rounded-full hover:text-gray-500 focus:outline-none">' +
                                                        '<svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />' +
                                                        '</svg>' +
                                                      '</a>' +
                                                    '</span>' +

                                                    '<span x-show="!collapsed_table" class="space-x-2 md:space-x-1.5 ml-2.5">' +
                                                      '<a href="' + resobj.scho_url + '" data-tippy-content="AAF Profile" class="tooltips inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none">' +
                                                        '<svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />' +
                                                        '</svg>' +
                                                      '</a>' +
                                                      
                                                      '<a href="' + resobj.axie_marketplace_link + '"  target="_blank" data-tippy-content="Marketplace Profile" class="tooltips inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none">' +
                                                        '<svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />' +
                                                        '</svg>' +
                                                      '</a>' +

                                                      '<a href="javascript:void(0)" @click="modal_edit = true" data-id="' + resobj.h_sid + '" data-scho-ronin="' + resobj.ronin_address + '" data-scho="' + resobj.scholar_name + '" data-scho-share="' + resobj.scholar_share + '" data-invs-share="' + resobj.investor_share + '" data-set-quota="' + resobj.set_slp_quota + '" data-set-quota-frequency="' + resobj.set_quota_frequency + '" data-note="' + resobj.note + '" data-tippy-content="Edit" class="tooltips edit-modal-open bg-transparent inline-flex text-green-300 rounded-full hover:text-gray-500 focus:outline-none">' +
                                                        '<svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />' +
                                                        '</svg>' +
                                                      '</a>' +

                                                      '<a href="javascript:void(0)" data-id="' + resobj.h_sid + '" data-scho="' + resobj.scholar_name + '" data-tippy-content="Delete" class="tooltips delete-scholar bg-transparent inline-flex text-green-300 rounded-full hover:text-red-500 focus:outline-none">' +
                                                        '<svg class="w-5 h-5 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                          '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />' +
                                                        '</svg>' +
                                                      '</a>' +
                                                    '</span>' +
                                                  '</div>' +

                                                  '<div x-show="!collapsed_table" class="space-x-1.5">' +
                                                      // ronin explorer link
                                                      '<a href="' + resobj.ronin_explorer_link + '" target="_blank" data-tippy-content="View on Ronin Explorer" class="tooltips text-xs font-medium text-gray-400 hover:text-gray-700 bg-gray-700 hover:bg-gray-300 px-1.5 py-1 rounded-md">' +
                                                        '<img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" alt="Ronin Wallet Logo" class="h-4 w-4 inline-flex"> ' +
                                                        resobj.ronin_address_formatted +
                                                      '</a>' +

                                                      // toggle axie list of the scholar
                                                      '<button disabled @click="sliderover_scholar_axie = true" href="javascript:void(0)" class="text-xs font-medium text-gray-400 hover:text-gray-700 bg-gray-700 hover:bg-gray-300 px-1.5 py-1 rounded-md" title="Axie Count: 0">' +
                                                        '<img loading="lazy" class="h-4 w-4 rounded-full object-cover inline-flex" src="https://explorer.roninchain.com/contract-icon/axie.png" alt="Axies Pet Logo"> ' +
                                                        'N/A' +
                                                      '</button>' +

                                                      // scholars note
                                                      (
                                                        (resobj.note !== null)
                                                        ? '<button role="button" data-tippy-content="' + resobj.note + '" class="tippy-popovers cursor-pointer text-xs font-medium text-gray-700 hover:text-gray-700 bg-yellow-100 hover:bg-yellow-400 px-1.5 py-1 rounded-md" title="Read notes"> 📝 Notes </button>'
                                                        : '' 
                                                      ) +
                                                  '</div>' +

                                                  '<div x-show="!collapsed_table" class="mt-1.5 mb-1.5 space-x-1.5">' +
                                                    '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                      '⚔️ MMR ' + resobj.mmr +
                                                    '</span>' +

                                                    '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                      '🏆 Rank ' + resobj.rank +
                                                    '</span>' +

                                                    '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                      '🎯 QHR ' + resobj.qhr + '%' +
                                                    '</span>' +
                                                  '</div>' +

                                              '</div>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 text-green-300 whitespace-nowrap font-bold text-right hidden">' +
                                              resobj.last_slp_claimed + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.in_game_slp_in_curr + '</span>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 text-gray-100 whitespace-nowrap text-right">' +                
                                                '<div x-show="!collapsed_table" class="text-right text-sm font-bold">' +
                                                  '<span class="block">🎓 Sch. — <span class="text-green-300">' + resobj.slp_scholar_share + ' SLP</span>' +
                                                  '<span class="block">👨‍💼 Mng. — <span class="text-green-300">' + resobj.slp_manager_share + ' SLP</span>' +
                                                  ((resobj.investor_share > 0) ? '<span class="block">🤝 Inv. — <span class="text-green-300">' + resobj.slp_investor_share + ' SLP</span>' : '') +
                                                '</div>' +

                                                '<div x-show="collapsed_table" class="text-center font-bold ' + mmr_classes + '">' +
                                                  resobj.mmr +
                                                '</div>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 ' + today_classes + ' whitespace-nowrap font-extrabold text-right">' +
                                              resobj.today_slp + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.today_slp_in_curr + '</span>' +
                                            '</td>' +
                                            
                                            '<td class="px-4 py-2 ' + yesterday_classes + ' whitespace-nowrap font-bold text-right">' +
                                              resobj.yesterday_slp + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.yesterday_slp_in_curr + '</span>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 ' + avg_slp_classes + ' whitespace-nowrap font-bold text-right">' +
                                              resobj.avg_slp + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.avg_slp_in_curr + '</span>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 text-green-300 whitespace-nowrap font-bold text-right">' +
                                              resobj.in_game_slp + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.in_game_slp_in_curr + '</span>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 text-green-300 whitespace-nowrap font-bold text-right">' +
                                              resobj.ronin_slp + ' SLP' +
                                              '<span x-show="!collapsed_table" class="block text-xs text-gray-400 font-semibold">' + resobj.ronin_slp_in_curr + '</span>' +
                                            '</td>' +

                                            '<td class="px-4 py-2 text-right text-gray-200 whitespace-nowrap">' +
                                              '<div class="relative">' +
                                                ((resobj.claimable_date_ellapsed_s <= 0)  ? '<span class="absolute flex -mt-1.5 -mr-1.5 top-2 right-0 h-3 w-3 opacity-75"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span></span>' : '') +
                                                '<span class="relative z-10 ' + ((resobj.claimable_date_ellapsed_s <= 0)  ? ' text-green-300' : '') + '">' +
                                                  resobj.claimable_date +
                                                '</span>' +
                                                '<span x-show="!collapsed_table" class="block text-sm text-gray-400">' + resobj.claimable_date_human + '</span>' +
                                              '</div>' +
                                            '</td>' +

                                          '</tr>';




            if ( window.screen.width >= 768 ) {
              // scholars display on grid cards - desktop
              scholars_loaded_data +=   '<li class="col-span-1 bg-gray-800 border border-gray-700 py-4 hover:border-black rounded" id="scho-card-' + resobj.h_sid + '">' +
                                          
                                          //
                                          '<div class="flex-1 flex items-baseline place-content-end justify-between truncate">' +
                                          
                                            '<div class="flex-1 px-4 space-y-2 truncate">' +
                                              '<a href="' + resobj.scho_url + '" class="block font-bold text-lg text-gray-300 hover:underline truncate" title="View scholar ' + resobj.scholar_name + ' details">' +
                                                resobj.scholar_name +
                                              '</a>' +
                                            '</div>' +

                                            '<div class="flex-shrink-0 pr-4 space-x-2">' +
                                              '<span class="space-x-2 md:space-x-1.5 ml-2.5">' +
                                                '<a href="' + resobj.scho_url + '" class="inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none" title="View daily stats">' +
                                                  '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />' +
                                                  '</svg>' +
                                                '</a>' +
                                                
                                                '<a href="' + resobj.axie_marketplace_link + '"  target="_blank" class="inline-flex rounded-full bg-transparent text-green-300 hover:text-blue-400 focus:outline-none" title="View ' + resobj.scholar_name + ' on Axie Infinity Marketplace.">' +
                                                  '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">' +
                                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />' +
                                                  '</svg>' +
                                                '</a>' +

                                                '<a href="javascript:void(0)" @click="modal_edit = true" data-id="' + resobj.h_sid + '" data-scho-ronin="' + resobj.ronin_address + '" data-scho="' + resobj.scholar_name + '" data-scho-share="' + resobj.scholar_share + '" data-invs-share="' + resobj.investor_share + '" data-set-quota="' + resobj.set_slp_quota + '" data-set-quota-frequency="' + resobj.set_quota_frequency + '" data-note="' + resobj.note + '" class="edit-modal-open bg-transparent inline-flex text-green-300 rounded-full hover:text-gray-500 focus:outline-none" title="[Edit scholar] ' + resobj.scholar_name + '">' +
                                                  '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />' +
                                                  '</svg>' +
                                                '</a>' +

                                                '<a href="javascript:void(0)" data-id="' + resobj.h_sid + '" data-scho="' + resobj.scholar_name + '" class="delete-scholar bg-transparent inline-flex text-green-300 rounded-full hover:text-red-500 focus:outline-none" title="[Delete scholar] ' + resobj.scholar_name + '">' +
                                                  '<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">' +
                                                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />' +
                                                  '</svg>' +
                                                '</a>' +
                                              '</span>' +
                                            '</div>' +

                                          '</div>' +

                                          // 
                                          '<div class="flex-1 flex items-baseline justify-between mt-2 truncate">' +

                                            '<div class="flex-1 px-4 space-y-2 truncate">' +
                                              '<div class="space-x-1.5">' +
                                                  '<a href="' + resobj.ronin_explorer_link + '" target="_blank" class="text-xs font-medium text-gray-400 hover:text-gray-700 bg-gray-700 hover:bg-gray-300 px-1.5 py-1 rounded-md" title="View on Ronin Explorer">' +
                                                    '<img loading="lazy" src="https://res.cloudinary.com/mnoquiao/image/upload/v1627882912/axieandfriends.com/ronin.png" alt="Ronin Wallet Logo" class="h-4 w-4 inline-flex"> ' +
                                                    resobj.ronin_address_formatted +
                                                  '</a>' +

                                                  '<a href="#" target="_blank" class="text-xs font-medium text-gray-400 hover:text-gray-700 bg-gray-700 hover:bg-gray-300 px-1.5 py-1 rounded-md" title="Axie Count: 0">' +
                                                    '<img loading="lazy" class="h-4 w-4 rounded-full object-cover inline-flex" src="https://explorer.roninchain.com/contract-icon/axie.png" alt="Axies Pet Logo"> ' +
                                                    'N/A' +
                                                  '</a>' +

                                                  (
                                                    (resobj.note !== null) 
                                                    ? '<button role="button" data-tippy-content="' + resobj.note + '" class="tippy-popovers cursor-pointer text-xs font-medium text-gray-700 hover:text-gray-700 bg-yellow-100 hover:bg-yellow-400 px-1.5 py-1 rounded-md" title="Read notes"> 📝 Notes </button>'
                                                    : '' 
                                                  ) +
                                              '</div>' +

                                              '<div class="mt-1.5 space-x-1.5">' +
                                                '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  '⚔️ MMR ' + resobj.mmr +
                                                '</span>' +

                                                '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  '🏆 Rank ' + resobj.rank +
                                                '</span>' +

                                                '<span class="cursor-default relative inline-flex items-center px-1.5 py-0.5 rounded-md border border-dashed border-gray-400 bg-gray-700 text-xs font-medium text-gray-400 hover:bg-gray-300 hover:text-gray-700">' +
                                                  '🎯 QHR ' + resobj.qhr + '%' +
                                                '</span>' +
                                              '</div>' +
                                            '</div>' +

                                          '</div>' +

                                          // next claim section
                                          '<div class="w-full h-auto max-h-full relative px-4 pt-4">' +
                                            '<div class="bg-gray-900 hover:bg-gray-700 p-2 space-y-1 rounded-lg relative">' +
                                              '<p class="text-gray-50  truncate">' +
                                                ((resobj.claimable_date_ellapsed_s <= 0)  ? '<span class="absolute flex -mt-1.5 -mr-1.5 top-0 right-0 h-4 w-4 opacity-75"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span><span class="relative inline-flex rounded-full h-4 w-4 bg-red-500"></span></span>' : '') +
                                                ((resobj.claimable_date_ellapsed_s <= 0)  ? ' Claimable Since: ' : ' Next Claim: ') +
                                                '<span data-ronin="' + resobj.h_sid + '" class="select-none font-medium text-green-500 hover:text-green-400 float-right cursor-pointer __claim_d_' + resobj.h_sid + ' click_click_date hidden">' + resobj.claimable_date +
                                                  '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline-flex align-baseline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                '</span>' +
                                                '<span data-ronin="' + resobj.h_sid + '" class="select-none font-medium text-green-500 hover:text-green-400 float-right cursor-pointer __claim_d_h' + resobj.h_sid + ' click_click_date ">' + resobj.claimable_date_human +
                                                  '<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 inline-flex align-baseline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>' +
                                                '</span>' +
                                              '</p>' +
                                            '</div>' +
                                          '</div>' +

                                          // in-game and ronin slp section
                                          '<div class="w-full h-auto max-h-full relative px-4 pt-4">' +
                                            '<dl class="grid grid-cols-2 gap-3">' +

                                              '<div class="relative border border-gray-500 bg-gray-700 pt-3 px-2 pb-8 shadow rounded-md overflow-hidden">' +
                                                '<dt>' +
                                                  '<p class="text-sm font-bold text-gray-200 truncate">In-Game SLP</p>' +
                                                '</dt>' +

                                                '<dd class="pb-6 items-baseline">' +
                                                  '<p class="text-2xl inline-flex font-bold text-green-400">' +
                                                    resobj.in_game_slp +
                                                    ' SLP' +
                                                  '</p>' +

                                                  '<div class="block text-sm text-gray-400">' + 
                                                    resobj.in_game_slp_in_curr + 
                                                  '</div>' +

                                                  '<div class="absolute bottom-0 inset-x-0 bg-gray-600 px-2 py-2">' +
                                                    '<div class="text-sm">' +
                                                      '<a href="' + resobj.scho_url + '" class="font-medium text-gray-200 hover:text-gray-50 hover:underline"> View daily<span class="sr-only"> View daily SLP</span></a>' +
                                                    '</div>' +
                                                  '</div>' +
                                                '</dd>' +
                                              '</div>' +

                                              '<div class="relative border border-gray-500 bg-gray-700 pt-3 px-2 pb-8 shadow rounded-md overflow-hidden">' +
                                                '<dt>' +
                                                  '<p class="text-sm font-bold text-gray-200 truncate">Ronin Wallet SLP</p>' +
                                                '</dt>' +

                                                '<dd class="pb-6 items-baseline">' +
                                                  '<p class="text-2xl inline-flex font-bold text-green-400">' +
                                                    resobj.ronin_slp + 
                                                    ' SLP' +
                                                  '</p>' +

                                                  '<div class="block text-sm text-gray-400">' + 
                                                    resobj.ronin_slp_in_curr + 
                                                  '</div>' +

                                                  '<div class="absolute bottom-0 inset-x-0 bg-gray-600 px-2 py-2">' +
                                                    '<div class="text-sm">' +
                                                      '<a href="' + resobj.ronin_explorer_link + '" target="_blank" class="font-medium text-gray-200 hover:text-gray-50 hover:underline"> View on explorer<span class="sr-only"> View on Ronin | Block Explorer</span></a>' +
                                                    '</div>' +
                                                  '</div>' +
                                                '</dd>' +
                                              '</div>' +

                                            '</dl>' +
                                          '</div>' +

                                          // today, yesterday, average && profit sharing section
                                          '<div class="w-full h-auto max-h-full relative px-4 pt-4">' +

                                            '<div class="flex-1 truncate">' +
                                              '<div class="space-y-1">' +
                                                '<p class="text-gray-50 text-sm truncate">' +
                                                  'Today — ' +
                                                  '<span class="text-gray-400 float-right">' + resobj.today_slp_in_curr + '</span>' + // floats right
                                                  '<span class="' + today_classes + ' font-bold">' +
                                                    '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                    resobj.today_slp + ' SLP' +
                                                  '</span>' +
                                                '</p>' +
                                                '<p class="text-gray-50 text-sm truncate">' +
                                                  'Yesterday — ' +
                                                  '<span class="text-gray-400 float-right">' + resobj.yesterday_slp_in_curr + '</span>' + // floats right
                                                  '<span class="' + yesterday_classes + ' font-bold">' +
                                                    '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                    resobj.yesterday_slp + ' SLP' +
                                                  '</span>' +
                                                '</p>' +
                                                '<p class="text-gray-50 text-sm truncate">' +
                                                  'Average — ' +
                                                  '<span class="text-gray-400 float-right">' + resobj.avg_slp_in_curr + '</span>' + // floats right
                                                  '<span class="' + avg_slp_classes + ' font-bold">' +
                                                    '<img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + 
                                                    resobj.avg_slp + ' SLP' +
                                                  '</span>' +
                                                '</p>' +

                                                '<div class="bg-gray-900 hover:bg-gray-700 p-2 space-y-1 rounded-lg">' +
                                                  '<p class="text-gray-50 text-sm truncate">🎓 Scholar — <span class="text-gray-400 float-right">  ' + resobj.in_game_slp_scho_curr + '</span> <span class="text-green-300 font-bold"><img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + resobj.slp_scholar_share + ' SLP</span></p>' +
                                                  '<p class="text-gray-50 text-sm truncate">👨‍💼 Manager — <span class="text-gray-400 float-right">  ' + resobj.in_game_slp_mng_curr + '</span> <span class="text-green-300 font-bold"><img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + resobj.slp_manager_share + ' SLP</span></p>' +
                                                  ((resobj.investor_share > 0) ? '<p class="text-gray-50 text-sm truncate">🤝 Investor — <span class="text-gray-400 float-right">  ' + resobj.in_game_slp_inv_curr + '</span> <span class="text-green-300 font-bold"><img class="h-4 w-4 rounded-full object-cover inline-block" src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" alt="Smooth Love Potion (SLP) Photo"> ' + resobj.slp_investor_share + ' SLP</span></p>' : '') +
                                                '</div>' +
                                              '</div>' +
                                            '</div>' +

                                          '</div>' +

                                        '</li>';

            }

          }); /* end scholar loop */



          document.querySelector('#dash-scholars').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_scholars'] + ' ' + (data['mng_d']['total_scholars'] > 1 ? 'Scholars' : 'Scholar') + '</p>';

          document.querySelector('#dash-avg-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_avg_slp'] + '<span class="text-xl text-green-700">SLP</span></p>';
          document.querySelector('#dash-avg-slp-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_avg_slp_curr'] + '</p>';
          document.querySelector('#dash-unclaimed-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_unclaimed_slp'] + '<span class="text-xl text-green-700">SLP</span></p>';
          document.querySelector('#dash-unclaimed-slp-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_unclaimed_slp_curr'] + '</p>';
          document.querySelector('#dash-ronin-slp').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_ronin_slp'] + '<span class="text-xl text-green-700">SLP</span></p>';
          document.querySelector('#dash-ronin-slp-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_ronin_slp_curr'] + '</p>';
          
          // load profits (manager, scholar, investor(optional))
          document.querySelector('#dash-unclaimed-slp-m').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_unclaimed_slp_m'] + '<span class="text-xl text-green-700">SLP</span></p>';
          document.querySelector('#dash-unclaimed-slp-m-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_unclaimed_slp_m_curr'] + '</p>';
          document.querySelector('#dash-unclaimed-slp-s').innerHTML = '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_unclaimed_slp_s'] + '<span class="text-xl text-green-700">SLP</span></p>';
          document.querySelector('#dash-unclaimed-slp-s-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_unclaimed_slp_s_curr'] + '</p>';
        
          if (data['mng_d']['total_unclaimed_slp_i'] > 0) {
            $('#your-stats-ul').html(
              '<div class="flex-shrink-0 flex items-center justify-center w-16 border-t border-b border-gray-500 bg-gray-700 text-green-500 text-4xl font-bold rounded-l-md">' +
                '🤝' +
              '</div>' +

              '<div class="animate-pulse flex-1 flex items-center justify-between border-t border-r border-b border-gray-500 bg-gray-700 rounded-r-md truncate dash-boxes">' +
                '<div class="flex-1 px-4 py-2 text-sm truncate">' +
                  '<span class="text-gray-200 font-medium text-base">' +
                    'Investor Share <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">' +
                  '</span>' +

                  '<div id="dash-unclaimed-slp-s">' +
                    '<p class="text-2xl font-bold text-green-500">' + data['mng_d']['total_unclaimed_slp_i'] + '<span class="text-xl text-green-700">SLP</span></p>' +
                  '</div>' +

                  '<div id="dash-unclaimed-slp-s-curr">' +
                    '<p class="text-sm text-gray-300">' + data['mng_d']['total_unclaimed_slp_i_curr'] + '</p>' +
                  '</div>' +
                '</div>' +
              '</div>');
          }
          

          // load Profits Summary
          document.querySelector('#dash-estimated-today-slp').innerHTML = '<p class="text-2xl font-bold text-green-500"> <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">' + data['mng_d']['total_today_slp'] + '</p>';
          document.querySelector('#dash-estimated-today-slp-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_today_slp_curr'] + '</p>';
          document.querySelector('#dash-estimated-yesterday-slp').innerHTML = '<p class="text-2xl font-bold text-green-500"> <img src="https://res.cloudinary.com/mnoquiao/image/upload/v1625832640/axieandfriends.com/SLP.webp" height="16" width="16" alt="SLP" class="inline-block mr-1">' + data['mng_d']['total_yesterday_slp'] + '</p>';
          document.querySelector('#dash-estimated-yesterday-slp-curr').innerHTML = '<p class="text-sm text-gray-300">' + data['mng_d']['total_yesterday_slp_curr'] + '</p>';

          // load scholars display
          document.querySelector('#scholars-list-wrapper').innerHTML = '<ul class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4" id="scholars-list">' + scholars_loaded_data + '</ul>';
          document.querySelector('#scholars-list-wrapper-mobile').innerHTML = '<ul class="space-y-3" id="scholars-list-mobile">' + scholars_loaded_data_mobile + '</ul>';
          document.querySelector('#scholars-list-table').innerHTML = scholars_loaded_data_table;

          // toggle claim date display 
          $('.click_click_date').on('click', function(event) {

            let _target_ronin = $(this).data("ronin");
            let _target_ronin_cd = '.__claim_d_' + _target_ronin;
            let _target_ronin_cdh = '.__claim_d_h' + _target_ronin;

            $(_target_ronin_cd).toggleClass("hidden");
            $(_target_ronin_cdh).toggleClass("hidden");

            // console.log(_target_ronin_cd, _target_ronin_cdh);

          });

          // tooltip for scholar notes
          tippy('.tippy-popovers', {
            placement: 'top',
          });

          // init tooltip
          tippy('.tooltips', {
            placement: 'top',
          });

          edit_scho();
          del_scho();
          
          // run timer with 90 secs countdown
          startRefreshTimer(90);

        }

        // remove all animation 
        document.querySelectorAll('.dash-boxes').forEach(e => e.classList.remove('animate-pulse'));

      }).catch();

  }



  // editing scho
  function edit_scho() {

    // modal open
    $('.edit-modal-open').on('click', function(event) {

      event.preventDefault();

      const scho_id               = $(this).data('id');
      const scho_ronin            = $(this).data('scho-ronin');
      const scho_name             = $(this).data('scho');
      const scho_share            = $(this).data('scho-share') ?? 0.00;
      const invs_share            = $(this).data('invs-share') ?? 0.00;
      const scho_quota            = $(this).data('set-quota');
      const scho_quote_freqeuncy  = $(this).data('set-quota-frequency');
      const scho_note             = $(this).data('note');

      $('#edit-ronin-addr').text(scho_ronin);
      $('#edit-scho-name').val(scho_name);
      $('#edit-scho-share').val(scho_share);
      $('#edit-invs-share').val(invs_share);
      $('#edit-manager-share').text(100 - (parseInt(scho_share) + parseInt(invs_share)) + '%');
      $('#edit-slpquota').val(scho_quota);
      $('#edit-quotafrequency').val(scho_quote_freqeuncy).change();
      $('#edit-note').val(scho_note).change();

      // scholar id
      $('#edit-scholar-form').find('input[name="s"]').val(scho_id);

      // display scholar's name on edit modal
      $('#editing-scholar-name').text(scho_name);

    });

    // edit scho form submitted
    $('#edit-scholar-form').on('submit', function(e) {

      // prevent form default action
      e.preventDefault();

      // get submit button
      let submit_btn = $('#sbt-edit-scholar-form');

      /* contracts submitted form data key/value pairs */
      let formData = new FormData(this);

      xhr = $.ajax({
        url: "{{ route('edit_scholar') }}",
        type: "POST",
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {

          // hidde error message wrapper
          if ($('#edit-scholar-form-err-msg-container').is(':visible')) {
            $('#edit-scholar-form-err-msg-container').attr("hidden", "hidden");
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
            $('#edit-scholar-form-err-msg-container').removeAttr("hidden");
            $('#edit-scholar-form-err-msg').html($err_msg);

          } else {

            // fetch scholars (fresh data)
            fetch_scholars();

            // trigger clicking close button to close the modal
            $('#cancel-edit-scholar-form').trigger('click');

            // show success message
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'Scholar Updated.',
              showConfirmButton: false,
              timer: 1800
            })

          }

          // return submit button to normal state
          $(submit_btn).removeAttr('disabled');
          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).html('Save');

        },
        error: function(data) {

          $(submit_btn).removeAttr('disabled');
          $(submit_btn).removeClass('cursor-wait');
          $(submit_btn).html('Save');

        }
      });

    });

  }



  // deleting scho
  function del_scho() {

    $('.delete-scholar').on('click', function(event) {

      event.preventDefault();

      const scho_name = $(this).data('scho');
      const scho_id = $(this).data('id');

      Swal.fire({
        title: 'Confirmation Required',
        text: 'Are you sure delete to ' + scho_name + '?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#808080',
        confirmButtonText: 'Confirm'
      }).then((result) => {

        // user confirm to delete scholar
        if (result.isConfirmed) {

          //  show pulse effect
          $('#scho-card-' + scho_id).toggleClass('animate-pulse');

          $.ajax({
            url: "{{ route('delete_scholar') }}",
            type: "POST",
            data: {
              _token: "{{ csrf_token() }}",
              s: scho_id,
            },
            success: function(data) {

              if (data.success === true) {

                // remove scholar card
                $('#scho-card-' + scho_id).remove();

                //
                fetch_scholars();

                //
                Swal.fire(
                  'Deleted!',
                  'Your scholar ' + scho_name + 'has been deleted.',
                  'success'
                );

              }

              //  remove pulse effect
              $('#scho-card-' + scho_id).toggleClass('animate-pulse');

            }
          });

        }

      });

    });

  }




  function filterSchoDesktop() {

    var filter;
    var input   = document.getElementById("filter-scholar");
    var input_m = document.getElementById("filter-scholar-mobile");
        
    filter  = input.value.toUpperCase();
            // clear input field for mobile
            input_m.value = '';
    
    filterScho(filter);

  }

  function filterSchoMobile() {

    var filter;
    var input   = document.getElementById("filter-scholar");
    var input_m = document.getElementById("filter-scholar-mobile");

    input   = document.getElementById("filter-scholar");
    input_m = document.getElementById("filter-scholar-mobile");
        
    filter  = input_m.value.toUpperCase();
            // clear input field for desktop
            input.value = '';
    
    filterScho(filter);

  }

  // filter scho
  function filterScho(filter) {

    var filter, ul, ul2, li, li2, a, a2, a3, i, i2, i3, tbody, tr, txtValue;

    ul = document.getElementById("scholars-list");
    li = ul.getElementsByTagName("li");

    ul2 = document.getElementById("scholars-list-mobile");
    li2 = ul2.getElementsByTagName("li");

    tbody = document.getElementById("scholars-list-table");
    tr = tbody.getElementsByTagName("tr");

    // desktop grid
    for (i = 0; i < li.length; i++) {

      a = li[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

        li[i].style.display = "";

      } else {

        li[i].style.display = "none";

      }

    }

    // mobile grid
    for (i2 = 0; i2 < li2.length; i2++) {

      a2 = li2[i2].getElementsByTagName("a")[1];
      txtValue = a2.textContent || a2.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

        li2[i2].style.display = "";

      } else {

        li2[i2].style.display = "none";

      }

    }


    // desktop table
    for (i3 = 0; i3 < tr.length; i3++) {

      a3 = tr[i3].getElementsByTagName("a")[0];
      txtValue = a3.textContent || a3.innerText;

      if (txtValue.toUpperCase().indexOf(filter) > -1) {

        tr[i3].style.display = "";

      } else {

        tr[i3].style.display = "none";

      }

    }

  }












  // fetch coin price from coingecko api
  fetch_coin_price();

  function fetch_coin_price() {

    // fetch coin prices
    fetch("{{ route('coin_price') }}")
      .then(res => res.json())
      .then((data) => {

        let eth_24_change = (data['eth_last_24_change'] < 0) ? '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> ' + data['eth_last_24_change'] + '%</span>' : '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> +' + data['eth_last_24_change'] + '%</span>';
        let slp_24_change = (data['slp_last_24_change'] < 0) ? '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> ' + data['slp_last_24_change'] + '%</span>' : '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> +' + data['slp_last_24_change'] + '%</span>';
        let axs_24_change = (data['axs_last_24_change'] < 0) ? '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800"> ' + data['axs_last_24_change'] + '%</span>' : '<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800"> +' + data['axs_last_24_change'] + '%</span>';

        $('.head_eth_price').html(data['f_eth'] + ' ' + eth_24_change);
        $('.head_slp_price').html(data['f_slp'] + ' ' + slp_24_change);
        $('.head_axs_price').html(data['f_axs'] + ' ' + axs_24_change);

        localStorage.setItem(`current_slp_price`, data['slp']);
        localStorage.setItem(`curr_symbol`, data['curr_symbol']);
      }).catch();

  }














  /* this will handle displaying of last searches of user */
  if (localStorage.getItem(`m_uniqid`) !== null) {

    // if no session (laravel) is existed call to create one from the saved localstoarge unique id of manager
    const data = {
      muid:     localStorage.getItem(`m_uniqid`),
      sort_by:  localStorage.getItem(`sort_by`),
      "_token": "{{ csrf_token() }}",
    };

    fetch("{{ route('is_manager_session') }}", {
        method: 'POST', // or 'PUT'
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
      .then(response => response.json())
      .then(data => {

        // set manager's locstorage identifier
        localStorage.setItem(`m_uniqid`, data['sess_id']);

        // console.log('Success:', data);
        if (data['redirect'] == true) {
          
          // set page url || instead of refreshing
          window.history.pushState("", "📜 Scholar Tracker — Axie Infinity | axieandfriends.com", "/m/" + data['uniq']);
          
        }

      })
      .catch((error) => {
        console.error('Error:', error);
      });

  }
</script>





{{-- <script src="https://coinzillatag.com/lib/sticky.js"></script>
<script>
  window.coinzilla_sticky = window.coinzilla_sticky || [];

  function czilla() {
    coinzilla_sticky.push(arguments);
  }
  czilla('122610f60b639ab2479');
</script> --}}

<!--Start of Tawk.to Script-->
{{-- <script type="text/javascript">
  var Tawk_API = Tawk_API || {},
    Tawk_LoadStart = new Date();
  (function() {
    var s1 = document.createElement("script"),
      s0 = document.getElementsByTagName("script")[0];
    s1.async = true;
    s1.src = 'https://embed.tawk.to/60fce131d6e7610a49acdd58/1fbdsvb7k';
    s1.charset = 'UTF-8';
    s1.setAttribute('crossorigin', '*');
    s0.parentNode.insertBefore(s1, s0);
  })();
</script> --}}
<!-- End of Tawk.to Script -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1W2X1GVRRK"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-1W2X1GVRRK');
</script>