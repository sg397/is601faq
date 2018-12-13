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

        $questions = DB::table('questions')
            ->select( 'questions.id','questions.body', 'questions.view_count')
            ->where('questions.view_count', '>', 0)
            ->get();

        $labels=  array();
        $values=  array();

        for($i = 0; $i < count ( $questions ); $i ++){
            $labels[$i] = $questions[$i]->body;
            $values[$i] = $questions[$i]->view_count;
        }

        $userCharts = Charts::database($users, 'bar', 'highcharts')
            ->title("Active Users Creating FAQs")
            ->elementLabel("No# of Questions Created")
            ->dimensions(1000, 600)
            ->responsive(false)
            ->groupBy('email');

        $questionCharts = Charts::database($questions, 'bar', 'highcharts')
            ->title("Popular Questions Viewed By Users")
            ->elementLabel("Question Views")

            ->labels($labels)
            ->values($values)
            ->dimensions(700, 600)
            ->responsive(false);


/*        $pieCharts = Charts::create('pie', 'highcharts')
            ->title("PIE CHART Users Creating FAQs")
            ->elementLabel("No# of Questions Created")
            ->dimensions(1000, 500)
            ->responsive(false)
            ->groupBy('email');
*/
        return view('charts', compact('userCharts','questionCharts'));

    }

    /*
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
     */

}
