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

        $users = DB::table('users')
                ->join('questions', 'questions.user_id', '=', 'users.id')
                ->select('users.email')
                ->get();


        $userCharts = Charts::database($users, 'bar', 'highcharts')
            ->title("Active Users Creating FAQs")
            ->elementLabel("Questions Created By User")
            ->yAxisTitle("Number Of Questions")
            //->xAxisTitle("Users")
            ->responsive(false)
            ->groupBy('email');


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

        $questionCharts = Charts::database($questions, 'line', 'highcharts')
            ->title("Popular Questions Viewed By Users")
            ->elementLabel("Question Views")
            ->yAxisTitle("Number Of Views")
            ->labels($labels)
            ->values($values)
            ->responsive(false);

        $questions = \App\Question::all();
        $questionCount = $questions->count();
        //dd($questionCount);

        $questionAnswers =  DB::table('answers')
            ->select( 'question_id')
            ->get()->unique('question_id');

        $answeredCount = $questionAnswers->count();
      // dd($answeredCount);

       $pieChart = Charts::create('donut', 'highcharts')
            ->title(" Donut-Chart Showing Number of Answered and Unanswered Questions.\<br\> Total Questions: ".$questionCount)
           ->labels(['Answered Questions','Un-Answered Questions'])
           ->values([$answeredCount, $questionCount-$answeredCount])
           ->responsive(false);


        return view('charts', compact('userCharts','questionCharts', 'pieChart'));

    }

}
