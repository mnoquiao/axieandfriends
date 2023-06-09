<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Iluunimate\Http\Input;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Str;
use Carbon\Carbon;

class LeaderboardController extends Controller
{

    public function arena_leaderboard()
    {

        // select leaderboard data
        $leaderboard =  DB::table('battle_leaderboard')
                        ->select([
                            'ronin_id',
                            'ign',
                            'mmr',
                            'rank',
                            'win_total'
                        ])
                        ->orderBy('mmr', 'DESC')
                        ->limit(1000)
                        ->get()->toArray();

        // select the most recent updated_at record
        $last_update =  DB::table('battle_leaderboard')
                        ->select([
                            'updated_at'
                        ])
                        ->orderBy('updated_at', 'DESC')
                        ->first();

        // $date_update    = Carbon::createFromTimestamp(strtotime($last_update->updated_at));

        $date = $last_update->updated_at;

        $date = Carbon::parse($date)->shiftTimezone('Asia/Singapore');
        $elapsed = $date->diffForHumans(Carbon::now()->tz('Asia/Singapore'));

        foreach( $leaderboard as $k => $v ) {
            $leaderboard[$k]->axie_marketplace_link    = sprintf("https://marketplace.axieinfinity.com/profile/%s/axie", str_replace('0x', 'ronin:', $v->ronin_id));
        }
        

        $data    = [
                    'page_title'                => '⚔️ Axie Leaderboard Top 1000 — Axie Infinity',
                    'active_page'               => 'arena_leaderboard',
                    'canonical'                 => route('arena_leaderboard'),
                    'description'               => 'See the list of the most updated Axie Leaderboard Top 1000, Axie Infinity top Players will get a reward for mAXS token in every end of the Season.',
                    'selected_currency_display' => session('selected_currency_display') ??  "$ USD",
                    'selected_timezone_id'      => session('selected_timezone_id') ??  "UTC",
                    'leaderboard'               => $leaderboard,
                    'last_update'               => $elapsed,
                ];
                

        return view('pages.arena-leaderboard', $data);

    }

}
