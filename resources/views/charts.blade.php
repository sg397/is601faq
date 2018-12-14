@extends('layouts.app')

@section('content')
    <div class="jumbotron">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="row col-md-12" style="width:100%;height:100%;">

                            <div class="col-md-6" style="float:left;border:1px;width:45%;height:80%;border:2px;">
                                {!! $userCharts->html()!!}
                            </div>

                            <div class="col-md-6" style="float:right;border:1px;border-color:#99bee4;width:40%;height:80%;border:2px;">
                                    {!! $questionCharts->html()!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="container">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">

            <div class="panel panel-primary">
                <div class="panel-body">
                    {!! $pieChart->html()!!}

                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>


    {!! Charts::styles() !!}
    {!! Charts::scripts() !!}

    {!! $userCharts->script() !!}

    {!! $questionCharts->script() !!}

    {!! $pieChart->script() !!}

@endsection
