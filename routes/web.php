<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\GasFeeController;
use App\Http\Controllers\LeaderboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* index page */
Route::get('/', [IndexController::class, 'index'])->name('index');

/* scholar acad page */
Route::view('/scholar-agency', 'pages.scholars-agency', [
    'page_title'                => '🕵️ Scholar Agency — Axie Infinity',
    'active_page'               => 'scholar-agency',
    'canonical'                 => 'https://axieandfriends.com/scholar-agency',
    'description'               => 'Looking for competitive Scholars? We have best and ready to play Scholar available we trained, managed, and monitor it for you.',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);

/* partners page */
Route::view('/partners', 'pages.partners', [
    'page_title'                => '🤝 Partnership',
    'active_page'               => 'partners',
    'canonical'                 => 'https://axieandfriends.com/partners',
    'description'               => 'axieandfriends.com is not looking for potential Angel Investors who are willing to buy a share of our fast-growing Axie Infinity online tools.',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);

/* terms page */
Route::view('/disclaimer', 'pages.disclaimer', [
    'page_title'                => 'Disclaimer',
    'active_page'               => 'disclaimer',
    'canonical'                 => 'https://axieandfriends.com/disclaimer',
    'description'               => 'Disclaimer for AxieAndFriends.com',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);

/* terms page */
Route::view('/terms', 'pages.terms', [
    'page_title'                => 'Terms',
    'active_page'               => 'terms',
    'canonical'                 => 'https://axieandfriends.com/terms',
    'description'               => 'Terms and Conditions for AxieAndFriends.com',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);


/* privacy page */
Route::view('/privacy', 'pages.privacy', [
    'page_title'                => 'Privacy Policy',
    'active_page'               => 'privacy',
    'canonical'                 => 'https://axieandfriends.com/privacy',
    'description'               => 'Privacy Policy for AxieAndFriends.com',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);

/* donate page */
Route::view('/donate', 'pages.donate', [
    'page_title'                => 'Donate to AAF',
    'active_page'               => 'donate',
    'canonical'                 => 'https://axieandfriends.com/donate',
    'description'               => 'Donate to support Axie Infinity Managers Tracker (axieandfriends.com)',
    'uniq_link'                 => null,
    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
]);

/* manipulate sorting and filter of fetched scholars */
Route::post('/sf', [IndexController::class, 'sort_and_filter'])->name('sort_and_filter');

/* set custom slp price */
Route::post('/slp_c', [IndexController::class, 'set_custom_slp_price'])->name('set_custom_slp_price');

/* api response for scholars */
Route::get('/json/scho', [IndexController::class, 'fetch_scholars'])->name('fetch_scholars');
/* api response for coin prices */
Route::get('/json/cp', [IndexController::class, 'coin_price'])->name('coin_price');
/* api response  for raw currency data */
Route::get('/json/currencies', [IndexController::class, 'fetch_currencies'])->name('fetch_currencies');
/* api response for site summary stats */
Route::get('/json/st', [IndexController::class, 'site_stats'])->name('site_stats');


/* handles scholar CRUD */
Route::post('/as', [IndexController::class, 'add_scholar'])->name('add_scholar');
Route::post('/es', [IndexController::class, 'edit_scholar'])->name('edit_scholar');
Route::post('/ds', [IndexController::class, 'delete_scholar'])->name('delete_scholar');

/* CRONJOB | update all scholars from the raw data */
Route::get('/us', [CronController::class, 'cron_update_scholars'])->name('cron_update_scholars'); /* scholar raw data into main scholars table */
Route::get('/cp', [CronController::class, 'cron_coin_price'])->name('cron_coin_price'); /* coin price update */
Route::get('/daily_slp', [CronController::class, 'cron_sholars_daily_slp_logs'])->name('cron_sholars_daily_slp_logs');
Route::get('/gl', [CronController::class, 'get_leaderboard'])->name('get_leaderboard');
Route::get('/fs', [CronController::class, 'fix_scholars_that_cannot_be_updated'])->name('fix_scholars_that_cannot_be_updated');

/**
 * April 15, 2022
 * Core function on getting SLP and related data
 */
Route::get('/slp_api', [CronController::class, 'slp_api_v1'])->name('slp_api_v1');

/* axie gas feee */
Route::get('/axiegasfee', [GasFeeController::class, 'live_gas_fee'])->name('live_gas_fee');

/* arena leaderboard */
Route::get('arena-leaderboard',[LeaderboardController::class, 'arena_leaderboard'])->name('arena_leaderboard');

/* manager's scholar single view` */
Route::get('/m/{unique_id}/{scho_id}', [ManagerController::class, 'fetch_scholar_single'])->name('fetch_scholar_single');
Route::get('/profile/{ronin_addr}', [ManagerController::class, 'fetch_scholar_single_test'])->name('fetch_scholar_single_test');

/* handles session for visitor/manager with existing `id` */
Route::get('/m/{unique_id}', [ManagerController::class, 'fetch_manager'])->name('fetch_manager');

/* checks if session already set for this manager */
Route::post('/ims', [ManagerController::class, 'is_manager_session'])->name('is_manager_session');

/* changes current set currency of the manager */
Route::post('/cc', [ManagerController::class, 'change_currency'])->name('change_currency');

/* changes current set timezone of the manager */
Route::post('/ctz', [ManagerController::class, 'change_timezone'])->name('change_timezone');

/* refresh scholar list view and data */
Route::post('/rs', [ManagerController::class, 'refresh_scholar_data'])->name('refresh_scholar_data');










Route::get('/tttest', [CronController::class, 'test'])->name('test');
/* api respoonse for manager's dashbaord summary */
// Route::get('/json/m/{unique_id}', [ManagerController::class, 'fetch_manager_dashboard'])->name('fetch_manager_dashboard');








Route::get('newdash', function() {
    return view('pagesv2.index', [
        'page_title'    => 'Dashboard',
        'active_menu'   => 'dashboard',
    ]);
})->name('newdash');

Route::get('tracker', function() {
    return view('pagesv2.tracker', [
        'page_title'    => 'Tracker',
        'active_menu'   => 'tracker',
    ]);
})->name('tracker');

Route::get('scholars', function() {
    return view('pagesv2.scholars', [
        'page_title'    => 'Scholars',
        'active_menu'   => 'scholars',
    ]);
})->name('scholars');

Route::get('settings', function() {
    return view('pagesv2.index', [
        'page_title'    => 'New Dashboard',
        'active_menu'   => 'settings',
    ]);
})->name('settings');