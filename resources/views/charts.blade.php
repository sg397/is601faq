@extends('layouts.app')

@section('content')
    <div class="jumbotron"  style="width:100%;height:40%;">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row col-md-12">

                            <div class="col-md-6" style="float:left;">
                                {!! $questionCharts->html()!!}


                            </div>

                            <div class="col-md-6" style="float:right;">
                                {!! $pieChart->html()!!}


                            </div>
                        </div>
                        <hr style="color: '#FF0000';">
                        <div class="row col-md-12">
                            <div class="col-md-12" style="align:middle;">
                                {!! $userCharts->html()!!}


                            </div>


                        </div>
                    </div>
                </div>
            </div>
    </div>



    {!! Charts::styles() !!}
    {!! Charts::scripts() !!}

    {!! $userCharts->script() !!}

    {!! $questionCharts->script() !!}

    {!! $pieChart->script() !!}

@endsection
