<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Iluunimate\Http\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Controllers\Message;
use Illuminate\Support\Collection;

class GasFeeController extends Controller
{

    public function live_gas_fee()
    {

        $data    = [
                    'page_title'                => '📜 Scholar Tracker — Axie Infinity',
                    'active_page'               => 'index',
                    'canonical'                 => route('index'),
                    'description'               => 'Axie Infinity best tool for Managers to track their Scholars daily SLP farmed. Track how many Smooth Love Potion (SLP) your scholar obtained on a daily, weekly or monthly basis.',
                    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
                    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
                ];

        return view('pages.gasfee', $data);
    }

}
