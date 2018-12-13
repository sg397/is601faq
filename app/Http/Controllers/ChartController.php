<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use ConsoleTVs\Charts\Facades\Charts;
use DB;

class ChartController extends Controller
{

    public function index(){

        //$users = User::all();
        $users = DB::table('users')
                ->join('questions', 'questions.user_id', '=', 'users.id')
                //->join('profiles', 'profiles.user_id', '=', 'users.id')
                ->select('users.email')
                ->get();

         $charts = Charts::database($users, 'bar', 'highcharts')

            ->title("Active Users Creating FAQs")

            ->elementLabel("No# of Questions Created")

            ->dimensions(1000, 500)

            ->responsive(false)
            ->groupBy('email');

        return view('charts', compact('charts'));

    }

}
